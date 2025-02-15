@extends('layouts.layoutWithAssets')

@section('head')
    @parent
@endsection

@section('main')
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    @include('components.navigation.transparent', [
        'color' => 'text-white'
    ])
    {{ Auth::getUser() }}
    @verbatim
    <div id="app">
        <promo-component></promo-component>

        <chat-component></chat-component>
    </div>
    @endverbatim

    @include('components.footer')
@endsection

@section('scripts')
    @parent
    @vite('resources/js/app.js')
    <script>
        let message = 20;
    </script>
@endsection
