@extends('layouts.base')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/dashboard"><i class="fas fa-newspaper"></i></a></li>
    <li class="breadcrumb-item"><a href="/news-feed/">News Feed</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add News Feed</li>
@endsection

@section('page-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Add News Feed</h3>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <form method="post"  action="/news-feed" enctype="multipart/form-data" id="frmTarget">
                        @csrf

                        <div class="form-group">
                            <div class="input-group input-group-merge @error('title') has-danger @enderror">
                                <div class="input-group-prepend"> <span class="input-group-text"> <i class="fa fa-newspaper"></i> </span> </div> <input  value="{{ old('title') }}" required name="title" placeholder="Title" class="form-control @error('title') is-invalid @enderror">
                            </div>
                            @error('title')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <textarea  value="{{ old('description') }}" required name="description" placeholder="Description" class="form-control @error('description') is-invalid @enderror"></textarea>
                            </div>
                            @error('description')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="text-sm" for="news_feed_images">News Images</label>
                            <div class="input-group">
                                <input type="file" id="news_feed_images" name="news_feed_images[]"  placeholder="News Feed Images" multiple="multiple" class="form-control @error('news_feed_images') is-invalid @enderror"></input>
                            </div>
                            @error('news_feed_images')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <br>

                        <button class="btn btn-primary" type="submit" id="createPostBtn">Create</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section ('custom-script')
    @if(session()->has('type'))
        <script>
            $.notify({
                // options
                title: '<h4 style="color:white">{{ session('title') }}</h4>',
                message: '{{ session('message') }}',
            },{
                // settings
                type: '{{ session('type') }}',
                allow_dismiss: true,
                placement: {
                    from: "top",
                    align: "right"
                },
                offset: 20,
                spacing: 10,
                z_index: 1031,
                delay: 3000,
                timer: 1000,
                animate: {
                    enter: 'animated fadeInDown',
                    exit: 'animated fadeOutUp'
                }
            });
        </script>
    @endif
@endsection
