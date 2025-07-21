<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Traits\HasDataTables;
use App\Helpers\{
    LogActivity,
    Common
};

class PermissionController extends Controller
{
    use HasDataTables;
    public function index()
    {
        if (request()->ajax()) {
            $query = Permission::latest();
            return $this->dataTable($query, 'permissions');
        }

        return view('admin.permissions.index');
    }

    public function create()
    {
        return view('admin.permissions.edit');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions',
        ]);
        $data = $request->only('name');
        $permission = Permission::create($data);
        if ($permission) {
            LogActivity::addToLog('permission', 'insert', $data, null);
        }

        return response()->json([
            'success' => true,
            'message' => 'Permission successfully created.',
            'redirect' => route('admin.permissions.index')
        ]);
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name,' . $permission->id,
        ]);

        $data = $request->only('name');

        $changes_exist = Common::get_changes($permission, $data);
        if ($changes_exist) {
            LogActivity::addToLog('permission', 'update', null, $changes_exist);
            $permission->update($data);
        }

        return response()->json([
            'success' => true,
            'message' => 'Permission successfully updated.',
            'redirect' => route('admin.permissions.index')
        ]);
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();

        return response()->json([
            'success' => true,
            'message' => 'Permission successfully deleted.'
        ]);
    }
}
