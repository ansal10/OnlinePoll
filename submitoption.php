<?php
include './wsdl.php';
include './session.php';

$op = $_GET['option'];
$id = $_GET['id'];
$user = $loginuser;

// check his earlier anser , if present delete it reduce vote
$res = (array)$client->select(array("arg0"=>"select * from questionid_$id where username = '$user'"));
if(count($res,1)==1)
{
    $res = (array)$res['return'];
    $oldop = $res['coloum'][2];
   $client->update(array("arg0"=>"delete from questionid_$id where username = '$user'")); 
   $client->update(array("arg0"=>"update eventoptions set voted = voted-1 where eventid = $id and options = '$oldop'"));
   echo "Dismissed ur previous vote\n\n";
}


/// insert new details
$client->update(array("arg0"=>"insert into questionid_$id values('$user' , '$op')"));
$client->update(array("arg0"=>"update eventoptions set voted = voted+1 where options='$op' and eventid = $id"));
// incrementing the vote

echo "Succesfully Vote Submitted";
?>
