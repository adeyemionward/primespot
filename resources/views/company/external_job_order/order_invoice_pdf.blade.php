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
                                        <td width="50" height="29"  style="font-weight:bolder; font-size:25px"><img src="https://printlabs.com.ng/img/printlab.PNG" alt="printlabs logo" width="180" title="printlabs logo" /> <br><br>INVOICE</td>
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
                                        <td width="50" ><span style="font-size:15px; "> <span style="font-weight: bold; font-size:15px">BILL TO: </span><br> <span style="font-size: 16px">{{$order1->user->company_name}} <br> {{$order1->user->address}} <br> </span></span></td>
                                        <td width="50" align="right" style="padding-right: 50px">&nbsp;<span style="font-size:15px;  padding-right:0px"> <span style="font-weight: bold; font-size:15px">INVOICE </span><br> <span style="font-size: 14px">000{{request()->order_no}} </span><br> <span style="font-weight: bold; font-size:15px">DATE <br> </span> <span style="font-size: 14px"><?php echo date('Y-m-d') ?> </span> </span></span></td>
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
            @php $totalCost =0; @endphp
            @foreach ($orderDetails as $val)
                @php  $totalCost +=  $val->total_cost; @endphp
                <tr style="border-bottom: 1px solid #ccc;">
                    <td align="left" width="20" style="padding-left: 20px">{{$val->job_order_name}}</td>
                    <td align="right" width="25">{{$val->quantity}}</td>
                    <td align="right" width="25"> NONE</td>
                    <td align="right" width="15"> 0</td>
                    <td align="right" width="15" style="padding-right: 20px">#{{$val->total_cost}}</td>
                </tr>
            @endforeach

        </table>
    </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="69"><table width="500" border="1"  cellpadding="0" cellspacing="0">

          <tr>
            <td width="70" height="29" bgcolor="#E3E3E3" style="padding-left: 20px; padding-top:10px"><span style="font-weight: bold">PAYMENT&nbsp;DETAILS</span> <br><br> Bank : ECOBANK <br> Acc/No: NAIRA ACCOUNT: 4933060877 <br>Account Name: PRINTLABS LTD</td>
            <td width="30" align="right">&nbsp;<span style="font-size:20px; padding-right:10px"><span style="font-weight:bold; ">Total Amount:</span> #{{$totalCost}} </td>
          </tr>
        </table></td>
      </tr>

      </tr>
    </table>
    </td>
  </tr>
</table>
