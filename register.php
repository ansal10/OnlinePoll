<?php

{
$username = $_POST["username"];
$password = $_POST['password'];
$name = $_POST['name'];
$email = $_POST['email'];
$sex = $_POST['sex'];
$client = new SoapClient("http://anas-pc:8080/OnlinePoll/OnlinePollService?wsdl");
$param = array("arg0"=>"select * from password_details where username='$username' ");
$r = (array)$client->select($param);
if(count($r)==1)
{
    echo "<h1>User ALready Exist</h1>";
    sleep(5);
    //header('Location:registerform.php');
}
 else {
     $param = array("arg0"=>"insert into user_details values('$username','$name','$email','$sex')");;
     $r1=(array)$client->update($param);
     if($r1['return']=="true")
     {
        $param = array("arg0"=>"insert into password_details values('$username' , '$password')");
        $r2 = (array)$client->update($param);
        
        if($r2['return']=="true")
            {
             echo "<h1>successfully registered</h1>";
             sleep(5);
            // header('Location:index.php');
            }
        }
        else
        {
             echo "<h1>User ALready Exist</h1>";
             sleep(5);
            //header('Location:registerform.php');
        }
 }

}