@extends('components.section')

@section('section')
    '
    <div class="container">
        <div class="row">
            <div class="row justify-content-left text-left my-sm-5">
                <div class="col-lg-6">
                    <span class="badge badge-success mb-3">Actual</span>
                    <h2 class="text-dark mb-0 font-weight-bolder">Post section</h2>
                    <p class="lead">Read the most relevant posts right heres. </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @if($posts)
                @foreach($posts as $post)
                    <div class="col-lg-4 mb-lg-0 mb-4 pb-4 pt-4">
                        <div class="card">
                            <div class="card-header p-0 m-3 mt-n4 position-relative z-index-2">
                                <a class="d-block blur-shadow-image">
                                    <img src="{{ $post->images()->first()->url ?? 'https://dummyimage.com/1600x900' }}"
                                         alt="img-blur-shadow" class="img-fluid border-radius-lg">
                                </a>
                            </div>
                            <div class="card-body pt-2">
                                {{--                            <span class="text-gradient text-warning text-uppercase text-xs font-weight-bold my-2">House</span>--}}
                                <a href="javascript:;" class="h5 d-block text-dark">
                                    {{ $post->title }}
                                </a>
                                <p class="card-description mb-4">
                                    {{ $post->content }}
                                </p>
                                <div class="author align-items-center">
                                    <img src="{{ $fakeImages[array_rand($fakeImages)] }}" alt="avatar" class="avatar shadow border-radius-lg">
                                    <div class="name ps-3">
                                        <span>{{ $post->user()->first()->name }}</span>
                                        <div class="stats">
                                            <small>Posted on {{ $post->created_at->format('d M y h:m') }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-lg-4 mb-lg-0 mb-4 pb-4 pt-4">
                    <span> Sorry, our team hasn't written any posts yet. </span>
                </div>
            @endif
        </div>
    </div>
@endsection

