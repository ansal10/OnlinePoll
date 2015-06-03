<?php
include './wsdl.php';
include './session.php';
$id = $_GET['id'];
$user = $loginuser;
$response = (array)$client->select(array("arg0"=>"select * from eventoptions where eventid = $id"));
$result="";
if(count($response,1)==1)
{
    $res = (array) $response['return'];
    $op = $res['coloum'][2] ;
    $voted = $res['coloum'][3];
    $result="<p class='text1' style='font-size:20px'>$op</p><h3> voted by $voted</h3><br>";
  
}
elseif (count($response,1)>1) {
    
    for($i = 0 ; $i < count($response['return']) ; $i++)
    {
       $res = (array) $response['return'][$i];
       $op = $res['coloum'][2] ;
        $voted = $res['coloum'][3];
      $result=$result."<p class='text1' style='font-size:20px'>$op</p><h3> voted by $voted</h3><br>"; 
    }
}
 else {
$value= "<h1>No Option was submitted for this question</h1>"    ;
}
echo $result;