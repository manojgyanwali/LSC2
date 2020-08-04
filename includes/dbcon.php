<?php

$servername="mysql:host=localhost; dbname=lsc";
$user="root";
$password="";


try
{
    $conn= new PDO($servername,$user,$password);
   
}

catch(PDOException $e)
{
    echo "connection failed".$e->getMessage();
}




?>