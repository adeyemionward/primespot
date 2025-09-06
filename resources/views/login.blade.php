<!doctype html>
<html lang="en" dir="ltr">
<head>
<title>Login | PrimeSpot</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" type="image/x-icon" href="assets/img/leaf.svg">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<style>
@import
	url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

* {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	font-family: 'Poppins', sans-serif;
}

html, body {
	display: grid;
	width: 100%;
    height: 100vh;
	place-items: center;
	background:
                linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                url('./img/billboard.png') center/cover no-repeat;
}


::selection {
	background: green;
	color: #fff;
}

.wrapper {
	overflow: hidden;
	max-width: 600px;
	background: #fff;
	padding: 30px;
	border-radius: 5px;
	box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.1);
}

.wrapper .title-text {
	display: flex;
	width: 200%;
}

.wrapper .title {
	width: 50%;
	font-size: 35px;
	font-weight: 600;
	text-align: center;
	transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

.wrapper .slide-controls {
	position: relative;
	display: flex;
	height: 50px;
	width: 100%;
	overflow: hidden;
	margin: 30px 0 10px 0;
	justify-content: space-between;
	/*   border: 1px solid lightgrey; */
	border-radius: 25px;
}



input[type="radio"] {
	display: none;
}

#signup:checked ~ .slider-tab {
	left: 50%;
}

#signup:checked ~ label.signup {
	color: #fff;
	cursor: default;
	user-select: none;
}

#signup:checked ~ label.login {
	color: #000;
}

#login:checked ~ label.signup {
	color: #000;
}

#login:checked ~ label.login {
	cursor: default;
	user-select: none;
}

.wrapper .form-container {
	width: 100%;
	overflow: hidden;
}

.form-container .form-inner {
	display: flex;
	width: 200%;
}

.form-container .form-inner form {
	width: 50%;
	transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

.form-inner form .field {
	height: 50px;
	width: 100%;
	margin-top: 20px;
}

.form-inner form .field input {
	height: 100%;
	width: 100%;
	outline: none;
	padding-left: 15px;
	border-radius: 5px;
	border: 1px solid lightgrey;
	border-bottom-width: 2px;
	font-size: 17px;
	transition: all 0.3s ease;
}

.form-inner form .field input:focus {
	border-color: #fc83bb;
	/* box-shadow: inset 0 0 3px #fb6aae; */
}

.form-inner form .field input::placeholder {
	color: #999;
	transition: all 0.3s ease;
}

form .field input:focus::placeholder {
	color: #b3b3b3;
}

.form-inner form .pass-link {
	margin-top: 5px;
}

.form-inner form .signup-link {
	text-align: center;
	margin-top: 30px;
}

.form-inner form .pass-link a, .form-inner form .signup-link a {
	color: #009ffd;
	text-decoration: none;
}

.form-inner form .pass-link a:hover, .form-inner form .signup-link a:hover
	{
	text-decoration: underline;
}

form .btn {
	height: 50px;
	width: 100%;
	border-radius: 5px;
	position: relative;
	overflow: hidden;
}

form .btn .btn-layer {
	height: 100%;
	width: 300%;
	position: absolute;
	left: -100%;
	background: linear-gradient(315deg, #009ffd 0%, #2a2a72 74%);
	border-radius: 5px;
	transition: all 0.4s ease;;
}

form .btn:hover .btn-layer {
	left: 0;
}

form .btn input[type="submit"] {
	height: 100%;
	width: 100%;
	z-index: 1;
	position: relative;
	background: none;
	border: none;
	color: #fff;
	padding-left: 0;
	border-radius: 5px;
	font-size: 20px;
	font-weight: 500;
	cursor: pointer;
}
.error-text{
    color: red;
}
</style>
</head>
<body>
	<div class="wrapper">
		{{-- <center><img src="{{ asset('siteimages/'.@$site_details->site_logo1) }}" alt="" width="350" height="170px"></center> --}}
		<div class="title-text">
			<div class="title login">Login</div>
			<div class="title signup">Signup</div>
		</div>
		<div class="form-container">
			<div class="form-inner">
                {{-- SIGNIN --}}
				<form method="POST"  id="login" class="login">
                    @csrf
                    @method('POST')
					<div class="field">
						<input type="text" name="email"   placeholder="Email Address" >
                        <span class="text-danger error-text email_error"></span>
					</div>

					<div class="field">
						<input type="password"  name="password" placeholder="Password" required>
                        <span class="text-danger error-text password_error"></span>
					</div>
					{{-- <div class="pass-link">
						<a href="#">Forgot password?</a>
					</div> --}}
					<div class="field btn">
						<div class="btn-layer"></div>
						<input type="submit" id="loginBtn"  name="login"  value="Signin" style="background-color: #11773b ;">
					</div>
					<div class="signup-link">
                        @if (request()->status)
                        Not a member? <a href="{{route('register', ['status' => 'order'])}}">Signup as a Custmer</a>
                        @else
                        Not a member? <a href="{{route('register')}}">Signup as a Custmer</a>
                        @endif
					</div>
				</form>
			</div>
		</div>
	</div>
</body>


<script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>

    $("#login").submit(function(e){
        e.preventDefault();
        //alert();

        var all = $(this).serialize();
        //console.log(all);
        $.ajax({
            url:  "",
            type: "POST",
            data: all,


            beforeSend:function(){
               // $(document).find('span.error-text').text('');
                $('#loginBtn').prop('disabled',true);
                $('#loginBtn').css('cursor', 'not-allowed');
                $('#loginBtn').html('<span class="flex justify-center items-center">Authenticating... </span>');
            },

            success: function(data){

                if (data.status==0) {
                    $.each(data.error, function(prefix, val){
                        $('span.'+prefix+'_error').text(val[0]);
                    });
                    $("#loginBtn").attr('disabled',false);
                    $('#loginBtn').css('cursor', 'pointer');
                    $('#loginBtn').html('<span class="flex justify-center items-center">Signin</span>');
                }
                if(data == 1){
                    toastr.success("Login Successful");
                    setInterval(function(){
                        window.location.replace('{{route("customer.dashboard")}}');
                    },2000)

                }else if(data == 2){
                         toastr.success("Login Successful");
                    setInterval(function(){
                        window.location.replace('{{route("vendor.dashboard")}}');
                    },2000)
                }else if(data == 11){
                    toastr.success("Login Successful");
                    setInterval(function(){
                        window.location.replace('{{route("admin.dashboard")}}');
                    },2000)

                }else if(data == 9){
                    toastr.error("Error occured: Account Inactive");
                    $("#loginBtn").attr('disabled',false);
                    $('#loginBtn').css('cursor', 'pointer');
                    $('#loginBtn').html('<span class="flex justify-center items-center">Signin </span>');

                }else if(data == 7){
                    toastr.error("Error occured: Incorrect Email/Password");
                    $("#loginBtn").attr('disabled',false);
                    $('#loginBtn').css('cursor', 'pointer');
                    $('#loginBtn').html('<span class="flex justify-center items-center">Signin </span>');

                }else if(data == 5){
                    toastr.error("Error occured: Please try later");
                    $("#loginBtn").attr('disabled',false);
                    $('#loginBtn').css('cursor', 'pointer');
                    $('#loginBtn').html('<span class="flex justify-center items-center">Signin </span>');
                }
            }
        })
    });
</script>
</html>
