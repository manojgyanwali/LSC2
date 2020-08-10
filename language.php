<?php
session_start();
if(!isset($_SESSION['lang']))
$_SESSION['lang']= "en";
else if(isset($_REQUEST['lang']) && $_SESSION['lang'] !=$_REQUEST['lang'] && !empty($_REQUEST['lang']))
{
    if($_REQUEST['lang']=="en")
    $_SESSION['lang']="en";
    else if ($_REQUEST['lang']=="nep")
    {
        $_SESSION['lang']="nep";
    }

}
echo "choose language:".$_SESSION['lang'];

 require_once "language/". $_SESSION['lang'].".php";
?>