<?php
//include './session.php';
include './getqslist.php';
    $client = new SoapClient("http://anas-pc:8080/OnlinePoll/OnlinePollService?wsdl");

    $user = "anas_1234";
    $pass = "anas1234";
    $id="1234";
    /*
     * $param = array("arg0"=>"select * from user_details where user_name='$user' ");
    $response = (array) $client->select($param);
    $response=(array)$response['return'];
    print_r($response);
     */
    /*
     *  $param = array("arg0"=>"select * from user_details ");
    $response = (array) $client->select($param);
    $res = (array)$response['return'][0];
    print_r($res['coloum']);
     */
     /*
      * $r = (array)$client->update(array("arg0"=>"insert into eventsdetails (username,eventid) values('$loginuser',$id)"));;                            
      * echo $r['return'];
      */
 ?>
<html>
    <head>
        <style>
            .skgkjbk
            {
               
            }
        </style>
        <script>
            function f(x)
            {
                alert(" qs id is "+x);
            }
        </script>
    </head>
    <body>
        <div id='qs'>'<?php echo $value ?></div>
        
      </body>
</html>