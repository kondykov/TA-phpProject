
<a class="navbar-brand font-weight-bolder ms-sm-3 text-sm {{ $color ?? '' }}"
   href="https://demos.creative-tim.com/material-kit/index" rel="tooltip"
   title="Designed and Coded by Creative Tim" data-placement="bottom" target="_blank">
    {{ __('message.AppTitle') }}
</a>
<button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
        data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
        aria-label="Toggle navigation">
    <span class="navbar-toggler-icon mt-2">
        <span class="navbar-toggler-bar bar1"></span>
        <span class="navbar-toggler-bar bar2"></span>
        <span class="navbar-toggler-bar bar3"></span>
    </span>
</button>
<div class="collapse navbar-collapse pt-3 pb-2 py-lg-0 w-100" id="navigation">
    <ul class="navbar-nav navbar-nav-hover ms-auto">
        @can('viewDashboard')
            <li class="nav-item ms-lg-auto">
                <a class="nav-link ps-2 d-flex cursor-pointer align-items-center me-2"
                   href="{{ route('dashboard') }}"
                >
                    <i class="material-symbols-rounded opacity-6 me-2 text-md">dashboard</i>
                    {{__('message.Dashboard')}}
                </a>
            </li>
        @endcan
        <li class="nav-item my-auto ms-3 ms-lg-0">
            @auth
                <a href=" {{ route('logout') }} "
                   class="btn  bg-gradient-dark  mb-0 mt-2 mt-md-0"> {{__('message.Logout')}}</a>
            @else
                <a href=" {{ route('register') }} "
                   class="btn  bg-outline-dark  mb-0 mt-2 mt-md-0">{{ __('message.Register') }}</a>
                <a href=" {{ route('login') }} "
                   class="btn  bg-gradient-dark  mb-0 mt-2 mt-md-0">{{ __('message.Login') }}</a>
            @endauth
        </li>
    </ul>
</div>
