<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2  bg-white my-2"
       id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
           aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand px-4 py-3 m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard "
           target="_blank">
            <img src="{{ asset('img/logo-ct-dark.png') }}" class="navbar-brand-img" width="26" height="26"
                 alt="main_logo">
            <span class="ms-1 text-sm text-dark"> {{ __('message.AppTitle')  }} </span>
        </a>
    </div>
    <hr class="horizontal dark mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav nav">
            @include('dashboard.components.aside-menu.btn-aside', [
                'btnName' => __('message.Dashboard'),
                'link' => route('dashboard'),
                'icon' => 'dashboard',
                'route' => 'dashboard'
            ])

            @include('dashboard.components.aside-menu.btn-aside', [
                'btnName' => __('message.Users'),
                'link' => route('users'),
                'icon' => 'group',
                'route' => 'users'
            ])

            @include('dashboard.components.aside-menu.btn-aside', [
                'btnName' => __('message.Security'),
                'link' => route('security.show'),
                'icon' => 'admin_panel_settings',
                'route' => [
                    'security.show',
                    'security.roles.create.show',
                    'security.roles.edit.show',
                ],
                'withChildren' => true,
            ])

            @include('dashboard.components.aside-menu.collapse.post-collapse', [
                'anchor' => 'posts',
                'routes' => [
                    'dashboard.body.posts.show',
                    'dashboard.body.posts.create'
                ]
            ])
        </ul>

    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
        <div class="mx-3">
            <a class="btn btn-outline-dark mt-4 w-100"
               href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard?ref=sidebarfree"
               type="button">Documentation</a>
            <a class="btn btn-outline-dark mt-4 w-100"
               href="{{ route('home') }}"
               type="button">Exit from dashboard</a>
            <a class="btn bg-gradient-dark w-100"
               href="{{ route('logout') }}"
               type="button"> {{ __('message.Logout') }}</a>
        </div>
    </div>
</aside>
