@extends('dashboard.components.create')

@section('body')
    <div class="container-fluid py-2">
        <div class="row">
            <div class="col-12 text-center">
                <h4 class="mt-5 font-weight-bolder h4">{{ __('message.CreateRoleTitle') }}</h4>
                <h5 class="font-weight-normal text-md opacity-6">{{__('message.CreateRoleSubTitle')}}</h5>
                <div class="multisteps-form mb-5">
                    <!--progress bar-->
                    <div class="row">
                        <div class="col-12 col-lg-8 mx-auto my-5">
                            <div class="card">
                                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                    <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                                        <div class="multisteps-form__progress">
                                            <button class="multisteps-form__progress-btn js-active" type="button"
                                                    title="SetupPerm" id="Setup">
                                                <span>{{ __('message.SetupPermissions') }}</span>
                                            </button>
                                            <button class="multisteps-form__progress-btn" type="button"
                                                    title="Role name" id="Name">
                                                <span>{{ __('message.RoleName') }}</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form class="multisteps-form__form" style="height: 372px;" method="post"
                                          action="{{ route('security.roles.create.store') }}">
                                        @method('POST')
                                        @csrf
                                        <!--single form panel-->
                                        <div class="multisteps-form__panel js-active" data-animation="FadeIn">
                                            <h5 class="font-weight-bold mb-0"> {{ __('message.SetupPermissions') }} </h5>
                                            <p class="mb-0 text-sm">{{ __('message.SetupPermissionsMessage') }}</p>
                                            <div class="multisteps-form__content">
                                                <div class="row mt-3">
                                                    <div class="col">
                                                        <input type="hidden" id="2page" value="214">
                                                        <table class="table align-items-center mb-0">
                                                            <thead>
                                                            <tr>
                                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                    {{ __('message.Permission') }}
                                                                </th>
                                                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                    {{ __('message.AssignPermission') }}
                                                                </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody id="tableBody">
                                                            @foreach($permissions as $permission)
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-flex px-2 py-1">
                                                                            <div
                                                                                class="d-flex flex-column justify-content-center">
                                                                                <h6 class="mb-0 text-sm"> {{ $permission->name }} </h6>
                                                                                <p class="text-xs text-secondary mb-0"></p>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td class="d-flex justify-content-center align-items-center">
                                                                        <div
                                                                            class=" form-check form-switch align-content-center px-2 py-1">
                                                                            <input class="form-check-input"
                                                                                   type="checkbox"
                                                                                   name="perm[{{ $permission->id }}]">
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                        <div class="pagination">
                                                            {{ $permissions->links() }}
                                                        </div>
                                                    </div>
                                                    <div class="button-row d-flex mt-4">
                                                        <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next"
                                                                type="button"
                                                                title="Next"> {{__('message.Next')}} </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--single form panel-->
                                        <div class="multisteps-form__panel" data-animation="FadeIn">
                                            <div class="row text-center mt-4">
                                                <div class="col-10 mx-auto">
                                                    <h5 class="font-weight-bolder mb-0"> {{ __('message.WriteRoleName') }} </h5>
                                                    <p>{{ __('message.WriteRoleName') }}</p>
                                                </div>
                                            </div>
                                            <div class="multisteps-form__content">
                                                <div class="multisteps-form__content">
                                                    <div class="row mt-3">
                                                        <div class="col-12">
                                                            <div class="input-group input-group-dynamic">
                                                                <label
                                                                    class="form-label"> {{ __('message.RoleName') }} </label>
                                                                <input class="multisteps-form__input form-control"
                                                                       type="text"
                                                                       id="roleName" value="{{ session('roleName') }}"
                                                                       onfocus="focused(this)"
                                                                       onfocusout="defocused(this)"
                                                                       name="roleName"
                                                                >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="button-row d-flex mt-4">
                                                        <button class="btn btn-outline-dark mb-0 js-btn-prev"
                                                                type="button"
                                                                title="Prev"> {{ __('message.Previous') }}
                                                        </button>
                                                        <button class="btn bg-gradient-dark ms-auto mb-0" type="submit"
                                                                title="Send"> {{ __('message.CreateRole') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    @parent
    <script>
        let params = new URLSearchParams({
            page: 2
        });

        let cell = `
            <tr>
                <td>
                    <div class="d-flex px-2 py-1">
                        <div
                            class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"> </h6>
                            <p class="text-xs text-secondary mb-0"></p>
                        </div>
                    </div>
                </td>
                <td class="d-flex justify-content-center align-items-center">
                    <div
                        class=" form-check form-switch align-content-center px-2 py-1">
                        <input class="form-check-input"
                               type="checkbox"
                               name="perm[]">
                    </div>
                </td>
            </tr>
        `

        document.getElementById('next').addEventListener('click', function () {
            fetch(`/dashboard/security/roles/create?${params}`, {
                method: 'GET', // или 'GET'
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Не забудьте про CSRF-токен
                },
                // body: JSON.stringify({ items: 'dg' }) // Отправляем данные
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data); // Обработка ответа от сервера
                    let tbody = document.getElementById('tableBody')
                    data.permissions.data.forEach(item => {
                        const row = document.createElement('tr');

                        // Создаем ячейку с дивом для информации
                        const infoCell = document.createElement('td');
                        infoCell.innerHTML = `
                        <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">${item.title || "Без названия"}</h6>
                                <p class="text-xs text-secondary mb-0">${item.description || "Нет описания"}</p>
                            </div>
                        </div>
                    `;
                        row.appendChild(infoCell);
                        tbody.appendChild(row)
                    })
                })
                .catch(error => console.error('Error:', error));
        });


    </script>
@endsection
