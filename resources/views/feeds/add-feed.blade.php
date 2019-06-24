@extends('layout')

@section('page-content')
    <div class="page-bar">
        <!-- BREADCRUMBS SECTION -->
        <ul class="page-breadcrumb">
            <li>
                <a href="/dashboard">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="/feed">Feeds</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Add Feed</span>
            </li>
        </ul>
        <!-- END OF BREADCRUMBS SECTION -->
        <div class="clearfix"></div>

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title">Feeds
            <small>Add a feed</small>
        </h3>
        <!-- END PAGE TITLE-->

        <!-- ALERTS SECTION -->
        <!-- ERRORS SECTION -->
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- END OF ERRORS SECTION -->
        <!-- END OF ALERT SECTION -->

        <form action="/feed", method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="event-date">Event date</label>
                    <input type = "date" name="event_date" id="event-date" class="form-control" />
                </div>

                <div class="form-group col-md-6 margin-top-20">
                    <label for="lr_receipt">Image : </label>
                    <input class="hide" type="file" id="image" name="image" accept="image/x-png,image/gif,image/jpeg" />
                    <button id="add_image_button" type="button" onclick="document.getElementById('image').click()" class="btn btn-default">Choose Image</button>
                    <label id="file_name"></label>
                </div>

                <div class="form-group col-md-12">
                    <label for="hsn_code">Description*</label>
                    <textarea class="col-md-12" name="description" id="description" rows="10" placeholder="Enter the description for the feed"></textarea>
                </div>
            </div>
            <div class="text-right">
                <button id="add-gst" type="submit" name="add-gst" class="btn red">
                    Add Feed
                </button>
                <br><br>
            </div>
        </form>
    </div>

@endsection

@section ('custom-script')
    <script src="{{ asset("js/feeds/add-feed.js") }}"></script>

    @include('components.show-toast')
@endsection
