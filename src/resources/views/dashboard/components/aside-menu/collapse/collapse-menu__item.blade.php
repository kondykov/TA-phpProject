<li class="nav-item">
    <a class="nav-link text-dark {{ (Request::route()->getName() === $route) ? 'active bg-gradient-dark text-white' : 'text-dark' }}" href="{{ $link }}">
        <span class="sidenav-mini-icon"> {{ $name[0] }} </span>
        <span class="sidenav-normal  ms-1  ps-1"> {{ $name }} </span>
    </a>
</li>
