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
              <form action="/invoice/{!! $invoice_id !!}" method="POST" enctype="multipart/form-data">
                  @method("PUT")
                  @csrf

                  <div class="form-group col-md-6">
                      <label>Invoice number : </label>
                      <input type="text" name="id" class="form-control" value="{{ $invoice_id }}" disabled>
                  </div>

                  <div class="form-group col-md-6">
                      <label>Invoice Amount : </label>
                      <input type="text" name="price" class="form-control" value="{{ $invoice->taxableAmount() }}"
                             disabled>
                  </div>

                  <div class="form-group col-md-6">
                      <label>Status : </label>
                      <input type="text" name="status" class="form-control"
                             value="{{ ($invoice->status === 0) ? "Incomplete" : "Complete" }}" disabled>
                  </div>

                  <div class="form-group col-md-6">
                      <label>Invoice GST : </label>
                      <input type="text" name="gst" class="form-control" value="{{ $invoice->gstAmount() }}" disabled>
                  </div>

                  <div class="form-group col-md-6">
                      <label>Lorry Receipt No : </label>
                      <input type="text" name="lr_no" class="form-control"
                             value="{{ $invoice->lr_no }}">
                  </div>

                  <div class="form-group col-md-6">
                      <label>Invoice Total Amount : </label>
                      <input type="text" class="form-control" value="{{ $invoice->totalAmount() }}" disabled>
                  </div>

                  <div class="form-group col-md-6">
                      <label>Transport : </label>
                      <input name="transport" type="text" class="form-control" value="{{ $invoice->transport }}">
                  </div>

                  <div class="form-group col-md-6">
                      <label>Way Bill No : </label>
                      <input name="way_bill_no" type="text" class="form-control" value="{{ $invoice->way_bill_no }}">
                  </div>

                  <div class="form-group col-md-6">
                      <label>Discount : </label>
                      <input type="text" class="form-control" value="{{ $invoice->discount }}">
                  </div>

                  <div class="form-group col-md-6">
                      <label>Discount Description : </label>
                      <input type="text" class="form-control" value="{{ $invoice->discount_description }}">
                  </div>

                  <div class="form-group col-md-6">
                      <label>Agent : </label>
                      <input name="agent" type="text" class="form-control" value="{{ $invoice->agent }}">
                  </div>

                  <div class="form-group col-md-6">
                      <label>Vehicle No : </label>
                      <input name="vehicle_no" type="text" class="form-control" value="{{ $invoice->vehicle_no }}">
                  </div>

                  <div class="form-group col-md-12">
                      <label for="note">Note : </label>
                      <input id="note" name="note" type="text" class="form-control" value="{{ $invoice->note }}">
                  </div>


                  <div class="col-md-12 form-group">
                      @if(strcmp($invoice->lr_receipt, '') === 0)
                          No Lorry Receipt Receipt Provided

                          <input class="hide" type="file" id="lr_image" name="lr_receipt"
                                 accept="image/x-png,image/gif,image/jpeg"/>
                          <button id="add_image_button" type="button"
                                  onclick="document.getElementById('lr_image').click()"
                                  class="btn btn-default">Choose Image
                          </button>
                          <label id="file_name"></label>
                          <br>
                      @else
                          <label for="lr_receipt">Lorry Receipt : </label>
                          <a id="lr_receipt" class="img-responsive"
                             href="{!! CommonConstants::SERVER_DOMAIN.$invoice->lr_receipt !!}">
                              <img src="{!! CommonConstants::SERVER_DOMAIN.$invoice->lr_receipt !!}" alt="LR Receipt">
                          </a>
                          <br>
                      @endif
                  </div>

                  <div class="portlet light bordered col-md-12">
                      <div class="portlet-title">
                          <div class="caption">
                              <i class="fa fa-4x fa-cube font-red"></i>
                              <small class="caption-subject sbold font-red uppercase">Invoice Products</small>
                          </div>
                      </div>

                      <div class="portlet-body">
                          <table class="table table-bordered">
                              <thead>
                              <tr>
                                  <th>Category</th>
                                  <th>Sub-Category</th>
                                  <th>Size</th>
                                  <th>Units</th>
                                  <th>Price</th>
                                  <th>Weight</th>
                              </tr>

                              <tbody>
                              @foreach($invoice->invoiceProducts as $invoiceProduct)
                                  <tr id="row-{{ $invoice->id }}">
                                      <td>{{ $invoiceProduct->product->category->name }}</td>
                                      <td>{{ $invoiceProduct->product->subcategory->name }}</td>
                                      <td>{{ $invoiceProduct->product->size->name }}</td>
                                      <td>{{ $invoiceProduct->units }}</td>
                                      <td class="col-md-2">
                                          <input type="number" value="{{ $invoiceProduct->price }}"
                                                 placeholder="Price :" class="form-control">
                                      </td>
                                      <td class="col-md-2">
                                          <input type="number" value="{{ $invoiceProduct->weight }}"
                                                 placeholder="Weight :" class="form-control">
                                      </td>
                                      <td>
                                          <i class="fa fa-trash red" data-target="modal"
                                             data-toggle="#deleteProduct"></i>
                                      </td>
                                  </tr>
                              @endforeach
                              </tbody>
                              </thead>
                          </table>
                      </div>
                  </div>
                  <div class="container margin-bottom-25">
                      <div class="clearfix">
                          <button type="submit" class="btn blue pull-right">Save Changes</button>
                          <a href="/invoice/{!! $invoice_id !!}/view"
                             class="btn default pull-right margin-right-10">Cancel</a>
                      </div>
                  </div>
              </form>
          </div>
      </div>

      <!-- CONFIRM DELETE MODAL -->

      <div class="modal fade" tabindex="-1" role="dialog" id="deleteModal">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                  aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Delete Product</h4>
                  </div>

                  <div class="modal-body">
                      <div class="row">
                          <div class="form-body">
                              <!-- START OF MODAL BODY -->
                              <div class="container">
                                  <label>Are you sure you want to remove the product ?</label>
                              </div>

                              <!-- END OF MODAL BODY -->

                              <!-- MODAL FOOTER -->
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                  <button id="delete-product" type="submit" name="edit_category" class="btn btn-primary">
                                      Delete
                                  </button>
                              </div>
                              <!-- END OF MODAL FOOTER -->
                          </div>
                      </div>
                  </div>
              </div>
              <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>
      <!--END OF EDIT BUTTON MODAL-->
@endsection


@section ('custom-script')
    <!------------------------------------------------------------------------------------>
    <!--                          DATA-TABLES SECTION                                   -->
    <!------------------------------------------------------------------------------------>

    <script>

        function isUploadSupported() {
            if (navigator.userAgent.match(/(Android (1.0|1.1|1.5|1.6|2.0|2.1))|(Windows Phone (OS 7|8.0))|(XBLWP)|(ZuneWP)|(w(eb)?OSBrowser)|(webOS)|(Kindle\/(1.0|2.0|2.5|3.0))/)) {
                return false;
            }
            return true;
        };

        if(!isUploadSupported()) {
            $('#add_image_button').addClass("disabled");
            $('#add_image_button').html("Image upload not supported from this device");
        }
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
