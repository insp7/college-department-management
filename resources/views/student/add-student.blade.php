@extends('layouts.base')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/published-books"><i class="fas fa-book"></i></a></li>
    <li class="breadcrumb-item"><a href="/published-books/create">Published Books</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Published Books</li>
@endsection


@section('page-content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css">
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Add Student</h3>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <form method="post" action="/student">
                        @csrf

                        <div class="form-group">
                            <select id="select-class" name="select-class">
                                @foreach($results as $result)
                                    <option value="{{ $result->id }}">{{ $result->year}}</option>
                                @endforeach
                            </select>


                        </div>

                        <div class="form-group">
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend"> <span class="input-group-text"> <i class="fa fa-user"></i> </span> </div> <input required name="name" type="text" placeholder="Name [LAST FIRST SURNAME]" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend"> <span class="input-group-text"> <i class="fa fa-user"></i> </span> </div> <input required name="email" type="email" placeholder="Email" class="form-control">
                            </div>

                        </div>

                        <div class="form-group">
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend"> <span class="input-group-text"> <i class="fa fa-sort-numeric-up"></i> </span> </div> <input required name="roll_no" type="number" placeholder="Roll No" class="form-control">
                            </div>

                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Add Student</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section ('custom-script')
    <script src="{{ asset("/js/shape/add-shape.js") }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

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

    <script>
        $(document).ready(function() {
            $('#add-event-coordinator').select2();
        });
    </script>
@endsection
