@extends('layouts.layout')
@section('bodyCss')
    @parent
    g-sidenav-show
@endsection
@section('main',)
    @include('dashboard.components.aside-menu.aside')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('dashboard.components.aside-menu.nav')
        @yield('body')
        @include('dashboard.components.footer')
    </main>
@endsection

@section('head')
    @include('layouts.head')
@endsection
@section('scripts')
    @parent
    @include('layouts.scripts')
@endsection
