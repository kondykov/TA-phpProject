@extends('layouts.layoutWithAssets')



@section('main')
    @include('components.header')
    @include('components.promo', [
    'mainTitle' => 'Ваш Заголовок', 'subTitle' => 'Ваш Подзаголовок'
    ])

    @can('edit')
        EDITABLE
    @endcan

    @role('super-user')
        SUPER-USER
    @endrole
@endsection

