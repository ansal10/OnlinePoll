<?php
include 'wsdl.php';
session_start();

$loginuser=" ";
if(isset($_SESSION['login_username']))
{
    $loginuser = $_SESSION['login_username'];
}
$param = array("arg0"=>"select * from password_details where username='$loginuser'");
$response = (array)$client->select($param);

if(count($response)<1)
{
header("Location:index.php");
}
?>