@extends('layouts.base')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="/dashboard"><i class="fas fa-newspaper"></i></a></li>
<li class="breadcrumb-item"><a href="/staff-lectures">Staff Lecture</a></li>
<li class="breadcrumb-item active" aria-current="page">Edit Staff Lecture</li>
@endsection

@section('page-content')
<div class="row">
    <div class="col">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <h3 class="mb-0">Edit Staff Lecture</h3>
            </div>
            <!-- Card body -->
            <div class="card-body">
                <form method="POST" action="/staff-lectures/{{ $staff->id }}" enctype="multipart/form-data" id="frmTarget">

                    @csrf
                    @method("PATCH")

                    <div class="input-daterange datepicker" data-provide="datepicker" data-date-format="yyyy/mm/dd" data-orientation="top auto" aria-orientation="vertical">
                        <div class="form-group">
                            <div class="input-group @error('date') has-danger @enderror">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                </div>
                                <script>
                                    $('.datepicker').datepicker({
                                        orientation: "bottom"
                                    });
                                </script>
                                <input class="form-control datepicker" type="text" autocomplete="off" value="{{ $staff->date }}" name="date" placeholder="Date of Lecture">
                                @error('date')
                                <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group input-group-merge @error('subject') has-danger @enderror">
                            <div class="input-group-prepend"> <span class="input-group-text">
                             <i class="fa fa-newspaper"></i> </span> </div> 
                             <input value="{{ $staff->subject }}" required name="subject" type="subject" placeholder="Subject Name" class="form-control @error('subject') is-invalid @enderror">
                        </div>
                        @error('subject')
                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="input-group input-group-merge @error('class') has-danger @enderror">
                            <div class="input-group-prepend"> <span class="input-group-text">
                             <i class="fa fa-newspaper"></i> </span> </div> 
                             <input value="{{ $staff->class }}" required name="class" type="class" placeholder="Class" class="form-control @error('class') is-invalid @enderror">
                        </div>
                        @error('class')
                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="input-group input-group-merge @error('no_of_students') has-danger @enderror">
                            <div class="input-group-prepend"> <span class="input-group-text">
                             <i class="fa fa-newspaper"></i> </span> </div> 
                             <input value="{{ $staff->no_of_students }}" required name="no_of_students" type="number" placeholder="Number of Students" class="form-control @error('no_of_students') is-invalid @enderror">
                        </div>
                        @error('no_of_students')
                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="input-group input-group-merge @error('expert_name') has-danger @enderror">
                            <div class="input-group-prepend"> <span class="input-group-text">
                             <i class="fa fa-newspaper"></i> </span> </div> 
                             <input value="{{ $staff->expert_name }}" required name="expert_name" type="text" placeholder="Expert Name" class="form-control @error('expert_name') is-invalid @enderror">
                        </div>
                        @error('expert_name')
                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="input-group input-group-merge @error('expert_profile') has-danger @enderror">
                            <div class="input-group-prepend"> <span class="input-group-text">
                             <i class="fa fa-newspaper"></i> </span> </div> 
                             <input value="{{ $staff->expert_profile }}" required name="expert_profile" type="url" placeholder="Expert Profile Link" class="form-control @error('expert_profile') is-invalid @enderror">
                        </div>
                        @error('expert_profile')
                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="input-group input-group-merge @error('organization') has-danger @enderror">
                            <div class="input-group-prepend"> <span class="input-group-text">
                             <i class="fa fa-newspaper"></i> </span> </div> 
                             <input value="{{ $staff->organization }}" required name="organization" type="text" placeholder="Organization Name" class="form-control @error('organization') is-invalid @enderror">
                        </div>
                        @error('organization')
                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="file" required name="report_path" value = "{{ $staff->report_path }}" class="form-control @error('report_path') is-invalid @enderror">
                        @error('report_path')
                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                        @enderror
                    </div>

                    <br>

                    <button class="btn btn-primary" type="sumbit">Edit</button>

                </form>

            </div>
        </div>
    </div>
</div>

@endsection

@section ('custom-script')
<script src="{{asset('/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script>
    $('.datepicker').datepicker({
        orientation: "top"
    });

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
