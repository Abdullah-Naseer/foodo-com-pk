<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Traits\HasDataTables;
use App\Helpers\{
    LogActivity,
    Common
};
use Illuminate\Support\Str;


class CategoriesController extends Controller
{
    use HasDataTables;

    public function index(Request $request)
    {
        if (request()->ajax()) {
            $trash = $request->get("trash");
            $query = Category::latest();
            $query = $trash == "true" ? $query->onlyTrashed() : $query;
            return $this->dataTable($query, 'categories');
        }

        return view('admin.categories.index');
    }


    public function create()
    {
        return view("admin.categories.edit");
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name'
        ]);

         $category = Category::where('slug', '=', Str::slug($request->name))->first();
        if ($category == null) {
            $category = new  Category();
        }
        $category->name = $request->name;
        $category->slug =  Str::slug($request->name);
        $category->save();
        
        if ($category) {
            LogActivity::addToLog('category', 'insert', $category, null);
        }
        return response()->json([
            'success' => true,
            'message' => 'Category successfully created.',
            'redirect' => route('admin.categories.index')
        ]);
    }


    public function show(string $id)
    {
        //
    }


    public function edit(Category $category)
    {
        return view("admin.categories.edit", compact('category'));
    }


    public function update(Request $request, Category $category)
    {
        $data = $request->only('name');

        $changes_exist = Common::get_changes($category, $data);
        if ($changes_exist) {
           $category->update([
                'name' => $data['name'],
                'slug' => Str::slug($data['name'])
            ]);
            
            LogActivity::addToLog('category', 'update', null, $changes_exist);
        }

        return response()->json([
            'success' => true,
            'message' => 'Category successfully updated.',
            'redirect' => route('admin.categories.index')
        ]);
    }


    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json([
            'success' => true,
            'message' => 'Page successfully deleted.'
        ]);
    }
}
