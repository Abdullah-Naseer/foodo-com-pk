<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Models\Menu;
use App\Models\MenuType;
use Illuminate\Http\Request;
use App\Traits\HasDataTables;
use App\Helpers\{
    LogActivity,
    Common
};


class MenuController extends Controller
{

    use HasDataTables;
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $trash = $request->get("trash");
            $query = Menu::with('menuType')->latest();
            $query = $trash === "true" ? $query->onlyTrashed() : $query;

            return $this->dataTable($query, 'menus', function ($dataTable) {
                $dataTable->addColumn(
                    'image',
                    fn($menu) => $menu->image
                        ? '<img src="' . asset($menu->image) . '" alt="Menu Image" style="width: 50px; height: 50px; object-fit: cover;">'
                        : 'No Image'
                )->addColumn('type', fn($menu) => $menu->menuType->type ?? 'Not Specified')
                    ->filterColumn('type', function ($query, $keyword) {
                        $query->whereHas('menuType', function ($q) use ($keyword) {
                            $q->where('type', 'LIKE', "%$keyword%");
                        });
                    });
            });
        }
        return view('admin.menus.index');
    }

    public function create()
    {
        return $this->eidtOrCreate();
    }

 
    public function store(StoreMenuRequest $request)
    {
        $data = $request->validated();
        if (Menu::isMenuAdded($data['menu_type_id'], $data['week'], $data['day'])) {
            return response()->json([
                'success' => false,
                'message' => 'This menu already exists.',
            ]);
        }

        $data['image'] = $this->uploadImage($request, 'image', 'menus');
        $menu = Menu::create($data);
        if ($menu) {
            LogActivity::addToLog('menu', 'insert', $menu, null);
        }

        return response()->json([
            'success' => true,
            'message' => 'Menu successfully created.',
            'redirect' => route('admin.menus.index'),
        ]);
    }

    public function edit(Menu $menu = null)
    {
        return $this->eidtOrCreate($menu);
    }

    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $menu->deleteImage();
            $data['image'] = $this->uploadImage($request, 'image', 'menus');
        }
        $changes_exist = Common::get_changes($menu, $data);
        if ($changes_exist) {
            LogActivity::addToLog('menu', 'update', null, $changes_exist);
            $menu->update($data);
        }
        return response()->json([
            'success' => true,
            'message' => 'Menu successfully updated.',
            'redirect' => route('admin.menus.index'),
        ]);
    }

    public function destroy(Menu $menu)
    {
        $menu->deleteImage();
        $menu->delete();

        return response()->json([
            'success' => true,
            'message' => 'Menu successfully deleted.',
        ]);
    }


    private function eidtOrCreate(Menu $menu = null, $days = null)
    {
        $menu_types = MenuType::all();
        $days = Menu::getDays();
        $weeks = Menu::getWeeks();

        return view('admin.menus.edit', compact('menu', 'menu_types', 'days', 'weeks'));
    }


    private function uploadImage(Request $request, string $fieldName, string $directory)
    {
        if (!$request->hasFile($fieldName)) {
            return null;
        }

        $file = $request->file($fieldName);
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $directory . '/' . $fileName;

        $file->move(public_path($directory), $fileName);
        return url("public/".$filePath);

        // storage
        // $fileName = time() . '_' . $file->getClientOriginalName();
        // $filePath = $file->storeAs($directory, $fileName, 'public');
        // return 'public/storage/' . $filePath;
    }


    public function getAvailableDays(Request $request)
    {
        $menuTypeId = $request->get('menu_type_id');
        $week = $request->get('week');

        $menuType = MenuType::findOrFail($menuTypeId);

        $selectedDays = Menu::where('menu_type_id', $menuTypeId)
            ->where('week', $week)
            ->pluck('day')
            ->toArray();

       $allDays = collect(['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'])
        ->take($menuType->days_count)
        ->toArray();

        $availableDays = array_diff($allDays, $selectedDays);

        return response()->json(['availableDays' => array_values($availableDays)]);
    }
}
