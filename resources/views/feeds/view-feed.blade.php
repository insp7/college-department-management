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
                <span>View Feed</span>
            </li>
        </ul>
        <!-- END OF BREADCRUMBS SECTION -->
        <div class="clearfix"></div>

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title">Feeds
            <small>View a feed</small>
        </h3>

        <form action="/feed", method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="event-date">Event date</label>
                    <input type = "date" name="event_date" id="event-date" class="form-control" value="{{ $feed->event_date }}" disabled/>
                </div>

                <div class="form-group col-md-6 margin-top-20">
                    <label class="margin-bottom-10" for="lr_receipt">Image : </label>
                    @if( $feed->image )
                        <a id="lr_receipt" class="col-md-12 img-responsive" href="{!! \App\Constants\CommonConstants::SERVER_DOMAIN.$feed->image !!}">
                            <img src="{!! \App\Constants\CommonConstants::SERVER_DOMAIN.$feed->image !!}" alt="LR Receipt" width="400px">
                        </a>
                    @else
                        No image attached
                    @endif
                </div>

                <div class="form-group col-md-12">
                    <label for="hsn_code">Description*</label>
                    <textarea class="col-md-12" name="description" id="description" rows="10" placeholder="Enter the description for the feed" disabled>{{ $feed->description }}</textarea>
                </div>
            </div>
        </form>
    </div>

@endsection

@section ('custom-script')
    <script src="{{ asset("js/feeds/view-feed.js") }}"></script>
@endsection
