<?php
$taxable_amount = 0;
$total_quantity = 0;
$total_weight = 0;
$total_gst = 0;
$total_bundles = 0;
$total_amount = 0;
$retailer_id = $invoice->order->retailer->id;



$gsts = [];

foreach ($invoice->invoiceProducts as $invoiceProduct) {
      $gst_rate = $invoiceProduct->product->getGstRate();

      if ($gst_rate) {
            if (array_key_exists($gst_rate, $gsts))
                  $gsts[$gst_rate] += $invoiceProduct->gst;
            else
                  $gsts[$gst_rate] = $invoiceProduct->gst;
      }
      $total_gst += $invoiceProduct->gst;

// Calculating the total number of bundles
}


$total_bundles = $invoice->no_of_bundles;

$total_amount = $taxable_amount + $total_gst;
?>
        <!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        body {
            font-size: 12px;
        }

        .table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
            padding: 6px;
        }

        .my-table > tbody > tr > td {
            padding: 2px
        }

        @media print {
            @page {
                margin: 0;
            }

            body {
                margin: 1cm;
            }
        }

        .box {
            display: inline-block;
            width: 10px;
            height: 10px;
            margin-right: 5px;
            border: 1px solid #333;
        }

        h2 {
            margin-top: 10px;
        }

        .main-header {
            margin-bottom: 20px;
            text-align: center;
        }

        .text-regular {
            font-weight: 500;
        }

        .text-regular {
            font-weight: 500;
            font-size: 10px;
        }

        .text-bold {
            font-weight: 700;
        }

        .text-lg {
            font-size: 16px;
        }

        .table-borderless td,
        .table-borderless th {
            border: none !important;
        }

        .borderless-row th,
        .borderless-row td {
            border: none !important;;
        }

        .font-small {
            font-size: 10px;
        }

        .table-bordered, .table-bordered > tbody > tr > td, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > td, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > thead > tr > th {
            border: 1px solid #333 !important;
        }

    </style>
    <!-- END THEME LAYOUT STYLES -->
</head>
<body>
<div class="container-fluid">
    <div class="clearfix">
        <div class="text-uppercase pull-right bold">
            <div><span class="box"></span> Original for Recipient</div>
            <div><span class="box"></span> Duplicate for Transport</div>
            <div><span class="box"></span> Triplicate for supplier</div>
        </div>
    </div>
    <div class="text-center">
        <div class="main-header">
            <h2 class="text-regular">{{ $invoice->order->warehouse->department->company}}</h2>
            <h4 class="text-bold">Tax Invoice</h4>
        </div>
        <p>{{ $invoice->order->warehouse->department->address }}</p>
        <p><span class="text-bold">PHONE NUMBER : </span>{{ $invoice->order->warehouse->department->phone_no}} <span
                    class="text-bold">Email Id : </span> darshan@aggni.org</p>
    </div>

    <table class="table table-bordered">
        <tr>
            <th colspan="4" class="text-regular">Details of receiver or billed to</th>
            <th colspan="5" class="text-regular">Our company : * GST NO
                : {{ $invoice->order->warehouse->department->gst_no }}</th>
        </tr>
        <tr>
            <th class="text-regular" colspan="4">
                <p class="text-regular">
                    <span class="text-lg">{{ $invoice->order->retailer->user->name }}</span><br>
                    {{ $invoice->order->retailer->address }}<br>
                    <span class="text-bold">Phone no : </span> {{ $invoice->order->retailer->user->phone_number }}<br>
                    <span class="text-bold">State and Code : </span> {{ $invoice->order->retailer->state->name }}
                    - {{$invoice->order->retailer->state->code}}<br>
                    @foreach( $invoice->order->retailer->includedCredentials() as $includedCredential )
                        <span class="text-bold">{{ $includedCredential->credential->name }} : </span> {{ $includedCredential->text }}
                        <br>
                    @endforeach
                </p>
            </th>
            <th class="text-regular" colspan="6" rowspan="2">
                <table class="table my-table table-borderless text-small">
                    <tr>
                        <td>Inovice No</td>
                        <td>: &nbsp;{{ $invoice->id }}</td>
                        <td>Date : {{ date_format($invoice->created_at, 'd-m-Y') }}</td>
                    </tr>
                    <tr>
                        <td>Challan No</td>
                        <td>:&nbsp;</td>
                    </tr>

                    <tr>
                        <td>LR NO</td>
                        <td>: &nbsp;{{ $invoice->lr_no }}</td>
                        <td>Date : @if($invoice->created_at !== $invoice->updated_at) {{ date_format($invoice->updated_at, 'd-m-Y') }} @endif</td>
                    </tr>

                    <tr>
                        <td>Order No</td>
                        <td>: &nbsp;{{ $invoice->order->id }}</td>
                    </tr>

                    <tr>
                        <td>Transport</td>
                        <td>: &nbsp;{{ $invoice->transport }}</td>
                    </tr>

                    <tr>
                        <td>Vehicle No</td>
                        <td>: &nbsp;{{ $invoice->vehicle_no }}</td>
                    </tr>

                    <tr>
                        <td>Agent</td>
                        <td>: &nbsp;{{ $invoice->agent }}</td>
                    </tr>
                </table>
            </th>
        </tr>

        <tr>
            <th colspan="4">
                <p class="text-regular"><span
                            class="text-bold">Shipping Address : </span> {{ $invoice->order->address->address }}
                    <br> <span
                            class="text-bold">State and Code : </span> {{ $invoice->order->address->city->state->name }}
                    - {{ $invoice->order->address->city->state->code }}</p>
            </th>
        </tr>

        <tr>
            <th>Description of goods :</th>
            <th>HSN</th>
            <th>QTY</th>
            <th>KGS</th>
            <th>RATE</th>
            <th>PER</th>
            <th> GST %</th>
            <th>GST</th>
            <th>AMOUNT</th>
        </tr>
          <?php
          foreach ($invoice->invoiceProducts as $invoiceProduct) {
          $quantity = $invoiceProduct->units;
          $price = $invoiceProduct->price;
          $weight = $invoiceProduct->weight;
          $type = $invoiceProduct->product->type;

          $calculation_quantity = ($type === \App\Constants\ProductConstants::PRODUCT_TYPE_UNITS) ? $invoiceProduct->units : $invoiceProduct->weight;

          $total = $invoiceProduct->total;


          $taxable_amount += $total;
          $total_quantity += $quantity;
          $total_weight += $weight;
          ?>
        <tr class="borderless-row">
            <td>
                <div>
                    <span class="text-bold">S.S Steel Dabba</span> <br>
                    <small style="font-size: 10px;">{{$invoiceProduct->product->subcategory->name}}
                        | {{$invoiceProduct->product->category->name}}
                        | {{$invoiceProduct->product->size->name}}</small>
                </div>
            </td>
            <td>{{$invoiceProduct->product->category->hsn_code}}</td>
            <td>{{ $quantity }}</td>
            <td>{{ $weight }}</td>
            <td>{{ $price }}</td>
            <td>{{ $type === \App\Constants\ProductConstants::PRODUCT_TYPE_UNITS ? "UNITS" : "KGS" }}</td>
            <td>{{ $invoiceProduct->product->getGstRate()  }}</td>
            <td>{{$invoiceProduct->gst}}</td>
            <td>{{ $invoiceProduct->total }}</td>
        </tr>
          <?php
          }
          $total_gst += ($invoice->tcs * ($taxable_amount + $invoice->packing_charges) / 100);
          $total_amount = $taxable_amount + $invoice->packing_charges - $invoice->discount + $total_gst + ($invoice->tcs * ($taxable_amount + $invoice->packing_charges) / 100);
          ?>
        <tr>
            <td></td>
            <td class="text-bold">Total</td>
            <td class="text-bold">{{ $total_quantity }}</td>
            <td class="text-bold">{{ $total_weight }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td class="test-bold">{{ $total_gst }}</td>
            <td class="text-bold">{{$taxable_amount}}</td>
        </tr>
        <tr>
            <td colspan="1">
                <span class="text-bold">WAY BILL NO : {{$invoice->way_bill_no}}</span>
            </td>
            <td colspan="3">
                <span class="text-bold">No of Bags : </span> {{$total_bundles}}
            </td>
            <td colspan="2">DISCOUNT :</td>
            <td colspan="3">{{$invoice->discount}}</td>
        </tr>
        <tr>
            <td><span class="text-bold">Terms : </span> Should be payed
                by {{ date('M d, Y', strtotime('+'.$invoice->order->retailer->term.' days')) }}</td>
            <td colspan="3"><span
                        class="text-bold">Due Date : </span>{{ date('M d, Y', strtotime('+'.$invoice->order->retailer->term.' days')) }}
            </td>
            <td colspan="2">PKGS / Others :</td>
            <td colspan="3">{{ $invoice->packing_charges }}</td>
        </tr>
        <tr>
            <td colspan="4" rowspan="3">
                <table class="table table-bordered">
                    <tr>
                        <th rowspan="2">Tax Type</th>
                        <th colspan="2">CGST</th>
                        <th colspan="2">SGST</th>
                        <th colspan="2">IGST</th>
                    </tr>
                    <tr>
                        <th>%</th>
                        <th>AMOUNT</th>
                        <th>%</th>
                        <th>AMOUNT</th>
                        <th>%</th>
                        <th>AMOUNT</th>
                    </tr>

                    @foreach($gsts as $key => $value)
                        @if($invoice->order->address->city->state->code === $invoice->order->warehouse->department->city->state->code)
                            <tr>
                                <td>GST {{$key}} %</td>
                                <td>{{ doubleval($key)/2 }}</td>
                                <td>{{ $value/2  }}</td>
                                <td>{{ doubleval($key)/2 }}</td>
                                <td>{{ $value/2  }}</td>
                                <td></td>
                                <td></td>
                            </tr>
                        @else
                            <tr>
                                <td>GST {{$key}} %</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>{{ doubleval($key) }}</td>
                                <td>{{ $value }}</td>
                            </tr>
                        @endif
                    @endforeach
                </table>
            </td>
            <td colspan="2">TAXABLE AMT :</td>
            <td></td>
            <td colspan="2">{{ $taxable_amount }}</td>
        </tr>
        <tr>
            <td colspan="2">TCS :</td>
            <td>{{ $invoice->tcs }}</td>
            <td colspan="2">{{ floatval($invoice->tcs * $taxable_amount/100) }}</td>
        </tr>

        <tr>
            <td colspan="2">GST :</td>
            <td></td>
            <td colspan="2">{{ $total_gst }}</td>
        </tr>
        <tr class="font-small">
            <td colspan="4"><span class="text-bold">Bank Name : </span>BANK OF INDIA <span
                        class="text-bold">A/C NO</span>.0097 201 0000 2041 <br> <span class="text-bold">IFSC CODE</span>-BKID
                0000097 <span class="text-bold">BRANCH</span> : TAMBE NAGAR, MUMBAI - 80 <br><span class="text-bold">Pin Code :</span>
                400080
            </td>
            <td colspan="2">ROUND OFF :</td>
            <td></td>
            <td colspan="2">{{  floatval(round($total_amount) - $total_amount) }}</td>
        </tr>
        <tr class="text-bold">
            <td colspan="4"><span class="text-bold">NOTE : </span> {{$invoice->note}} </td>
            <td colspan="2">TOTAL AMT :</td>
            <td></td>
            <td colspan="2">{{ floatval(round($total_amount)) }}.00</td>
        </tr>
        <tr>
            <td colspan="4">
                <ol class="font-small">
                    <li>Goods once sold will not be taken back.</li>
                    <li>Goods are always dispatched at Buyer's risk</li>
                    <li>Interest will be charged at 18%, <br>if the amount is not received within due date</li>
                    <li>Payment to be made by Payee's A/C.Cheque or Draft only.</li>
                </ol>
                <label class="bold">Subject to mumbai juridiction</label>
            </td>
            <td colspan="5">
                <div class="pull-right margin-right-10">
                    <h6 class="bold margin-bottom-40">For {{ $invoice->order->warehouse->department->company }}</h6>
                    <br><br><br>
                    <p>( PARTNER / MANAGER )</p>
                </div>
            </td>
        </tr>
    </table>
</div>
</body>
<script>
    window.print();
    setTimeout(window.close(), 1000);
</script>
</html>
