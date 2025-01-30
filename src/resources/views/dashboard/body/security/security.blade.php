@extends('dashboard.dashboardLayout')

@section('body')
    <div class="container-fluid py-2">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">{{ __('message.Roles') }}</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            @if( isset($roles) )
                                <table class="table align-items-center mb-0">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            {{ __('message.Role') }}
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            {{ __('message.CreatedAt') }}
                                        </th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($roles as $role)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm"> {{ $role->name }} </h6>
                                                        <p class="text-xs text-secondary mb-0"></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">
                                                {{ $role->created_at->format('Y.m.d')}}
                                            </span>
                                            </td>
                                            <td class="align-middle">
                                                @can('editUser')
                                                    @if($role->name == 'admin')
                                                        <span
                                                            class="text-secondary font-weight-bold text-xs"> {{ __('message.ProtectedProperty') }} </span>
                                                    @else
                                                        <a href="javascript:"
                                                           class="text-secondary font-weight-bold text-xs">
                                                            <i class="material-symbols-rounded opacity-5"> edit </i>
                                                            {{ __('message.Edit') }}
                                                        </a>
                                                    @endif
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                    <td class="align-middle">
                                        <a href="{{ route('security.roles.create.store') }}"
                                           class="btn btn-dark btn-sm mx-3 mt-3"> {{ __('message.CreateRole') }} </a>
                                    </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="pagination">
                                    {{ $roles->fragment('roles')->links() }}
                                </div>
                            @else
                                <div class="mx-3">
                                    <span> {{ __('message.RolesNotFound') }}. </span>
                                    <a href="{{ route('register') }}"> {{ __('message.CreateRole') }}</a>?

                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3"> {{ __('message.Permissions') }} </h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            @if( isset($permissions) )
                                <table class="table align-items-center mb-0">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            {{ __('message.Permission') }}
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            {{ __('message.CreatedAt') }}
                                        </th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($permissions as $permission)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm"> {{ $permission->name }} </h6>
                                                        <p class="text-xs text-secondary mb-0"></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">
                                                {{ $permission->created_at->format('Y.m.d')}}
                                            </span>
                                            </td>
                                            <td class="align-middle">
                                                @can('editUser')
                                                    @if($permission->id > 6)
                                                        <a href="javascript:"
                                                           class="text-secondary font-weight-bold text-xs">
                                                            <i class="material-symbols-rounded opacity-5"> edit </i>
                                                            {{ __('message.Edit') }}
                                                        </a>
                                                    @else
                                                        <span
                                                            class="text-secondary font-weight-bold text-xs"> {{ __('message.ProtectedProperty') }} </span>
                                                    @endif
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="pagination">
                                    {{ $permissions->fragment('permissions')->links() }}
                                </div>
                            @else
                                <div class="mx-3">
                                    <span> {{ __('message.PermissionsNotFound') }}. </span>
                                    <a href="{{ route('register') }}"> {{ __('message.CreatePermission') }}</a>?
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
