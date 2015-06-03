<?php
include './session.php';
include './wsdl.php';
$id = $_GET['id'];
$response = (array) $client->select(array("arg0"=>"SELECT e.eventname, o.username, o.time
FROM EVENTS AS e, eventsdetails AS o
WHERE e.eventid = o.eventid
AND e.eventid =$id"));
$response = (array)$response['return'];
$qs = $response['coloum'][1];
$user = $response['coloum'][2];
$time = $response['coloum'][3];

$response = (array)$client->select(array("arg0"=>"select * from eventoptions where eventid = $id"));
$option="";
{
    if(count($response,1)==1)
        {
            $res = (array) $response['return'];
            $opt = $res['coloum'][2] ;
            $voted = $res['coloum'][3];
          $option = "<h2 style='color:red' ><input type='radio' name ='radiooptions' value = '$opt' >$opt</h2>  <h4>total voted: $voted</h4><br><br> ";
           

        }
elseif (count($response,1)>1) {
    
    for($i = 0 ; $i < count($response['return']) ; $i++)
        {
           $res = (array) $response['return'][$i];
            $opt = $res['coloum'][2] ;
            $voted = $res['coloum'][3];
          $option = $option."<h2 class='color:red'><input type='radio' name ='radiooptions' value = '$opt' >$opt </h2> <h4>total voted: $voted</h4><br><br> ";
        }
    }
 else {
        $value= "No ongoing event"    ;
}

}
?>
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
    var id = '<?php echo $id ?>'
    
    function optionclicked()
    {
        var x = document.getElementsByName("radiooptions");
        var optionchecked="";
        for(var i = 0 ; i < x.length ; i++)
        {
            if(x[i].checked)optionchecked=x[i].value;
        }
        if(optionchecked==="")
        {
            alert("please select any options");
        }
        else
        {
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
                   alert(innerHTML=xmlhttp.responseText);
                   window.location.assign("profile.php");
                    }
                  }
                  var url = "submitoption.php?option="+optionchecked+"&id="+id;
                xmlhttp.open("GET",url,true);
                xmlhttp.send();
        }
    }
    function addoption()
    {
        var x = "<input type='text' name='newoption' style='width:500px;height:60px'class='text1'/>";
        x = x+"<input type='button' class='button1' value='Add This Option' onclick='addnewoption()'/>";
        document.getElementById("addoption").innerHTML = x;
    }
    function addnewoption()
    {
        var x = document.getElementsByName("newoption");
        
        
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
                   alert(innerHTML=xmlhttp.responseText);
                   window.location.assign("voting.php");
                    }
                  }
                  var url = "addnewoption.php?option="+x[0].value+"&id="+id;
                xmlhttp.open("GET",url,true);
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
                            <div id="splash" style='color:red;' ><span > <?php echo $qs?></span></div>
			</div>
		</div>
	</div>
    <center style='font-size:16px'>By  <?php echo $user."                         "?>published on <?php echo $time ?></center>
	
                <div class="5grid-layout">
			<div class="row">
				<div class="12u" id ="options">
                                    
                                    <?php echo $option; ?>
                                  
				</div>
                            <div id="addoption">
                                <input type="button" class="button1" value="Add Option" onclick="addoption()"/>
                            </div>
			</div>
		</div>
    <br><br><button class="button" style="width:200px;height:60px;
            position:relative;bottom:10px ; left:100px"  onclick="optionclicked()">Click To Vote</button>
</div>


<div class="5grid-layout">
	<div id="copyright">
		<p>&copy; www.onlinepoll.com </p>
	</div>
</div>
    <input type ="button" value="Now You Can Click Me"/>
</body>
</html>

