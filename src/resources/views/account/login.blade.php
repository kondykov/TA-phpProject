@extends('layouts.account.auth', [
    'formTitle' => 'Войти'
])

@section('form')
    <form action="{{ route('login') }}" method="post" role="form" class="text-start">
        @csrf
        <div class="input-group input-group-outline my-3">
            <label class="form-label">Почта</label>
            <input type="email" class="form-control" id="email" name="email" value="test@example.com">
        </div>
        <div class="input-group input-group-outline mb-3">
            <label class="form-label">Пароль</label>
            <input type="password" class="form-control" id="password" name="password" value="password">
        </div>
        <div class="form-check form-switch d-flex align-items-center mb-3">
            <input class="form-check-input" type="checkbox" id="rememberMe" checked>
            <label class="form-check-label mb-0 ms-3" for="rememberMe">Запомнить меня</label>
        </div>
        <div class="text-center">
            <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Войти</button>
        </div>
        <p class="mt-4 text-sm text-center">
            Нет аккаунта? <a href="{{ route('register') }}"> Зарегистрируйтесь</a>.
        </p>
    </form>
@endsection


