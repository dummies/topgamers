<html lang="en-us" class=" js no-flexbox flexbox-legacy no-touch rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients no-cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent cssmask" dir="ltr">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>All time top gamers</title>
<link href="/main.css" rel="stylesheet">
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet">
<script src="/js/modernizr.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js"></script>
<link href="images.css" rel="stylesheet" type="text/css">
</head>

<body>



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
			echo "<div class='panel'><div class='hover'>";
            /*echo "<tr><th>".$i."</th>";
			echo "<th>".$registrant['Name']."</th>";
            echo "<th><th>".$registrant['Score']."</th></th></tr>";*/
			$tmp = "https://graph.facebook.com/".$registrant['id']."/picture?type=large";
			echo "<img src='$tmp'>";
			echo "</div></div>";
			}
			$i++;
        }
        echo "</div>";
    } 
	else
	{
        echo "<h3>Oops,Looks like its sleep time ,nobody is playing! </h3>";
     }
	

?>



</body>
</html>