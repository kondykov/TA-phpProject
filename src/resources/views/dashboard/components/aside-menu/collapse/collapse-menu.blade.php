<li class="nav-item">
    <a
        data-bs-toggle="collapse"
        href="#{{$anchor}}"
        class="nav-link text-dark "
        aria-controls="{{$anchor}}"
        role="button"
        aria-expanded="false"
    >
        <i class="material-symbols-rounded opacity-5 {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}"> {{ $icon }} </i>
        <span class="nav-link-text ms-1 ps-1"> {{ $title }} </span>
    </a>
    <div class="collapse " id="{{ $anchor }}">
        <ul class="nav">
            @yield('collapse-body')
        </ul>
    </div>
</li>
