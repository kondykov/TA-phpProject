<div class="container-fluid py-2">
    <div class="row">
        <div class="col-lg-6">
            <h4>Make the changes below</h4>
            <p>We’re constantly trying to express ourselves and actualize our dreams. If you have the opportunity to
                play.</p>
        </div>
        <div class="col-lg-6 text-right d-flex flex-column justify-content-center">
            <button type="button" class="btn bg-gradient-dark mb-0 ms-lg-auto me-lg-0 me-auto mt-lg-0 mt-2">Save
            </button>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-4">
            <div class="card mt-4" data-animation="true">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <a class="d-block blur-shadow-image" id="image">
                        <img
                            src="{{ $post->images()->first()->url ?? 'https://dummyimage.com/1600x900' }}"
                            alt="img-blur-shadow"
                            class="img-fluid shadow border-radius-lg"
                        >
                    </a>
                    <div class="colored-shadow"
                         style="background-image: url({{ $post->images()->first() ?? 'https://dummyimage.com/600x400' }});"></div>
                </div>
                <div class="card-body text-center">
                    <div class="mt-n6 mx-auto">
                        <button
                            class="btn bg-gradient-dark btn-sm mb-0 me-2"
                            type="button"
                            name="button"
                            id="sendDataBtn"
                            data-bs-toggle="modal"
                            data-bs-target="#upImg"
                        >
                            Edit
                        </button>

                        <div class="modal fade" id="upImg" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title font-weight-normal" id="exampleModalLabel">Select
                                            image for update</h6>
                                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                                aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="col-12 input-group input-group-lg input-group-outline my-3">
                                                <input class="form-control form-control-lg" type="file" name="file"
                                                       id="file">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn bg-gradient-secondary"
                                                data-bs-dismiss="modal">Close
                                        </button>
                                        <button type="button" class="btn bg-gradient-primary" id="updateImage">
                                            Send
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button
                            class="btn btn-outline-dark btn-sm mb-0"
                            type="button"
                            name="button"
                            data-bs-target="#removeImg"
                            data-bs-toggle="modal"
                        >
                            Remove
                        </button>

                        <div class="modal fade" id="removeImg" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title font-weight-normal" id="exampleModalLabel">Removing
                                            image</h6>
                                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                                aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="py-3 text-center">
                                            <i class="material-symbols-rounded h1 text-secondary">
                                                notifications_active
                                            </i>
                                            <h4 class="text-gradient text-danger mt-4">You should read this!</h4>
                                            <p>Are you sure you want to delete the image? The action cannot be
                                                undone.</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn bg-gradient-secondary"
                                                data-bs-dismiss="modal">Go back
                                        </button>
                                        <button type="button" class="btn bg-gradient-primary" id="rm-img">Remove
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <h5 class="font-weight-normal mt-4">
                        {{ $post->title }}
                    </h5>
                    <p class="mb-0">
                        {{ $post->content }}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-8 mt-lg-0 mt-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="font-weight-bolder">Product Information</h5>
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="input-group input-group-dynamic">
                                <label class="form-label">Name</label>
                                <input
                                    type="text"
                                    class="form-control w-100"
                                    onfocus="focused(this)"
                                    onfocusout="defocused(this)"
                                    value="{{$post->title}}"
                                    id="title"
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
                                    id="content"
                                >{{ $post->content }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
