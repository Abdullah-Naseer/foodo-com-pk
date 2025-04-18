<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuType;
use App\Traits\HasDataTables;
use Illuminate\Http\Request;
use App\Helpers\{
    LogActivity,
    Common
};


class MenuTypesController extends Controller
{
    use HasDataTables;

    public function index(Request $request)
    {
        if (request()->ajax()) {
            $trash = $request->get("trash");
            $query = MenuType::latest();
            $query = ($trash == "true") ? $query->onlyTrashed() : $query;

            return $this->dataTable($query, 'menu-types');
        }

        return view('admin.menu_types.index');
    }

    public function create()
    {
        return view('admin.menu_types.edit');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|unique:menu_types,type',
            'days_count' => 'required|integer|max:7'
        ]);

        $data = $request->all();

        $existing = MenuType::withTrashed()->where('type', $data['type'])->first();
        if ($existing) {
            if ($existing->trashed()) {
                $existing->restore();
                $existing->update($data);

                LogActivity::addToLog('menu-type', 'restore', $existing, null);

                return response()->json([
                    'success' => true,
                    'message' => 'Menu Type successfully created.',
                    'redirect' => route('admin.menu-types.index'),
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'The Menu Type already exists.',
                ], 422);
            }
        }

        $menuType = MenuType::create($data);

        if ($menuType) {
            LogActivity::addToLog('menu-type', 'insert', $menuType, null);
        }

        return response()->json([
            'success' => true,
            'message' => 'Menu Type successfully created.',
            'redirect' => route('admin.menu-types.index'),
        ]);
    }

    public function show(string $id)
    {
        //
    }

    public function edit(MenuType $menuType)
    {
        return view('admin.menu_types.edit', compact('menuType'));
    }

    public function update(Request $request, MenuType $menuType)
    {
        $request->validate([
            'type' => 'required|unique:menu_types,type,' . $menuType->id,
             'days_count' => 'required|integer|max:7'
        ]);

        $data = $request->all();

        $changes_exist = Common::get_changes($menuType, $data);
        if ($changes_exist) {
            LogActivity::addToLog('menu-type', 'update', null, $changes_exist);
            $menuType->update($data);
        }

        return response()->json([
            'success' => true,
            'message' => 'Menu Type successfully updated.',
            'redirect' => route('admin.menu-types.index'),
        ]);
    }

    public function destroy(MenuType $menuType)
    {
        $menuType->delete();

        return response()->json([
            'success' => true,
            'message' => 'Menu type successfully deleted.'
        ]);
    }
}
