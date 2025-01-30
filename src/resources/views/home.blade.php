@extends('layouts.layoutWithAssets')



@section('main')
    @include('components.header')
    @include('components.promo', [
    'mainTitle' => 'Ваш Заголовок', 'subTitle' => 'Ваш Подзаголовок'
    ])
@endsection

