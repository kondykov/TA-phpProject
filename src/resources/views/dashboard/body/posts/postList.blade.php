@extends('dashboard.dashboardLayout')

@section('body')
    @parent
    <div class="container-fluid py-2">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header pb-0">
                        <div class="d-lg-flex">
                            <div>
                                <h5 class="mb-0">All posts</h5>
                                <p class="text-sm mb-0">
                                    All posts for views, edit and delete.
                                </p>
                            </div>
                            <div class="ms-auto my-auto mt-lg-0 mt-4">
                                <div class="ms-auto my-auto">
                                    <a
                                        href="{{ route('dashboard.posts.create') }}"
                                        class="btn bg-gradient-dark btn-sm mb-0"
                                    >
                                        +&nbsp; New Product
                                    </a>
                                    {{--                                    <button type="button" class="btn btn-outline-primary btn-sm mb-0"
                                                                                data-bs-toggle="modal" data-bs-target="#import">
                                                                            Import
                                                                        </button>
                                                                        <div class="modal fade" id="import" tabindex="-1" aria-hidden="true">
                                                                            <div class="modal-dialog mt-lg-10">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="ModalLabel">Import CSV</h5>
                                                                                        <i class="material-symbols-rounded ms-3">file_upload</i>
                                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                                                aria-label="Close"></button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <p>You can browse your computer for a file.</p>
                                                                                        <div class="input-group input-group-dynamic mb-3">
                                                                                            <label class="form-label">Browse file...</label>
                                                                                            <input type="email" class="form-control" onfocus="focused(this)"
                                                                                                   onfocusout="defocused(this)">
                                                                                        </div>
                                                                                        <div class="form-check is-filled">
                                                                                            <input class="form-check-input" type="checkbox" value=""
                                                                                                   id="importCheck" checked="">
                                                                                            <label class="custom-control-label" for="importCheck">I accept
                                                                                                the terms and conditions</label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn bg-gradient-secondary btn-sm"
                                                                                                data-bs-dismiss="modal">Close
                                                                                        </button>
                                                                                        <button type="button" class="btn bg-gradient-dark btn-sm">Upload
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1"
                                                                                data-type="csv" type="button" name="button">Export
                                                                        </button>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-0">
                        @if($posts->total())
                            <div class="table-responsive">
                                <div
                                    class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                                    <div class="dataTable-top">
                                        <div class="dataTable-dropdown"><label><select class="dataTable-selector">
                                                    <option value="5">5</option>
                                                    <option value="10">10</option>
                                                    <option value="15">15</option>
                                                    <option value="20">20</option>
                                                    <option value="25" selected>25</option>
                                                </select> entries per page</label></div>
                                        <div class="dataTable-search"><input class="dataTable-input"
                                                                             placeholder="Search..."
                                                                             type="text"></div>
                                    </div>
                                    <div class="dataTable-container">
                                        <table class="table table-flush dataTable-table" id="products-list">
                                            <thead class="thead-light">
                                            <tr>
                                                <th data-sortable="" style="width: 66.3223%;">
                                                    <a href="#" class="dataTable-sorter">Post</a>
                                                </th>
                                                <th data-sortable="" style="width: 29.3388%;">
                                                    <a href="#" class="dataTable-sorter">Status</a>
                                                </th>
                                                <th data-sortable="" style="width: 29.3388%;">
                                                    <a href="#" class="dataTable-sorter">Action</a>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($posts as $post)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex">
                                                            @if($post->images()->first())
                                                                <img class="w-10 ms-3"
                                                                     src="{{ ($post->images()->first())->url }}"
                                                                     alt="hoodie">
                                                            @else
                                                                <img class="w-10 ms-3"
                                                                     src="http://dummyimage.com/80"
                                                                     alt="hoodie">
                                                            @endif
                                                            <h6 class="ms-3 my-auto"> {{ $post->title }}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        @php
                                                            if ($post->visible) {
                                                                echo '<span class="badge badge-success badge-sm">Visible</span>';
                                                            } else {
                                                                echo '<span class="badge badge-danger badge-sm">Hidden</span>';
                                                            }
                                                        @endphp
                                                    </td>
                                                    <td class="text-sm">
                                                        @can('editPost')
                                                            <a href="{{ route('dashboard.posts.edit.show', ['id' => $post->id]) }}"
                                                               class="mx-3"
                                                               data-bs-toggle="tooltip"
                                                               data-bs-original-title="Edit product"
                                                            >
                                                                <i class="material-symbols-rounded text-secondary position-relative text-lg">drive_file_rename_outline</i>
                                                            </a>
                                                        @endcan
                                                        @can('deletePost')
                                                            <form
                                                                action="{{ route('dashboard.posts.delete.store', ['id' => $post->id]) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <a onclick="this.closest('form').submit();"
                                                                   class="mx-3"
                                                                   data-bs-toggle="tooltip"
                                                                   data-bs-original-title="Delete product"
                                                                >
                                                                    <i class="material-symbols-rounded text-secondary position-relative text-lg">
                                                                        delete
                                                                    </i>
                                                                </a>
                                                            </form>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="dataTable-bottom">
                                        <div class="dataTable-info">Showing {{ $posts->firstItem() }}
                                            to {{ $posts->lastItem() }} of {{ $posts->total() }} entries
                                        </div>
                                        {{ $posts->withQueryString()->links() }}
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="container-fluid mb-3 mt-2">
                                <span class="m-2"> {{ __('message.PostsNotFound') }}. </span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
