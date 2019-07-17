@extends('layouts.base')

{{--@section('breadcrumb')--}}
{{--    <li class="breadcrumb-item"><a href="/home"><i class="fas fa-user"></i></a></li>--}}
{{--    <li class="breadcrumb-item"><a href="/staff">Staff</a></li>--}}
{{--    <li class="breadcrumb-item active" aria-current="page">Add Staff</li>--}}
{{--@endsection--}}

{{--@section('actions')--}}
{{--    <a href="/news-feed/create" class="btn btn-sm btn-neutral">New</a>--}}
{{--@endsection--}}

@section('page-content')
    @foreach($event_images_path as $event_image)
        <div class="m-9"><img src="{{ asset($event_image->event_image_path) }}" class="card-img" alt="looldsjfsdf"></div>
    @endforeach
@endsection

@section ('custom-script')
    <script src="{{ asset("/js/shape/add-shape.js") }}"></script>

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
