@extends('layouts.layoutWithAssets')



@section('main')
    @include('components.navigation.white-fixed')
    @include('components.promo', [
    'mainTitle' => 'Home', 'subTitle' => 'The home page'
    ])

    @include('layouts.posts')

    @include('components.footer')
@endsection

