<?php 
include('../includes/dbcon.php');
session_start();
if(isset($_SESSION['is_login']))
{
   echo "";
}
else
{
   header('location:index.php');
}

$qry="delete  from  news_and_events where id=?";
$result=$conn->prepare($qry);
$result->bindParam(1,$id,PDO::PARAM_INT);
$id=$_REQUEST['id'];

$result->execute();

header('location:career.php');




?>