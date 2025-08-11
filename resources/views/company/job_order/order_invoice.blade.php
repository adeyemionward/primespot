
@extends('company.layout.master')
@section('content')
@section('title', 'Dashboard')
@php $page = 'invoice_order' @endphp
<style>
    .question{
        color:red;
        font-weight: bold;
        width: 20% !important;
    }
    th, td {
  padding: 5px;
}
</style>
    <div class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-6 float-start">
                    <h4 class="m-0 text-dark text-muted">Job Order Invoice</h4>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-end">
                        <li class="breadcrumb-item"><a href="#"> Home</a></li>
                        <li class="breadcrumb-item active">Job Order Invoice</li>
                    </ol>
                </div>
            </div>

            <div class="content">
                <div class="canvas-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                @include('company.job_order.job_order_view_inc')

                                <div class="col-md-9 col-xl-9">
                                    <div class="card">
                                        <div class="card-header bg-white">
                                            <h5 class="card-title mb-0 text-muted">Job Order Invoice</h5>
                                        </div>
                                        <div class="card-body h-100">
                                            <div class="align-items-start">
                                                <div class="tab-content" id="nav-tabContent">
                                                    <div class="tab-pane fade show active" id="nav-server"
                                                        role="tabpanel" aria-labelledby="nav-server-tab">
                                                        <table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
                                                            <tr  bgcolor="#E3E3E3" >
                                                                <td  style="padding: 20px;">
                                                                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                                        <tr>
                                                                            <td>
                                                                                <table width="100%" border="0"cellpadding="0" cellspacing="0">
                                                                                    <tr >
                                                                                        <td height="69">
                                                                                            <table width="900"  cellpadding="0" cellspacing="0">
                                                                                            <tr>
                                                                                                <td width="50" height="29"  style="font-weight:bolder; font-size:25px"><img src="https://printlabs.com.ng/img/printlab.PNG" alt="printlabs logo" width="180" title="printlabs logo" /> <br><br>INVOICE</td>
                                                                                                {{-- <td width="50" height="29"  style="font-weight:bolder; font-size:25px">INVOICE</td> --}}
                                                                                                <td width="50" align="right" height="29" style="font-size:25px; padding-right:50px"></span><br> <span style="font-size: 16px">2, Anifowoshe Avenue <br> Ikeja, Lagos</span></span></td>
                                                                                            </tr>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td height="69">
                                                                                            <table width="900"  align="right" cellpadding="0" cellspacing="0">
                                                                                            <tr>
                                                                                                <td width="50" ><span style="font-size:15px; "> <span style="font-weight: bold; font-size:15px">BILL TO: </span><br> <span style="font-size: 16px">{{$orderDetails->user->company_name}} <br> {{$orderDetails->user->address}} <br> </span></span></td>
                                                                                                <td width="50" align="right" style="padding-right: 50px">&nbsp;<span style="font-size:15px;  padding-right:0px"> <span style="font-weight: bold; font-size:15px">INVOICE </span><br> <span style="font-size: 14px">000{{$orderDetails->id}} </span><br> <span style="font-weight: bold; font-size:15px">DATE <br> </span> <span style="font-size: 14px"><?php echo date('Y-m-d') ?> </span> </span></span></td>
                                                                                            </tr>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td height="50">
                                                                                            <hr>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            <td>
                                                                            <td>&nbsp;</td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr><br>
                                                              <tr>
                                                                <td><table width="100%" border="1" cellpadding="0" cellspacing="0">
                                                                    <tr>
                                                                        <td bgcolor="#E3E3E3" height="28" style="padding-left: 20px">Item</td>
                                                                        <td bgcolor="#E3E3E3" height="28" align="right">Quantity</td>
                                                                        <td bgcolor="#E3E3E3" height="28"  align="right">Payment&nbsp;Type</td>
                                                                        <td bgcolor="#E3E3E3" height="28" align="right">Amount&nbsp;Paid</td>
                                                                        <td bgcolor="#E3E3E3" height="28" align="right" style="padding-right: 20px">Total&nbsp;Amount</td>
                                                                    </tr>
 
                                                                    <tr>
                                                                        <td align="left" width="20" style="padding-left: 20px">{{$orderDetails->job_order_name}}</td>
                                                                        <td align="right" width="25">{{$orderDetails->quantity}}</td>
                                                                        <td align="right" width="25"> {{$orderDetails->jobPaymentHistory->payment_type}}</td>
                                                                        <td align="right" width="15"> ₦{{$orderDetails->jobPaymentHistory->amount}}</td>
                                                                        <td align="right" width="15" style="padding-right: 20px">₦{{$orderDetails->total_cost}}</td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                              </tr>
                                                              <tr>
                                                                <td>&nbsp;</td>
                                                              </tr>
                                                              <tr>
                                                                <td height="69"><table width="1000" border="1"  cellpadding="0" cellspacing="0">

                                                                  <tr>
                                                                    <td width="70" height="29" bgcolor="#E3E3E3" style="padding-left: 20px; padding-top:10px"><span style="font-weight: bold">PAYMENT&nbsp;DETAILS</span> <br><br> Bank : First Bank <br> Acc/No: 01111111111 <br>Account Name: PRINTLABS</td>
                                                                    <td width="30" align="right">&nbsp;<span style="font-size:20px; padding-right:10px"><span style="font-weight:bold; ">Total Amount:</span> ₦{{$orderDetails->total_cost}} </td>
                                                                  </tr>
                                                                </table></td>
                                                              </tr>
                                                              <br> <br>

                                                              <tr align="center">
                                                                <td align="center">
                                                                    @if ( env('APP_ENV') == 'local')
                                                                        <i   class="fas fa-file-pdf"  style="color: red; font-size:30px;"> </i> <a href="{{route('job_order.order_invoice_pdf',request()->id)}}" target="_blank" style="width: 100%; text-decoration:underline; font-weight:bold"> Download Order Invoice </a>
                                                                    @else
                                                                        <i  class="fas fa-file-pdf"   style="color: red; font-size:30px"> </i>  <a href="{{route('job_order.order_invoice_pdf',request()->id)}}" target="_blank" style="width: 100%; text-decoration:underline; font-weight:bold"> Download Order Invoice</a>
                                                                    @endif
                                                                </td>
                                                              </tr>
                                                            </table>
                                                            </td>
                                                          </tr>
                                                        </table>
                                                        <hr/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>

    </div>
@endsection
