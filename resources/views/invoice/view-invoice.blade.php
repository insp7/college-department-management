@extends('layout')

@section('page-content')
      <?php
      use App\Constants\CommonConstants;
      ?>

      <div class="page-bar">
          <!-- BREADCRUMBS SECTION -->
          <ul class="page-breadcrumb">
              <li>
                  <a href="/dashboard">Home</a>
                  <i class="fa fa-angle-right"></i>
              </li>
              <li>
                  <a href="/invoice">Invoices</a>
                  <i class="fa fa-angle-right"></i>
              </li>
              <li>
                  <span>View Invoice</span>
              </li>
          </ul>
          <!-- END OF BREADCRUMBS SECTION -->
          <div class="clearfix"></div>

          <!-- BEGIN PAGE TITLE-->
          <h3 class="page-title"> View / Update Invoice
              <small>View or update the given invoice.</small>
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


          <!-- PRODUCTS -->
          <div class="row">
              @switch($purpose)
                  @case('add_lr')
                  <form action="/invoice/{!! $invoice_id !!}" method="POST" enctype="multipart/form-data">
                      @method("PUT")
                      @csrf
                      @break
                      @endswitch
                      @if($purpose === 'view')
                          <div class="container-fluid">
                              <a href="/invoice/{{$invoice_id}}/pdf" target="_blank" class="btn blue pull-right">View Invoice</a>
                              <a href="/invoice/{{$invoice_id}}/print" target="_blank" class="btn green pull-right margin-right-10">
                                  Print Invoice </a>
                              <a href="/invoice/{{$invoice_id}}/edit" class="btn blue margin-right-10 pull-right">Edit
                                  Invoice</a>
                              <a href="/invoice/{{$invoice_id}}/add-lorry-receipt"
                                 class="btn default pull-right margin-right-10">Add Lorry Receipt</a>
                          </div>
                      @endif
                      <br>
                      <div class="form-group col-md-6">
                          <label>Invoice number : </label>
                          <input type="text" name="id" class="form-control" value="{{ $invoice_id }}" disabled>
                      </div>

                      <div class="form-group col-md-6">
                          <label>Invoice Amount : </label>
                          <input type="text" name="price" class="form-control" value="{{ $price }}" disabled>
                      </div>

                      <div class="form-group col-md-6">
                          <label>Status : </label>
                          <input type="text" name="status" class="form-control" value="{{ $status }}" disabled>
                      </div>

                      <div class="form-group col-md-6">
                          <label>Invoice GST : </label>
                          <input type="text" name="gst" class="form-control" value="{{ $gst }}" disabled>
                      </div>

                      <div class="form-group col-md-6">
                          <label>Lorry Receipt No : </label>
                          <input type="text" name="lr_no" class="form-control"
                                 value="<?php echo ($lr_no === "") ? ($purpose !== 'add_lr') ? "No LR number provided yet" : "" : $lr_no ?>" <?php echo ($purpose === 'add_lr') ? "" : "disabled";?>>
                      </div>


                      <div class="form-group col-md-6">
                          <label>Invoice Total Amount : </label>
                          <input type="text" class="form-control" value="{{ $total }}" disabled>
                      </div>

                      <div class="form-group col-md-6">
                          <label>Transport : </label>
                          <input name="transport" type="text" class="form-control" value="{{ $transport }}" disabled>
                      </div>


                      <div class="form-group col-md-6">
                          <label>Way Bill No : </label>
                          <input name="way_bill_no" type="text" class="form-control" value="{{ $way_bill_no }}"
                                 disabled>
                      </div>

                      <div class="form-group col-md-6">
                          <label>Discount : </label>
                          <input type="text" class="form-control" value="{{ $discount }}" disabled>
                      </div>

                      <div class="form-group col-md-6">
                          <label>Discount Description : </label>
                          <input type="text" class="form-control" value="{{ $discount_description }}" disabled>
                      </div>

                      <div class="form-group col-md-6">
                          <label>Agent : </label>
                          <input name="agent" type="text" class="form-control" value="{{ $agent }}" disabled>
                      </div>

                      <div class="form-group col-md-6">
                          <label>Vehicle No : </label>
                          <input name="vehicle_no" type="text" class="form-control" value="{{ $vehicle_no }}" disabled>
                      </div>

                      <div class="form-group col-md-12">
                          <label>Note : </label>
                          <input name="note" type="text" class="form-control" value="{{ $vehicle_no }}" disabled>
                      </div>


                      <div class="col-md-6 form-group">
                          @switch($purpose)
                              @case('view')
                              @if(strcmp($lr_receipt, '') === 0)
                                  No Lorry Receipt Receipt Provided
                              @else
                                  <label for="lr_receipt">Lorry Receipt : </label>
                                  <a id="lr_receipt" class="img-responsive"
                                     href="{!! CommonConstants::SERVER_DOMAIN.$lr_receipt !!}">
                                      <img src="{!! CommonConstants::SERVER_DOMAIN.$lr_receipt !!}" alt="LR Receipt"
                                           class="img img-responsive">
                                  </a>
                              @endif
                              @break

                              @case('add_lr')
                              <label for="lr_receipt">Lorry Receipt : </label>
                              <input class="hide" type="file" id="lr_image" name="lr_receipt" accept="image/*"/>
                              <button id="add_image_button" type="button"
                                      onclick="document.getElementById('lr_image').click()" class="btn btn-default">
                                  Choose Image
                              </button>
                              <label id="file_name"></label>
                              @break
                          @endswitch
                      </div>


                      @if($purpose === 'view')
                          <div class="col-md-12">
                              <br>
                              <div class="portlet light portlet-fit bordered">
                                  <div class="portlet-title">
                                      <div class="caption">
                                          <i class="icon-settings font-blue"></i>
                                          <span class="caption-subject font-blue bold uppercase">Invoice Products</span>
                                      </div>
                                  </div>
                                  <div class="portlet-body">
                                      <table class="table table-striped table-hover table-bordered" id="product_list">
                                          <thead>
                                          <tr class="text-center">
                                              <th> Category</th>
                                              <th> SubCategory</th>
                                              <th> Size</th>
                                              <th> Weight</th>
                                              <th> Units</th>
                                              <th> Weight</th>
                                              <th> Rate</th>
                                              <th> Price</th>
                                              <th> GST</th>
                                          </tr>
                                          </thead>
                                      </table>
                                  </div>
                              </div>
                          </div>
                      @endif


                      @switch($purpose)
                          @case("add_lr")
                          <div class="container">
                              <button type="submit" class="btn btn-primary pull-right">Save Changes</button>
                              <a href="/invoice/{!! $invoice_id !!}/view"
                                 class="btn btn-default pull-right margin-right-10 margin-bottom-25">Cancel</a>
                          </div>
                  </form>
                  @break
              @endswitch
          </div>
      </div>
@endsection


@section ('custom-script')
    <!------------------------------------------------------------------------------------>
    <!--                          DATA-TABLES SECTION                                   -->
    <!------------------------------------------------------------------------------------>
    <script>
        var productsTable = $('#product_list');
        productsTable.DataTable({
            processing: true,
            serverSide: true,
            ajax: '/invoice/{{$invoice_id}}/get-products/',
            columns: [
                {data: 'category', name: 'category'},
                {data: 'subcategory', name: 'subcategory'},
                {data: 'size', name: 'size'},
                {data: 'weight', name: 'weight'},
                {data: 'quantity', name: 'quantity'},
                {data: 'total_weight', name: 'total_weight'},
                {data: 'rate', name: 'rate'},
                {data: 'price', name: 'price'},
                {data: 'gst', name: 'gst'},
            ]
        });

        document.getElementById('lr_image').onchange = function () {
            var name = document.getElementById('lr_image');
            alert("image added");
            $('#file_name').html(name.files.item(0).name);
            $('#add_image_button').html("Change image");
        };

        $('#lr_receipt').magnificPopup({type: 'image'});
    </script>

    <!-- TOASTR SECTION -->
    @if(session()->has('success_update') || session()->has('error_update'))
        <script>
            var title = "";
            var message = "";
            var type = "";
        </script>
        @if(session()->has('success_update'))
            <script>
                type = "success";
                title = "Invoice Updated";
                message = "Invoice Updated Successfully";
            </script>
            {{ Session::forget('success_update') }}
        @endif

        @if(session()->has('error_update'))
            <script>
                type = "error";
                title = "Failed to update";
                message = "There was some issue in updating the LR Np";
            </script>
            {{ Session::forget('error_update') }}
        @endif

        <script>
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr[type](message, title);
        </script>
    @endif
@endsection
