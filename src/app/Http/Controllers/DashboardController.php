<?php

namespace App\Http\Controllers;

use App\Contracts\IdentityRepositoryInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    private IdentityRepositoryInterface $identityRepository;

    public function __construct(IdentityRepositoryInterface $identityRepository)
    {

        $this->identityRepository = $identityRepository;
    }

    public function GetDashboardView(Request $request)
    {
        //App::setLocale('ru');

        return view('dashboard.body.dashboard', [
            'items' => User::paginate(10),
            'request' => $request,
        ]);
    }

    public function GetUsersTableView(Request $request)
    {
        $users = User::paginate(5);
        return View::make('dashboard.body.usersTable')->with('users', $users);
    }

    public function GetUserView(Request $request)
    {

    }

    public function GetUserEditView(Request $request)
    {

    }

    public function GetSecurityView(Request $request)
    {
        $roles = Role::paginate(10, ['*'], 'roles')->fragment('roles');
        $permissions = Permission::paginate(10, ['*'], 'permissions')->fragment('permissions');

        return view('dashboard.body.security.security', [
            'roles' => $roles,
            'permissions' => $permissions,
        ]);
    }

    public function GetRolesCreateView(Request $request)
    {
        if ($request->input('page')) {
            $permissions = Permission::paginate(1, ['*'], 'page', $request->page);

            return [
                'permissions' => $permissions,
            ];
        }

        $permissions = Permission::paginate(100);

        return view('dashboard.body.security.rolesCreate', [
            'permissions' => $permissions,
            'query' => '',
        ]);
    }

    public function CreateRole(Request $request)
    {
        $validated = $request->validate([
            'roleName' => 'required|string',
            'permissions' => 'array|nullable',
        ]);

        $roleName = $request->input('roleName');
        $permissions = $request->input('perm');

        $this->identityRepository->CreateRole($roleName, $permissions);

        return to_route('security.show');
    }

    public function GetRoleEditView(Request $request, $roleId)
    {
        try {
            $role = Role::findById($roleId);
            if($roleId == 1) {
                return redirect::route('security.show')->with('error', __('message.Permission denied'));
            }
        } catch (\Throwable $e) {
            return redirect::route('security.show')->with('error', $e->getMessage());
        }

        return view('dashboard.body.security.rolesEdit', [
            'role' => $role,
            'permissions' => Permission::paginate(100),
        ]);
    }

    public function UpdateRole(Request $request, $roleId)
    {
        $roleName = $request->input('roleName');
        $permissions = $request->input('perm');
        $this->identityRepository->UpdateRole($roleId, $roleName, $permissions);
        return to_route('security.show', []);
    }

    public function DeleteRole(Request $request, $roleId)
    {
        if($roleId == 1) {
            return redirect::route('security.show')->with('error', __('message.Permission denied'));
        }
        $this->identityRepository->DeleteRole($roleId);
        return to_route('security.show');
    }
}
