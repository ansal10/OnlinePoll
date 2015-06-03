<?php
include './wsdl.php';
include './session.php';
$qs = $_POST['pollqs'];
$i=0;
for($i = 0 ;isset($_POST["option".$i]) ; $i++)
{
    $option[$i]=$_POST["option".$i];
}
echo $qs."<br><br><br>";
echo $i."  options submitted successfully";

$response = (array)$client->select(array("arg0"=>"select * from events where eventname = '$qs'"));
if(count($response)>=1){
    echo "<h1>the question already present</h1>";
    sleep(4);
    header("Location:profile.php");
}

$r = (array)$client->update(array("arg0"=>"insert into events(eventname) values('$qs')"));
        if($r['return']=="true")
        {
            echo "true<br>";
            $r = (array)$client->select(array("arg0"=>"select * from events where eventname = '$qs'"));
            $r = (array)$r['return'];
            $id = $r['coloum'][2];
            $client->update(array("arg0"=>"CREATE TABLE questionid_$id(
username VARCHAR( 50 ) ,
option VARCHAR( 50 )
)"));
            $client->update(array("arg0"=>"insert into eventsdetails (username,eventid) values('$loginuser',$id)"));
            
            for($j = 0 ; $j < $i ; $j++)
            {
                $client->update(array("arg0"=>"insert into eventoptions(eventid , options) values( $id , '$option[$j]')"));
            }
            
        }
        
        echo "<h1>successfully submitted</h1>";
        sleep(5);
        //header("Location:profile.php");
?>