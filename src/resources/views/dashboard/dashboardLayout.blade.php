@extends('layouts.layout')
@section('bodyCss')
    g-sidenav-show
@endsection
@section('main',)
    @include('dashboard.components.aside')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('dashboard.components.nav')
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
    <script>
        function showAsideBar() {
            const htmlBody = document.getElementById('body');
            if (htmlBody.classList.contains('g-sidenav-pinned')) {
                htmlBody.classList.remove('g-sidenav-pinned')
            } else {
                htmlBody.classList.add('g-sidenav-pinned')
            }
        }
    </script>
@endsection
