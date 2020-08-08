<?php 
session_start();
include('includes/dbcon.php');
if(isset($_REQUEST['sign_in']))
{
	

$name=$_REQUEST['username'];
$address=$_REQUEST['address'];
$phone=$_REQUEST['phone'];
$email=$_REQUEST['email'];
$password=$_REQUEST['password'];
$c_password=$_REQUEST['c_password'];
if($password!=$c_password)
{
	$message= '<div class="alert alert-warning col-md-12" role="alert">password and confirm password do not match</div>';
	$_SESSION['message']=$message;
}
else
{
	$qry="insert into users_signup(full_name,email,address,contact_no,password,c_password) values (?,?,?,?,?,?)";
$result=$conn->prepare($qry);
$result->bindParam(1,$name,PDO::PARAM_STR);
$result->bindParam(2,$email,PDO::PARAM_STR);
$result->bindParam(3,$address,PDO::PARAM_STR);
$result->bindParam(4,$phone,PDO::PARAM_STR);
$result->bindParam(5,$password,PDO::PARAM_STR);
$result->bindParam(6,$c_password,PDO::PARAM_STR);



$result->execute();
$message='<div class="alert alert-success" role="alert">Sucessfully sigin-in now log-in to continue</div>';
$_SESSION['message']=$message;
}




}

?>













<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login V15</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<!-- <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
 ===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/subnewsImg.png);">
					<span class="login100-form-title-1">
						Sign Up
					</span>
					<a href="index.php" class="normalA">
						<p class="text-center" style="color: white;">Home</p>
					</a>
				</div>

				<form action="" method="POST" class="login100-form validate-form">
				<span><?php if(isset($message)){ echo $_SESSION['message'];} ?></span>

					<div class="wrap-input100 validate-input m-b-26" data-validate="Full name is required">
						<span class="label-input100">Full Name</span>
						<input class="input100" type="text" name="username" placeholder="Enter username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="email" placeholder="Enter Email">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-26" data-validate="Address is required">
						<span class="label-input100">Address</span>
						<input class="input100" type="text" name="address" placeholder="Enter Address">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-26" data-validate="Contact number is required">
						<span class="label-input100">Contact Number</span>
						<input class="input100" type="text" name="phone" placeholder="Enter contact number">
						<span class="focus-input100"></span>
					</div>


					<div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
						<span class="label-input100">Confirm Password</span>
						<input class="input100" type="password" name="c_password" placeholder="Enter password">
						<span class="focus-input100"></span>
						
					</div>
					

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">


							<div>
								<a href="login.php" class="txt1">
									Already a member ?
								</a>
							</div>
						</div>

						<div class="container-login100-form-btn">
							<button type="submit" name="sign_in" class="login100-form-btn">
								Sign up
							</button>
						</div>
				</form>
			</div>
		</div>
	</div>

	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script src="https://kit.fontawesome.com/d27006f8df.js" crossorigin="anonymous"></script>


</body>

</html>