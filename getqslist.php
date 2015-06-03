<?php
include './wsdl.php';

$response =(array) $client->select(array("arg0"=>"SELECT e.eventname, e.eventid, o.username, o.time
FROM EVENTS AS e, eventsdetails AS o
WHERE e.eventid = o.eventid"));
$value="";
if(count($response,1)==1)
{
    $res = (array) $response['return'];
    $question = $res['coloum'][1] ;
    $id = $res['coloum'][2];
    $user = $res['coloum'][3];
    $time = $res['coloum'][4];
    $value= "<p id='$id' style='font-size:30px;color:red;' onclick = f($id) > <a href='#'> 1> $question </a></p><h4>By $user  on $time</h4>";
  
}
elseif (count($response,1)>1) {
    
    for($i = 0 ; $i < count($response['return']) ; $i++)
    {
       $res = (array) $response['return'][$i];
        $question = $res['coloum'][1] ;
        $id = $res['coloum'][2]; 
        $user = $res['coloum'][3];
          $time = $res['coloum'][4];
        $j = $i+1;
        $value = $value."<p id='$id' style='font-size:30px;color:red;' onclick = f($id) > <a href='#'>$j >>  $question </a></p><h4>By $user  on $time</h4>";
    }
}
 else {
$value= "<h1>No ongoing event</h1>"    ;
}
