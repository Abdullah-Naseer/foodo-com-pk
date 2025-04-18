<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Traits\HasDataTables;
use App\Helpers\{
    LogActivity,
    Common
};


class RoleController extends Controller
{
    use HasDataTables;

    public function index()
    {

        if (request()->ajax()) {
            $query = Role::with('permissions')->latest();
            return $this->dataTable(
                $query,
                'roles',
                function ($dataTable) {
                    $dataTable->addColumn('permissions', function ($role) {
                        return $role->permissions->map(function ($permission) {
                            return '<span class="badge bg-success">' . e($permission->name) . '</span>';
                        })->implode(' ');
                    })->rawColumns(['permissions']);
                }
            );
        }

        return view('admin.roles.index');
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('permissions'));
    }

    public function show(string $id)
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);

        $data = $request->all();

        $role = Role::create([
            'name' => $data['name'],
        ]);

        if ($request->has('permissions')) {
            $role->permissions()->sync($request->permissions);
        }
        LogActivity::addToLog('role', 'insert', $data, null);

        return response()->json([
            'success' => true,
            'message' => 'Role successfully created.',
            'redirect' => route('admin.roles.index')
        ]);
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
        ]);

        $data = $request->all();

        $changes_exist = Common::get_changes($role, $data);
        if ($changes_exist) {
            LogActivity::addToLog('role', 'update', null, $changes_exist);
            $role->update(['name' => $data['name']]);
        }

        if (isset($data['permissions'])) {
            $role->permissions()->sync($data['permissions']);
        }

        return response()->json([
            'success' => true,
            'message' => 'Role successfully updated.',
            'redirect' => route('admin.roles.index')
        ]);
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return response()->json([
            'success' => true,
            'message' => 'Role successfully deleted.'
        ]);
    }
}
