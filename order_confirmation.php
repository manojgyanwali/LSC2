
<?php
session_start();


 



include('includes/dbcon.php');
$qry="insert into  customer_data (name,address,phone_no,email_address,quantity,product_id)value(?,?,?,?,?,?) ";
$result=$conn->prepare($qry);
$result->bindParam(1,$name);
$result->bindParam(2,$address);
$result->bindParam(3,$phone);
$result->bindParam(4,$email);
$result->bindParam(5,$_SESSION['quantity']);
$result->bindParam(6,$_SESSION['id']);



$name=$_REQUEST['name'];
$address=$_REQUEST['address'];
$phone=$_REQUEST['phone'];
$email=$_REQUEST['email'];


if($result->execute()){
    $_SESSION['confirm_message']='<div class="alert alert-success col-md-6" role="alert">your order has been sucessfully ordered.Thank you</div>';
    header('location:productOrder.php');
    
}






?>