@extends('layouts.base')

@section('page-content')
    <div class="container-fluid">
        
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-4 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">IPR</h5>
                    <span class="h2 font-weight-bold mb-0">{{ $user->staff->ipr->count() }}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-active-40"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                      <a href="/ipr/create">
                    <span class="text-success mr-2"><i class="ni ni-fat-add"></i> </span>
                    <span class="text-nowrap">Add IPR</span>
                    </a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Events</h5>
                    <span class="h2 font-weight-bold mb-0">{{$user->staff->events->count()}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-calendar-grid-58"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                      <a href="/events/create">
                    <span class="text-success mr-2"> </span>
                    <span class="text-nowrap"></span>
                    </a>
                  </p>
                </div>
              </div>
            </div>
            
            <div class="col-xl-4 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Research Project</h5>
                    <span class="h2 font-weight-bold mb-0">{{ count($user->staff->researchProjects->all())}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                        <i class="ni ni-spaceship"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                      <a href="/research-projects/create">
                    <span class="text-success mr-2"><i class="ni ni-fat-add"></i> </span>
                    <span class="text-nowrap">Add Reasearch Project</span>
                    </a>
                  </p>
                </div>
              </div>
            </div>
            
              </div>
            </div>
         
@endsection

@section('custom-script')
    <!-- Optional JS -->
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
