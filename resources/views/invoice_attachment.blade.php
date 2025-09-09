
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Order Invoice</title>
  <style>
    .copy_type {
        display: block;
        font-weight: bold;
        font-size: 11px;
    }

    .pagebreak {
        background: black;
        page-break-after: always;
    }
  </style>
</head>

<body >
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr  bgcolor="#E3E3E3" >
        <td  style="padding: 20px;">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td>
                        <table width="100%" border="0"cellpadding="0" cellspacing="0">
                            <tr >
                                <td height="69">
                                    <table width="500"  cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td width="50" height="29"  style="font-weight:bolder; font-size:25px"><img src="{{asset('img/primespot_logo.png')}}" alt="primespot logo" width="180" title="printlabs logo" /> <br><br>INVOICE</td>
                                        {{-- <td width="50" height="29"  style="font-weight:bolder; font-size:25px">INVOICE</td> --}}
                                        <td width="50" align="right" height="29" style="font-size:25px; padding-right:50px"> </span><br> <span style="font-size: 16px">No 14 Akinremi street, Anifowoshe <br> Ikeja, Lagos</span></span></td>
                                    </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td height="69">
                                    <table width="500"  align="right" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td width="50" ><span style="font-size:15px; "> <span style="font-weight: bold; font-size:15px">BILL TO: </span><br> <span style="font-size: 16px">{{$userDetails->name}} <br> {{$userDetails->address}} <br> </span></span></td>
                                        <td width="50" align="right" style="padding-right: 50px">&nbsp;<span style="font-size:15px;  padding-right:0px"> <span style="font-weight: bold; font-size:15px">INVOICE </span><br> <span style="font-size: 14px">000<?php echo rand(1000, 9999); ?> </span><br> <span style="font-weight: bold; font-size:15px">DATE <br> </span> <span style="font-size: 14px"><?php echo date('Y-m-d') ?> </span> </span></span></td>
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
        <td>




         <table width="100%" border="1" cellpadding="0" cellspacing="0">


                <tr class="det">
                    <td width="20%" class="question">Screen :</td>
                    <td>{{$orderDetails->screen->name ?? 'N/A'}}</td>
                </tr>
                <tr class="det" style="padding-top: 5px">
                    <td width="20%" class="question">Venue :</td>
                    <td>{{$orderDetails->screen->venue->name ?? 'N/A'}}</td>
                </tr>
                <tr class="det" style="padding-top: 5px">
                    <td width="20%" class="question">Date :</td>
                    <td>{{$orderDetails->start_date}} to {{$orderDetails->end_date}}</td>
                </tr>
                <tr class="det" style="padding-top: 5px">
                    <td width="20%" class="question">No of Days :</td>
                    <td>{{$orderDetails->days}} Days</td>
                </tr>
                <tr class="det" style="padding-top: 5px">
                    <td width="20%" class="question"> Daily Rate :</td>
                    <td>#{{$orderDetails->screen->daily_rate}} </td>
                </tr>
                <tr class="det" style="padding-top: 5px">
                    <td width="20%" class="question">Amount :</td>
                    <td>N{{number_format($orderDetails->screen->daily_rate * $orderDetails->days)}}</td>
                </tr>
            </table>
    </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="69"><table width="500" border="1" align="right" cellpadding="0" cellspacing="0">

          <tr>
            <td width="70" height="29" bgcolor="#E3E3E3" style="padding-left: 20px; padding-top:10px">
                {{-- <span style="font-weight: bold"> 75% of #{{$totalCost}}:&nbsp; (#{{ 75/100 * $totalCost}})  must be paid before we can process your order</span> <br><br> --}}
                <span style="font-weight: bold">BANK&nbsp;DETAILS</span> <br><br>
                Bank : ECOBANK <br> Acc/No: NAIRA ACCOUNT: 4933060877 <br>Account Name: PRINTLABS LTD</td>
            <td width="30" align="right">&nbsp;<span style="font-size:20px; padding-right:10px"><span style="font-weight:bold; ">Total Amount:</span> N{{$orderDetails->screen->daily_rate * $orderDetails->days}} </td>
          </tr>

        </table></td>
      </tr>
      <br> <br>
      <tr align="center">
        <td align="center"> Powered By: Hypercom Ltd <br> Thank you for your patronage </td>
      </tr>

    </table>
    </td>
  </tr>
</table>
</body>
</html>
