<?php
include 'session.php';

?>
<!DOCTYPE HTML>
<!--
	Elemental: A responsive HTML5 website template by HTML5Templates.com
	Released for free under the Creative Commons Attribution 3.0 license (html5templates.com/license)
	Visit http://html5templates.com for more great templates or follow us on Twitter @HTML5T
-->
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
    function f()
    {
         var QS =document.getElementById("pollqs").value;
         var y = document.pollform.innerHTML;
         
         y = y + "<input type='text' required='' class='text1' name='option"+op+"' style='width:600px;height:60px;font-size:30px'/><br> ";
         
         op=op+1;
         document.pollform.innerHTML=y;
         document.getElementById("pollqs").value=QS;
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
                            <div id="splash" ><span > Create ur own Poll </span> Enter Question followed by answers </div>
			</div>
		</div>
	</div>
	<div class="12u">
		<div class="5grid-layout">
			<div class="row">
				<div class="4u">
					<section>
						
					</section>
				</div>
                            
                            
                            
			</div>
		</div>
	</div>
                <div class="5grid-layout">
			<div class="row">
				<div class="12u" id ="option">
                                    
                                    <form name="pollform" method="POST" action="registerpoll.php">
                                        <textarea  class="text1" style="width:1000px;height:300px;
                                                  color:red; font-size:40px ;"
                                                  name="pollqs" required="" id="pollqs">
                                                      
                                        </textarea>
                                        <input class='button' type='submit' value='Submit' style='height:100px;'><br>
                                                   
                                    </form>
                                    <input type="button" class="button" style="color:red;width:650px;font-size:60px" onclick="f()" value="Add Options"/>
                                  
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

