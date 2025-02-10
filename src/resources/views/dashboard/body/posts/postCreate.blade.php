@extends('dashboard.dashboardLayout')

@section('body')
    @parent
    <div class="container-fluid py-2">
        <div class="row min-vh-80">
            <div class="col-lg-8 col-md-10 col-12 m-auto">
                <h3 class="mt-3 mb-0 text-center">Add new Product</h3>
                <p class="lead font-weight-normal opacity-8 mb-7 text-center">This information will let us know more about you.</p>
                <div class="card">
                    <div class="card-header p-0 position-relative mt-n5 mx-3 z-index-2">
                        <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                            <div class="multisteps-form__progress">
                                <button class="multisteps-form__progress-btn js-active" type="button" title="Product Info">
                                    <span>Product Info</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form
                            class="multisteps-form__form"
                            style="height: 387px;"
                            href="{{ route('dashboard.posts.create.store') }}"
                            method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <!--single form panel-->
                            <div class="multisteps-form__panel pt-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
                                <h5 class="font-weight-bolder">Product Information</h5>
                                <div class="multisteps-form__content">
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <div class="input-group input-group-dynamic">
                                                <label for="exampleFormControlInput1" class="form-label">Title</label>
                                                <input
                                                    class="multisteps-form__input form-control"
                                                    type="text"
                                                    onfocus="focused(this)"
                                                    onfocusout="defocused(this)"
                                                    name="title"
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 input-group input-group-dynamic">
                                            <textarea
                                                class="form-control"
                                                rows="5"
                                                placeholder="Say a few words about who you are or what you're working on."
                                                spellcheck="false"
                                                name="content"
                                            ></textarea>
                                        </div>
                                        <div class="col-12 input-group input-group-lg input-group-outline my-3">
                                            <input class="form-control form-control-lg" type="file" name="file" id="file1">
                                        </div>
                                    </div>
                                    <div class="button-row d-flex mt-4">
                                        <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="submit" title="Submit">Send</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script src="{{ asset('js/plugins/dropzone.js') }}"></script>
    <script type="text/javascript">
        Dropzone.options.dropzone =
            {
                maxFilesize: 2,
                renameFile: function (file) {
                    var dt = new Date();
                    var time = dt.getTime();
                    return time + file.name;
                },
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                addRemoveLinks: true,
                timeout: 60000,
                success: function (file, response) {
                    console.log(response);
                },
                error: function (file, response) {
                    return false;
                }
            };
    </script>
@endsection
