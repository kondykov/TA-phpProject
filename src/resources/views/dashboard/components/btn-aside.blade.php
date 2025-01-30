<li class="nav-item">
    @if( isset($withChildren) )
        <a class="nav-link {{ (in_array(Request::route()->getName(), $route)) ? 'active bg-gradient-dark text-white' : 'text-dark' }}" href="{{ $link ?? '#'}}">
            <i class="material-symbols-rounded opacity-5"> {{ $icon ?? 'table_view' }} </i>
            <span class="nav-link-text ms-1"> {{ $btnName }} </span>
        </a>
    @else
        <a class="nav-link {{ (Request::route()->getName() == $route) ? 'active bg-gradient-dark text-white' : 'text-dark' }}" href="{{ $link ?? '#'}}">
            <i class="material-symbols-rounded opacity-5"> {{ $icon ?? 'table_view' }} </i>
            <span class="nav-link-text ms-1"> {{ $btnName }} </span>
        </a>
    @endif
</li>
