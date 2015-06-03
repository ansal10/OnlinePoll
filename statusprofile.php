<?php
include 'session.php';
include './wsdl.php';
$response =(array) $client->select(array("arg0"=>"SELECT e.eventname, e.eventid, o.username, o.time
FROM EVENTS AS e, eventsdetails AS o
WHERE e.eventid = o.eventid and o.username = '$loginuser'"));

$value="";
if(count($response,1)==1)
{
    $res = (array) $response['return'];
    $question = $res['coloum'][1] ;
    $id = $res['coloum'][2];
    $user = $res['coloum'][3];
    $time = $res['coloum'][4];
    $value= "<p id='$id' style='font-size:30px;color:red;' onclick = f($id) > <a href='#'> 1> $question </a></p><h4>Published on $time</h4><br>";
  
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
        $value = $value."<p id='$id' style='font-size:30px;color:red;' onclick = f($id) > <a href='#'>$j >>  $question </a></p><h4>Published on $time</h4><br>";
    }
}
 else {
$value= "<h1>No ongoing event</h1>"    ;
}
?>
<!DOCTYPE HTML>

<html>
<head>
<title>Elemental by HTML5Templates.com</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<noscript>
<link rel="stylesheet" href="css/5grid/core.css" />
<link rel="stylesheet" href="css/5grid/core-desktop.css" />
<link rel="stylesheet" href="css/5grid/core-1200px.css" />
<link rel="stylesheet" href="css/5grid/core-noscript.css" />
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/style-desktop.css" />
</noscript>
<script src="css/5grid/jquery.js"></script>
<script src="css/5grid/init.js?use=mobile,desktop,1000px&amp;mobileUI=1&amp;mobileUI.theme=none"></script>
<script>
    var op=0;
    function f(x)
            {
            // window.location.assign("selectedqs.php?id="+x);
            var xmlhttp;
                if (window.XMLHttpRequest)
                  {// code for IE7+, Firefox, Chrome, Opera, Safari
                  xmlhttp=new XMLHttpRequest();
                  }
                else
                  {// code for IE6, IE5
                  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                  }
                xmlhttp.onreadystatechange=function()
                  {
                  if (xmlhttp.readyState==4 && xmlhttp.status==200)
                    {
                   document.getElementById("details").innerHTML=xmlhttp.responseText;
                    }
                  }
                xmlhttp.open("GET","getdetailedstatus.php?id="+x,true);
                xmlhttp.send();

            }
    
</script>
<!--[if IE 9]><link rel="stylesheet" href="css/style-ie9.css" /><![endif]-->
</head>
<body class="homepage">


 
<div id="header-wrapper">
	<div id="header-wrapper2">
		<header id="header" class="5grid-layout">
			<div class="row">
				<div class="12u" id="logo"> <!-- Logo -->
					<h1><a href="#" class="mobileUI-site-name">Online Polling</a></h1>
					<p>by Anas</p>
				</div>
			</div>
			<div class="row">
				<div class="12u" id="menu">
					<nav class="mobileUI-site-nav">
						<ul>
							<li class="current_page_item"><a href="profile.php">Homepage</a></li>
                                                        <li><a href ="profile.php">Welcome <?php echo $loginuser?></a>
                                                        <li><a href="logout.php">Logout</a>;
							<!--<li><a href="twocolumn2.html">Two Column #2</a></li>
							<li><a href="onecolumn.html">One Column</a></li>-->
						</ul>
					</nav>
				</div>
			</div>
		</header>
		<div class="5grid-layout">
			<div class="row">
				<div class="12u">
					<div id="banner"><a href="#"><img src="images/polling.png" alt=""></a></div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="page-wrapper">
	<div class="5grid-layout">
            <div class="row">
			<div class="12u">
                            <div id="splash" ><span > Questions Posted By you </span></div>
			</div>
		</div>
	</div>
	
		
			
				<div class="4u" id="details"
                                     style="text-align:center;">
						<!-- inser option details here-->
                                               
				</div>
                            
                            
                            
			
		
	
                <div class="5grid-layout">
			<div class="row">
				<div class="12u" id ="Qs">
                                    
                                    '<?php echo $value ?>'
                                  
				</div>
			</div>
		</div>
</div>


<div class="5grid-layout">
	<div id="copyright">
		<p>&copy; www.onlinepoll.com </p>
	</div>
</div>
    <input type ="button" value="Now You Can Click Me"/>
</body>
</html>

