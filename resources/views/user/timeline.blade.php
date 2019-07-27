@extends('layouts.base')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/home"><i class="fas fa-user"></i></a></li>
    <li class="breadcrumb-item"><a href="/profile">profile</a></li>
    <li class="breadcrumb-item active" aria-current="page">Timeline</li>
@endsection

@section('page-content')
    <div class="row">

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header bg-transparent">
                    <h3 class="mb-0">Timeline</h3>
                </div>
                <div class="card-body">
                    <div class="timeline timeline-one-side" data-timeline-content="axis" data-timeline-axis-style="dashed">

                        @foreach ($actions as $action)
                            <div class="timeline-block">
                                <span class="timeline-step badge-success">
                                    <i class="ni ni-bell-55"></i>
                                </span>
                                <div class="timeline-content">
                                    <small class="text-muted font-weight-bold">{{ $action->getExtraProperty('date') }}10:30 AM</small>
                                    <h5 class=" mt-3 mb-0">{{ $action->getExtraProperty('title') }}</h5>
                                    <p class=" text-sm mt-1 mb-0">{!! $action->description !!}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card bg-gradient-default shadow">
                <div class="card-header bg-transparent">
                    <h3 class="mb-0 text-white">Dark timeline</h3>
                </div>
                <div class="card-body">
                    <div class="timeline timeline-one-side" data-timeline-content="axis" data-timeline-axis-style="dashed">
                        <div class="timeline-block">
                  <span class="timeline-step badge-success">
                    <i class="ni ni-bell-55"></i>
                  </span>
                            <div class="timeline-content">
                                <small class="text-light font-weight-bold">10:30 AM</small>
                                <h5 class="text-white mt-3 mb-0">New message</h5>
                                <p class="text-light text-sm mt-1 mb-0">Nullam id dolor id nibh ultricies vehicula ut id elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                                <div class="mt-3">
                                    <span class="badge badge-pill badge-success">design</span>
                                    <span class="badge badge-pill badge-success">system</span>
                                    <span class="badge badge-pill badge-success">creative</span>
                                </div>
                            </div>
                        </div>
                        <div class="timeline-block">
                  <span class="timeline-step badge-danger">
                    <i class="ni ni-html5"></i>
                  </span>
                            <div class="timeline-content">
                                <small class="text-light font-weight-bold">10:30 AM</small>
                                <h5 class="text-white mt-3 mb-0">Product issue</h5>
                                <p class="text-light text-sm mt-1 mb-0">Nullam id dolor id nibh ultricies vehicula ut id elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                                <div class="mt-3">
                                    <span class="badge badge-pill badge-danger">design</span>
                                    <span class="badge badge-pill badge-danger">system</span>
                                    <span class="badge badge-pill badge-danger">creative</span>
                                </div>
                            </div>
                        </div>
                        <div class="timeline-block">
                  <span class="timeline-step badge-info">
                    <i class="ni ni-like-2"></i>
                  </span>
                            <div class="timeline-content">
                                <small class="text-light font-weight-bold">10:30 AM</small>
                                <h5 class="text-white mt-3 mb-0">New likes</h5>
                                <p class="text-light text-sm mt-1 mb-0">Nullam id dolor id nibh ultricies vehicula ut id elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                                <div class="mt-3">
                                    <span class="badge badge-pill badge-info">design</span>
                                    <span class="badge badge-pill badge-info">system</span>
                                    <span class="badge badge-pill badge-info">creative</span>
                                </div>
                            </div>
                        </div>
                        <div class="timeline-block">
                  <span class="timeline-step badge-success">
                    <i class="ni ni-bell-55"></i>
                  </span>
                            <div class="timeline-content">
                                <small class="text-light font-weight-bold">10:30 AM</small>
                                <h5 class="text-white mt-3 mb-0">New message</h5>
                                <p class="text-light text-sm mt-1 mb-0">Nullam id dolor id nibh ultricies vehicula ut id elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                                <div class="mt-3">
                                    <span class="badge badge-pill badge-success">design</span>
                                    <span class="badge badge-pill badge-success">system</span>
                                    <span class="badge badge-pill badge-success">creative</span>
                                </div>
                            </div>
                        </div>
                        <div class="timeline-block">
                  <span class="timeline-step badge-danger">
                    <i class="ni ni-html5"></i>
                  </span>
                            <div class="timeline-content">
                                <small class="text-light font-weight-bold">10:30 AM</small>
                                <h5 class="text-white mt-3 mb-0">Product issue</h5>
                                <p class="text-light text-sm mt-1 mb-0">Nullam id dolor id nibh ultricies vehicula ut id elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                                <div class="mt-3">
                                    <span class="badge badge-pill badge-danger">design</span>
                                    <span class="badge badge-pill badge-danger">system</span>
                                    <span class="badge badge-pill badge-danger">creative</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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


