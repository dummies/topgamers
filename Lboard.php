<html lang="en-us" class=" js no-flexbox flexbox-legacy no-touch rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients no-cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent cssmask" dir="ltr">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>All time top gamers</title>
<link href="/main.css" rel="stylesheet">
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet">
<script src="/js/modernizr.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js"></script>

	<style type="text/css">
		#container {
			width: 720px;
		}
		.panel {
			float: left;
			width: 200px;
			height: 200px;
			margin: -20px;
			position: relative;
		}
		
		/* -- make sure to declare a default for every property that you want animated -- */
		.panel .hover {
			float: none;
			position: absolute;
			top: 0;
			left: 0;
			z-index: 100;
			width: 200px;
			height: 200px;
			border: 1px solid #aaa;
			border-top: 1px solid #888; 
			border-left: 1px solid #888; 
			background: #6b7077;
			text-align: center;
			
			-o-transform: scale(.7);
			-moz-transform: scale(.7); 
			-webkit-transform: scale(.7);
			transform: scale(.7);

			-moz-box-shadow: inset 1px 2px 8px #222;
			-webkit-box-shadow: inset 1px 2px 8px rgba(0,0,0,0.7);
			box-shadow: inset 1px 2px 8px rgba(0,0,0,0.7);
			

			/* -- transition is the magic sauce for animation -- */
			-o-transition: all .15s;
			-moz-transition: all .15s ease-out;
			-webkit-transition: all .15s ease-out;
			transition: all .15s ease-out;
		}
		.panel .hover:hover {
			z-index: 1000;
			border-color: #bbb;
			border-right: 1px solid #aaa; 
			border-bottom: 1px solid #aaa; 

			-o-transform: scale(1);
			-moz-transform: scale(1); 
			-webkit-transform: scale(1);
			transform: scale(1);

			-moz-box-shadow: 0 15px 50px rgba(0,0,0,0.3);
			-webkit-box-shadow: 0 15px 50px rgba(0,0,0,0.3);
			box-shadow: 0 15px 50px rgba(0,0,0,0.3);
		}
		
	</style>
</head>

<body>

<div id="container">
	<h1> Top Players</h1>
	<div class="panel"><div class="hover"></div></div>
	<div class="panel"><div class="hover"></div></div>
	<div class="panel"><div class="hover"></div></div>
	<div class="panel"><div class="hover"></div></div>
	<div class="panel"><div class="hover"></div></div>
	<div class="panel"><div class="hover"></div></div>
	<div class="panel"><div class="hover"></div></div>
	<div class="panel"><div class="hover"></div></div>
</div>


<div id="other">
	Some information
</div>

<!--<script type="text/javascript">
	var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
	document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script><script type="text/javascript" src="http://www.google-analytics.com/ga.js"></script>
<script type="text/javascript">
	try {
		var pageTracker = _gat._getTracker("UA-432773-11");
		pageTracker._trackPageview();
	} catch(err) {}
</script>-->

<?php

	try {
    $conn = new PDO ( "sqlsrv:server = tcp:pvp6ee8yc7.database.windows.net,1433; Database = gamer_scores", "dummies", "dumm!es3");
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
   catch ( PDOException $e ) {
   print( "Error connecting to SQL Server." );
   die(print_r($e));
}
    $sql_select = "SELECT * FROM leaderboard order by Score desc";
    $stmt = $conn->query($sql_select);
    $registrants = $stmt->fetchAll(); 
	var_dump($registrants);
	//echo "<br/> I am fetching <br/> ";
    if(count($registrants) > 0)
	{
		//echo count($registrants);
        echo "<div id='container'><h1> Top Players</h1>";
		$i=0;
		$prev=NULL;
        foreach($registrants as $registrant) 
		{
			//var_dump($registrant);
			if($i < 8)	
			{
			echo "<div class='panel'>";
            /*echo "<tr><th>".$i."</th>";
			echo "<th>".$registrant['Name']."</th>";
            echo "<th><th>".$registrant['Score']."</th></th></tr>";*/
			$tmp = "https://graph.facebook.com/".$registrant['id']."/picture";
			echo "<img src='$tmp'>";
			echo "<div class='hover'></div></div>";
			}
			$i++;
        }
        echo "</table>";
    } 
	else
	{
        echo "<h3>Oops,Looks like its sleep time ,nobody is playing! </h3>";
     }
	

?>



</body>
</html>