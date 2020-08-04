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


$qry="delete  from distributon_network where id=?";
$result=$conn->prepare($qry);
$result->bindParam(1,$id,PDO::PARAM_INT);
$id=$_REQUEST['id'];

$result->execute();

header('location:distribution.php');




?>