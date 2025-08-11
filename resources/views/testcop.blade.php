<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="x-apple-diasble-message-reformatting">
	<title>PrintLabs</title>
	<style type="text/css">
		body {
			margin: 0;
			background-color: #f0f0f0;
		}

		table {
			border-spacing: 0;
		}

		td {
			padding: 0;
		}

		img {
			border: 0;
		}

		.wrapper {
			width: 100%;
			table-layout: fixed;
			background-color: #f0f0f0;
			padding-bottom: 60px;
		}

		.main {
			background-color: #ffffff;
			margin: 0 auto;
			width: 100%;
			max-width: 600px;
			border-spacing: 0;
			font-family: sans-serif;
			color: #4a4a4a;
		}

        .main2 {
			background-color: #e2dbdb;
			margin: 0 auto;
			width: 100%;
			max-width: 600px;
			border-spacing: 0;
			font-family: sans-serif;
			color: #4a4a4a;
		}

		.two-columns {
			text-align: center;
			font-size: 0;
		}

		.two-columns>.column {
			width: 100%;
			max-width: 300%;
			display: inline-block;
			vertical-align: top;
		}
		.center{
			text-align: center;
		}
        a{
            text-decoration: none;
        }
        .withdrawal{
            font-weight:bold;

        }
	</style>
</head>

<body>

	<center class="wrapper">
		<table class="main" width="100%">
			<!-- COMPANY COLOR BORDER -->
			<tr>
				<td height="8" style="background-color: #2a2a72;"></td>
			</tr>

			<!-- LOGO SECTION -->
			<tr>
				<td style="padding: 30px 0;">
					<table width="100%">
						<tr>
							<td align="center">
								<a href="www.guestsnhost.com">
									<img src="{{asset("images/logo.png")}}" width="180" alt="logo" title="guestsnhost logo" />
								</a>
							</td>
						</tr>
					</table>
				</td>
			</tr>

			<!-- COMPANY COLOR BORDER -->
			<tr>
				<td height="2" style="background-color: #2a2a72;"></td>
			</tr>

			<!-- TITLE -->
			<tr class="center">
				<td>
					<table width="100%">
						<h2 style="font-size: larger; font-weight: 600; padding: 0 20px; color:#2a2a72; text-transform:uppercase">
                            Your Job Order Details
						</h2>
					</table>
				</td>
			</tr>
            <!-- BANNER IMAGE -->
            <tr>
				<td class="center">
					<table style="" width="100%">
            			<img  style="width:90%;height:200px " class="w-16" src="{{asset("Assets/guestimg.png")}}" alt="logo" />
					</table>
				</td>
			</tr>



            <tr>
				<td>
					<table width="100%">
						<h2 style=" font-weight: 400; padding: 0 20px; text-align:left">
              				Hello, {Name}



						</h2>
					</table>
				</td>
			</tr>

            {{-- message --}}
            <tr>
				<td>
					<table style="padding-left: 30px;" width="100%">
						<tr>
							<td style="font-size: x-large; font-weight: 600; padding-top: 20px;">Summary of Your Order Details</td>
						</tr>
					</table> <br> <br>
					<table style="padding-left: 30px; padding-bottom: 20px;" width="100%">
						<tr >
							<td style="font-size: large; font-weight: 400; color: #4a4a4a;">
								 <span style="color: #ff7518;">Product Name</span>
								- 23,09,303030
							</td>
                            <td style="font-size: large; font-weight: 400; color: #4a4a4a;">
                                <span style="color: #ff7518;">Color</span>
                               - 23,09,303030
                           </td>
						</tr>
                        <tr >
							<td style="font-size: large; font-weight: 400; color: #4a4a4a; padding-top:20px">
								 <span style="color: #ff7518;">Paper Type</span>
								- 23,09,303030
							</td>
                            <td style="font-size: large; font-weight: 400; color: #4a4a4a;  padding-top:20px">
                                <span style="color: #ff7518;">Thickness</span>
                               - 23,09,303030
                           </td>
						</tr>
                        <tr>
							<td style="font-size: large; font-weight: 400; color: #4a4a4a;  padding-top:20px">
								 <span style="color: #ff7518;">Quantity</span>
								- 23,09,303030
							</td>
                            <td style="font-size: large; font-weight: 400; color: #4a4a4a;  padding-top:20px">
                                <span style="color: #ff7518;">Total Cost</span>
                               - 23,09,303030
                           </td>
						</tr>
                        <tr>
							<td style="font-size: large; font-weight: 400; color: #4a4a4a;  padding-top:20px">
								 <span style="color: #ff7518;">Amount Paid</span>
								- 23,09,303030
							</td>
                            <td style="font-size: large; font-weight: 400; color: #4a4a4a;  padding-top:20px">
                                <span style="color: #ff7518;">Remaining Balance</span>
                               - 23,09,303030
                           </td>
						</tr>

					</table>


				</td>
			</tr>

			<tr>
				<td>

					<table style="padding-left: 30px; margin-bottom: 20px;" width="100%">
						<tr class="center">
							<td style="font-size: small; font-weight: 600; color: #4a4a4a; padding-top: 10px;">
								If you have any query, kindly send us an email on <a  href="mailto:info@printlabs.com.ng">info@printlabs.com.ng</a>
							</td>
						</tr>

						<tr class="center">
							<td style="font-size: small; font-weight: 600; color: #4a4a4a; padding-top: 10px;">
								 Thanks for using PrintLabs.
							</td>
						</tr>
					</table>
				</td>
			</tr>

			<!-- GRAY BORDER -->
			<tr>
				<td height="5" style="background-color: #f7fafc;"></td>
			</tr>

			<!-- SOCIAL ICON SECTION -->
            <table class="main2" width="100%">

			<!-- FOOTER SECTION -->

			<tr>
				<td  class="center">
					<table width="100%">
						<h6>
							© Copyright @php echo date('Y') @endphp by
							<a href="https://printlabs.com.ng/" target="_blank" style="color: #2a2a72;">
								GuestnHosts.
							</a>
							All Rights Reserved.
						</h6>
					</table>
				</td>
			</tr>
			<tr>
				<td class="center">
					<table width="100%">
						<h6>
							Ticket is powered by
							<a href="https://printlabs.com.ng/" target="_blank" style="color: #2a2a72;">
								GuestnHosts.
							</a>
						</h6>
						<img style="margin-bottom: 40px;" width="56" src="{{asset('Assets/logo2.png')}}" alt="printlabs logo" />
					</table>
				</td>
			</tr>
        </table>
		</table>
	</center>
</body>

</html>
