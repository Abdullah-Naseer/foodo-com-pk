<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Traits\HasDataTables;
use App\Helpers\{
    LogActivity,
    Common
};
use Illuminate\Http\Request;

class UserController extends Controller
{
    use HasDataTables;
    public function index(Request $request)
    {

        if (request()->ajax()) {

            $trash = $request->get("trash");
            $query = User::with('roles.permissions')->latest();
            $query = ($trash == "true") ? $query->onlyTrashed() : $query;

            return $this->dataTable(
                $query,
                'users',
                function ($dataTable) {
                    $dataTable
                        ->addColumn('roles', function ($user) {
                            return $user->roles->map(function ($role) {
                                return '<span class="badge bg-success">' . e($role->name) . '</span>';
                            })->implode(' ');
                        })
                        ->addColumn('role_permissions', function ($user) {
                            $permissions = $user->roles->flatMap(function ($role) {
                                return $role->permissions;
                            })->unique('id');

                            return $permissions->map(function ($permission) {
                                return '<span class="badge bg-primary">' . e($permission->name) . '</span>';
                            })->implode(' ');
                        })
                        ->rawColumns(['roles', 'role_permissions']);
                }
            );
        }


        return view('admin.users.index');
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('roles'));
    }

    public function show(string $id)
    {
        //
    }

    public function store(CreateUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->syncRoles($request->roles);
        LogActivity::addToLog('user', 'insert', $user, null);

        return response()->json([
            'success' => true,
            'message' => 'user successfully created.',
            'redirect' => route('admin.users.index')
        ]);
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('roles', 'user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->only(['name', 'email']);
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $changes_exist = Common::get_changes($user, $data);
        if ($changes_exist) {
            LogActivity::addToLog('users', 'update', null, $changes_exist);
            $user->update($data);
        }

        $user->syncRoles($request->roles);

        return response()->json([
            'success' => true,
            'message' => 'user successfully updated.',
            'redirect' => route('admin.users.index')
        ]);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'User successfully deleted.'
        ]);
    }
}
