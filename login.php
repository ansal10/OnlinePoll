<?php
session_start();
{
$client = new SoapClient("http://anas-pc:8080/OnlinePoll/OnlinePollService?wsdl");

    $user = $_POST['username'];
    $pass = $_POST['password'];
    $param = array("arg0"=>"select * from password_details where username='$user' and password='$pass'");
    $response = (array)$client->select($param);
    if(count($response)==1)
    {
        
        //session_register("sessionusername");
        $_SESSION['login_username']=$user;
       header("Location:profile.php");
    }
 else {
    header("Location:index.php");    
    }
    
}