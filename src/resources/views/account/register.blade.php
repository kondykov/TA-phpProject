@extends('layouts.account.auth', [
    'formTitle' => 'Регистрация'
])

@section('form')
    <form action="{{ route('register') }}" method="post" role="form" class="text-start">
        @csrf
        @if($errors->any())
            {{ $errors }}
        @endif
        <div class="input-group input-group-outline my-3">
            <label class="form-label">Почта</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="input-group input-group-outline mb-3">
            <label class="form-label">Пароль</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="input-group input-group-outline mb-3">
            <label class="form-label">Повторите пароль</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
        </div>
        <div class="form-check form-switch d-flex align-items-center mb-3">
            <input class="form-check-input" type="checkbox" id="rememberMe" checked>
            <label class="form-check-label mb-0 ms-3" for="rememberMe">Согласен с ... .</label>
        </div>

        <div class="text-center">
            <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Зарегистрировать аккаунт</button>
        </div>
        <p class="mt-4 text-sm text-center">
            Уже зарегистрированы? <a href="{{ route('login') }}"> Войти в аккаунт</a>.
        </p>
    </form>
@endsection


