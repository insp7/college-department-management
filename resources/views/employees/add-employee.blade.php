@extends('layout')

@section('page-content')
    <h3 class="page-title">
        Add Employee
        <small>Add a employee and assign roles to him/her.</small>
    </h3>

    <hr>
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success alert-dismissible">
            <ul>
                <li>
                    {{session('success')}}
                </li>
            </ul>
        </div>
    @endif

    <form method="POST" action="/employee">
        <div class="row">
            @csrf
            <div class="form-group col-md-6">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Name" value="{{ old('name') }}">
            </div>
            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter email" value="{{ old('email') }}">
            </div>

            <div class="form-group col-md-6">
                <label for="phone">Phone</label>
                <input type="tel" class="form-control" name="phone" placeholder="Enter phone" value="{{ old('phone') }}">
            </div>

            <div class="form-group col-md-6">
                <label for="departments">Departments : </label>
                <select name="departments[]" id="departments" multiple="multiple" class="form-control">
                    <option></option>
                </select>
            </div>

            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-user font-green"></i>
                            <span class="caption-subject sbold uppercase font-green">Employee Roles</span>
                        </div>
                    </div>

                    <div class="portlet-body">
                        <!-- PRIVILEGES START FROM HERE -->
                        <div class="row">
                            <?php
                                $index = 0;
                            ?>
                            @foreach(\App\Constants\RoleConstants::PRIVILEGES as $PRIVILEGE)

                                <div class="col-sm-3">
                                    <div class="checkbox">
                                        <label>
                                            <input value="{{ $PRIVILEGE }}" name="privilege[]" type="checkbox"> {{ $PRIVILEGE }}
                                        </label>
                                    </div>
                                </div>
                                <?php $index++; ?>
                            @endforeach
                        </div>

                        <!-- END OF PRIVILEGE LIST -->
                    </div>
                </div>
            </div>
        </div>

        <button class="btn btn-primary pull-right margin-bottom-5" type="submit">Submit</button>
        <div class="clearfix"></div>
    </form>
    <hr>
@endsection

@section('custom-script')
    <script src="{{ asset("js/employees/add-employee.js") }}"></script>
@endsection
