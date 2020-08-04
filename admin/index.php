<?php 
 include('../includes/dbcon.php');
 session_start();


if(isset($_REQUEST['login']))
{
   
$qry="select *from admin where username=? and password=?";
$result=$conn->prepare($qry);
$result->bindparam(1,$username);
$result->bindparam(2,$password);


$username=$_REQUEST['email'];
$password=$_REQUEST['password'];
$result->execute();
 if($result->rowCount()>0)
 {
    $_SESSION['is_login']=true;
    header('location:home.php');
    

 }
 else
 {
    echo "username and password not match";
 }



}









?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<body>
    
        <div class="LoginAdmin">
           <div class="container logincontainer">
               <div class="row">
                   <div class="col-md-7">
                       <img src="images/login.svg" alt="" class="loginImg">
                   </div>
                   <div class="col-md-5 loginForm">
                       <h2 style="margin-top: 60px;">WELCOME TO LSC ADMIN</h2>
                       <p style="color: white;">Please Enter Username & Password to Login</p>

                        <form method="POST" style="margin-top: 30PX;" >
                            <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" name="email" class="form-control col-md-11" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username">
                            </div>
                            <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control col-md-11" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Remember Me !</label>
                            </div>
                           <button type="submit" name="login" class="btn btn-primary" style="margin-top:20px;">Login
                        </form>

                   </div>
               </div>
           </div> 
        </div>


        
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/d27006f8df.js" crossorigin="anonymous"></script>
</body>
</html>