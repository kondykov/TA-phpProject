@extends('dashboard.components.aside-menu.collapse.collapse-menu', [
    'icon' => 'table_view',
    'title' => __('message.Posts'),
    'anchor' => $anchor,
    'routes' => $routes
])

@section('collapse-body')
    @include('dashboard.components.aside-menu.collapse.collapse-menu__item', [
        'link' => route('dashboard.posts.show'),
        'name' => __('message.PostList'),
        'route' => $routes[0]
    ])
    @include('dashboard.components.aside-menu.collapse.collapse-menu__item', [
        'link' => route('dashboard.posts.create'),
        'name' => __('message.CreatePost'),
        'route' => $routes[1],
    ])
@endsection
