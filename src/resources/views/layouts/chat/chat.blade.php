@extends('layouts.layoutWithAssets')

@section('main')
    <div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n6">
        <div class="section my-5">
            <div class="container">
                <h2>Chat</h2>
                <div class="row flex-row">
                    <div class="col-lg-4">
                        <div class="card max-height-vh-70 overflow-auto overflow-x-hidden mb-5 mb-lg-0">
                            <form class="card-header">
                                <div class="input-group input-group-outline">
                                    <label class="form-label">Search contact</label>
                                    <input type="text" class="form-control">
                                </div>
                            </form>
                            <div class="card-body p-2">
                                <a href="javascript:;" class="d-block p-2 border-radius-lg bg-gradient-dark">
                                    <div class="d-flex p-2">
                                        <img alt="Image" src="../assets/img/team-2.jpg" class="avatar shadow">
                                        <div class="ms-3">
                                            <div class="justify-content-between align-items-center">
                                                <h6 class="text-white mb-0">Charlie Watson
                                                    <span class="badge badge-success"></span>
                                                </h6>
                                                <p class="text-white mb-0 text-sm">Typing...</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript:;" class="d-block p-2">
                                    <div class="d-flex p-2">
                                        <img alt="Image" src="../assets/img/team-1.jpg" class="avatar shadow">
                                        <div class="ms-3">
                                            <h6 class="mb-0">Jane Doe</h6>
                                            <p class="text-muted text-xs mb-2">1 hour ago</p>
                                            <span class="text-muted text-sm col-11 p-0 text-truncate d-block">Computer users and programmers</span>
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript:;" class="d-block p-2">
                                    <div class="d-flex p-2">
                                        <img alt="Image" src="../assets/img/team-3.jpg" class="avatar shadow">
                                        <div class="ms-3">
                                            <h6 class="mb-0">Mila Skylar</h6>
                                            <p class="text-muted text-xs mb-2">24 min ago</p>
                                            <span class="text-muted text-sm col-11 p-0 text-truncate d-block">You can subscribe to receive weekly...</span>
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript:;" class="d-block p-2">
                                    <div class="d-flex p-2">
                                        <img alt="Image" src="../assets/img/team-5.jpg" class="avatar shadow">
                                        <div class="ms-3">
                                            <h6 class="mb-0">Sofia Scarlett</h6>
                                            <p class="text-muted text-xs mb-2">7 hours ago</p>
                                            <span class="text-muted text-sm col-11 p-0 text-truncate d-block">It’s an effective resource regardless..</span>
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript:;" class="d-block p-2">
                                    <div class="d-flex p-2">
                                        <img alt="Image" src="../assets/img/team-4.jpg" class="avatar shadow">
                                        <div class="ms-3">
                                            <div class="justify-content-between align-items-center">
                                                <h6 class="mb-0">Tom Klein</h6>
                                                <p class="text-muted text-xs mb-2">1 day ago</p>
                                            </div>
                                            <span class="text-muted text-sm col-11 p-0 text-truncate d-block">Be sure to check it out if your dev pro...</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card max-height-vh-70">
                            <div class="card-header p-0 position-relative mt-2 mx-2 z-index-2 bg-transparent">
                                <div class="bg-dark shadow-dark border-radius-md p-3">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="d-flex align-items-center">
                                                <img alt="Image" src="../assets/img/team-2.jpg" class="avatar">
                                                <div class="ms-3">
                                                    <h6 class="mb-0 d-block text-white">Charlie Watson</h6>
                                                    <span class="text-sm text-white opacity-8">last seen today at 1:53am</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-1 my-auto">
                                            <button class="btn btn-icon-only text-white mb-0 me-3 me-sm-0" type="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Video call">
                                                <i class="material-symbols-rounded">videocam</i>
                                            </button>
                                        </div>
                                        <div class="col-1 my-auto">
                                            <div class="dropdown">
                                                <button class="btn btn-icon-only text-white mb-0" type="button" data-bs-toggle="dropdown">
                                                    <i class="material-symbols-rounded">settings</i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end me-sm-n2 p-2" aria-labelledby="chatmsg">
                                                    <li>
                                                        <a class="dropdown-item border-radius-md" href="javascript:;">
                                                            Profile
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item border-radius-md" href="javascript:;">
                                                            Mute conversation
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item border-radius-md" href="javascript:;">
                                                            Block
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item border-radius-md" href="javascript:;">
                                                            Clear chat
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item border-radius-md text-danger" href="javascript:;">
                                                            Delete chat
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body overflow-auto overflow-x-hidden">
                                <div class="row justify-content-start mb-4">
                                    <div class="col-auto">
                                        <div class="card ">
                                            <div class="card-body p-2">
                                                <p class="mb-1">
                                                    It contains a lot of good lessons about effective practices
                                                </p>
                                                <div class="d-flex align-items-center text-sm opacity-6">
                                                    <i class="material-symbols-rounded text-sm me-1">schedule</i>
                                                    <small>3:14am</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-end text-right mb-4">
                                    <div class="col-auto">
                                        <div class="card bg-gradient-dark border-0 text-white">
                                            <div class="card-body p-2">
                                                <p class="mb-1">
                                                    Can it generate daily design links that include essays and data visualizations ?<br>
                                                </p>
                                                <div class="d-flex align-items-center justify-content-end text-sm opacity-6">
                                                    <i class="material-symbols-rounded text-sm me-1">done_all</i>
                                                    <small>4:42pm</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-12 text-center">
                                        <span class="badge text-dark">Wed, 3:27pm</span>
                                    </div>
                                </div>
                                <div class="row justify-content-start mb-4">
                                    <div class="col-auto">
                                        <div class="card ">
                                            <div class="card-body p-2">
                                                <p class="mb-1">
                                                    Yeah! Responsive Design is geared towards those trying to build web apps
                                                </p>
                                                <div class="d-flex align-items-center text-sm opacity-6">
                                                    <i class="material-symbols-rounded text-sm me-1">schedule</i>
                                                    <small>4:31pm</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-end text-right mb-4">
                                    <div class="col-auto">
                                        <div class="card bg-gradient-dark border-0 text-white">
                                            <div class="card-body p-2">
                                                <p class="mb-1">
                                                    Excellent, I want it now !
                                                </p>
                                                <div class="d-flex align-items-center justify-content-end text-sm opacity-6">
                                                    <i class="material-symbols-rounded text-sm me-1">done_all</i>
                                                    <small>4:42pm</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-start mb-4">
                                    <div class="col-auto">
                                        <div class="card ">
                                            <div class="card-body p-2">
                                                <p class="mb-1">
                                                    You can easily get it; The content here is all free
                                                </p>
                                                <div class="d-flex align-items-center text-sm opacity-6">
                                                    <i class="material-symbols-rounded text-sm me-1">schedule</i>
                                                    <small>4:42pm</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-end text-right mb-4">
                                    <div class="col-auto">
                                        <div class="card bg-gradient-dark border-0 text-white">
                                            <div class="card-body p-2">
                                                <p class="mb-1">
                                                    Awesome, blog is important source material for anyone who creates apps? <br>
                                                    Beacuse these blogs offer a lot of information about website development.
                                                </p>
                                                <div class="d-flex align-items-center justify-content-end text-sm opacity-6">
                                                    <i class="material-symbols-rounded text-sm me-1">done_all</i>
                                                    <small>4:42pm</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-start mb-4">
                                    <div class="col-5">
                                        <div class="card ">
                                            <div class="card-body p-2">
                                                <div class="col-12 p-0">
                                                    <img src="../assets/img/bg0.jpg" alt="Rounded image" class="img-fluid mb-2 border-radius-lg">
                                                </div>
                                                <div class="d-flex align-items-center text-sm opacity-6">
                                                    <i class="material-symbols-rounded text-sm me-1">schedule</i>
                                                    <small>4:47pm</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-end text-right mb-4">
                                    <div class="col-auto">
                                        <div class="card bg-gradient-dark border-0 text-white">
                                            <div class="card-body p-2">
                                                <p class="mb-0">
                                                    At the end of the day … the native dev apps is where users are
                                                </p>
                                                <div class="d-flex align-items-center justify-content-end text-sm opacity-6">
                                                    <i class="material-symbols-rounded text-sm me-1">done_all</i>
                                                    <small>4:42pm</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-start">
                                    <div class="col-auto">
                                        <div class="card ">
                                            <div class="card-body p-2">
                                                <p class="mb-0">
                                                    Charlie is Typing...
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-block">
                                <form class="align-items-center">
                                    <div class="input-group input-group-outline d-flex">
                                        <label class="form-label">Type your message</label>
                                        <input type="text" class="form-control form-control-lg">
                                        <button class="btn bg-gradient-dark mb-0">
                                            <i class="material-symbols-rounded">send</i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
