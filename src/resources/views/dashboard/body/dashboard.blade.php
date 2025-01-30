@extends('dashboard.dashboardLayout')

@section('body')
{{--    <div class="container-fluid py-2">
        <div class="row min-vh-75">
            <div class="col-lg-8 col-md-12 mx-auto">
                <div class="places-sweet-alerts mt-5">
                    <h2 class="text-center">Sweet Alert</h2>
                    <p class="category text-center">A beautiful plugin, that replace the classic alert, Handcrafted by
                        our friend <a target="_blank" href="https://twitter.com/t4t5">Tristan Edwards</a>. Please check
                        out the <a href="https://sweetalert2.github.io/" target="_blank">full documentation.</a></p>
                </div>
                <div class="row mt-5">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <p class="card-text">Basic example</p>
                                <button class="btn bg-gradient-dark mb-0 mx-auto" onclick="material.showSwal('basic')">
                                    Try me!
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-4 mt-md-0">
                        <div class="card">
                            <div class="card-body text-center">
                                <p class="card-text">A success message</p>
                                <button class="btn bg-gradient-dark mb-0 mx-auto"
                                        onclick="material.showSwal('success-message')">Try me!
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-4 mt-md-0">
                        <div class="card">
                            <div class="card-body text-center">
                                <p class="card-text">Custom HTML description</p>
                                <button class="btn bg-gradient-dark mb-0 mx-auto"
                                        onclick="material.showSwal('custom-html')">Try me!
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <p class="card-text">Gitgub avatar request</p>
                                <button class="btn bg-gradient-dark mb-0 mx-auto"
                                        onclick="material.showSwal('input-field')">Try me!
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-4 mt-md-0">
                        <div class="card">
                            <div class="card-body text-center">
                                <p class="card-text">A title with a text under</p>
                                <button class="btn bg-gradient-dark mb-0 mx-auto"
                                        onclick="material.showSwal('title-and-text')">Try me!
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-4 mt-md-0">
                        <div class="card">
                            <div class="card-body text-center">
                                <p class="card-text">A message with auto close</p>
                                <button class="btn bg-gradient-dark mb-0 mx-auto"
                                        onclick="material.showSwal('auto-close')">Try me!
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4 mb-5">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <p class="card-text">A warning message, with a function attached to the "Confirm"
                                    Button...</p>
                                <button class="btn bg-gradient-dark mb-0 mx-auto"
                                        onclick="material.showSwal('warning-message-and-confirmation')">Try me!
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-4 mt-md-0">
                        <div class="card">
                            <div class="card-body text-center">
                                <p class="card-text">...and by passing a parameter, you can execute something else for
                                    "Cancel"</p>
                                <button class="btn bg-gradient-dark mb-0 mx-auto"
                                        onclick="material.showSwal('warning-message-and-cancel')">Try me!
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-4 mt-md-0">
                        <div class="card">
                            <div class="card-body text-center">
                                <p class="card-text">Right-to-left support for Arabic, Persian, Hebrew, and other RTL
                                    languages</p>
                                <button class="btn bg-gradient-dark mb-0 mx-auto"
                                        onclick="material.showSwal('rtl-language')">Try me!
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer py-4  ">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            2025,
                            made with <i class="fa fa-heart"></i> by
                            <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative
                                Tim</a>
                            for a better web.
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative
                                    Tim</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted"
                                   target="_blank">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted"
                                   target="_blank">License</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>--}}

<form method="GET" >
    @csrf
    <table>
        <thead>
        <tr>
            <th>Название</th>
            <th>Цена</th>
            <th>Выбрать</th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $key => $item)
            <tr>
                <td>
                    <input type="text" name="items[{{ $key }}][name]"
                           value="{{ old('items.'.$key.'.name', $item->name) }}">
                    <!-- Скрытое поле для сохранения значения -->
                    <input type="hidden" name="items[{{ $key }}][original_name]"
                           value="{{ $item->name }}">
                </td>
                <td>
                    <input type="number" name="items[{{ $key }}][price]"
                           value="{{ old('items.'.$key.'.price', $item->id) }}">
                    <!-- Скрытое поле для сохранения значения -->
                    <input type="hidden" name="items[{{ $key }}][original_price]"
                           value="{{ $item->id }}">
                </td>
                <td>
                    <input type="checkbox" name="items[{{ $key }}][selected]"
                        {{ old('items.'.$key.'.selected') ? 'checked' : '' }}>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Пагинация -->
    {{ $items->links() }}

    <button type="submit">Сохранить</button>
</form>

@endsection
