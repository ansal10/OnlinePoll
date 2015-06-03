<?php
include './wsdl.php';
include './session.php';

$id = $_GET['id'];
$op = $_GET['option'];

$res = (array)$client->select(array("arg0"=>"select * from eventoptions where eventid = '$id' and options = '$op'"));
//echo count($res,1);
if(count($res,1)==1)
{
    echo "Option Already present";
}
else
{
    $res = (array)$client->update(array("arg0"=>"insert into eventoptions (eventid , options) values('$id' , '$op')"));
     $res = $res['return'];
     echo $res;
}


