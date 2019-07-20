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
                                <div class="input-group-prepend"> <span class="input-group-text"> <i class="fa fa-newspaper"></i> </span> </div> <input  value="{{ old('title') }}" required name="title" type="title" placeholder="Title" class="form-control @error('title') is-invalid @enderror">
                            </div>
                            @error('title')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <textarea  value="{{ old('description') }}" required name="description"  placeholder="Description" class="form-control @error('description') is-invalid @enderror"></textarea>
                            </div>
                            @error('description')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                    </form>

                    <div class="dropzone dropzone-multiple"  data-toggle="dropzone" data-dropzone-multiple data-dropzone-url="/news-feed">
                        <div class="fallback">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="dropzoneMultipleUpload" multiple>
                                <label class="custom-file-label" for="dropzoneMultipleUpload">Choose file</label>
                            </div>
                        </div>
                        <ul class="dz-preview dz-preview-multiple list-group list-group-lg list-group-flush">
                            <li class="list-group-item px-0">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <div class="avatar">
                                            <img class="avatar-img rounded" src="..." alt="..." data-dz-thumbnail>
                                        </div>
                                    </div>
                                    <div class="col ml--3">
                                        <h4 class="mb-1" data-dz-name>...</h4>
                                        <p class="small text-muted mb-0" data-dz-size>...</p>
                                    </div>
                                    <div class="col-auto">
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fe fe-more-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item" data-dz-remove>
                                                    Remove
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    @error('news_feed_images')
                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                    @enderror

                    <br>


                    <button class="btn btn-primary" type="button" id="createPostBtn">Create</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section ('custom-script')
    <script src="{{ asset('assets/vendor/dropzone/dist/min/dropzone.min.js') }}"></script>

    <script>
        var Dropzones = function () {
            var e = $('[data-toggle="dropzone"]'), a = $(".dz-preview");
            e.length && (Dropzone.autoDiscover = !1, e.each(function () {
                var e, t, n, i, o;
                e = $(this), t = void 0 !== e.data("dropzone-multiple"), n = e.find(a), i = void 0, o = {
                    url: e.data("dropzone-url"),
                    autoProcessQueue: false,
                    paramName: "news_feed_images",
                    uploadMultiple: true,
                    parallelUploads: 100,
                    thumbnailWidth: null,
                    thumbnailHeight: null,
                    previewsContainer: n.get(0),
                    previewTemplate: n.html(),
                    maxFiles: t ? null : 1,
                    acceptedFiles: t ? null : "image/*",
                    init: function () {
                        this.on("addedfile", function (e) {
                            !t && i && this.removeFile(i), i = e
                        });

                        this.on("complete", function (file) {
                            $.notify({
                                // options
                                title: '<h4 style="color:white">Newsfeed</h4>',
                                message: 'News Feed Added Successfully',
                            },{
                                // settings
                                type: 'success',
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
                        });

                        var myDropzone = this;

                        // Update selector to match your button
                        $("#createPostBtn").click(function (e) {
                            myDropzone.processQueue();
                        });

                        this.on('sending', function(file, xhr, formData) {
                            // Append all form inputs to the formData Dropzone will POST
                            var data = $('#frmTarget').serializeArray();
                            $.each(data, function(key, el) {
                                formData.append(el.name, el.value);
                            });
                        });
                    }
                }, n.html(""), e.dropzone(o)
            }))
        }();


    </script>




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
