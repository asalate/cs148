<?php

$debug = true; 

	 include ("top.php");
	 include ("header.php");
	 include ("menu.php");
	  ?>

<h1 id="thewall">The Wall</h1>
<!--     The Wall     -->

<?php
require_once("connect.php");

$sql = "SELECT fldFileLink FROM tblImage";

$stmt = $db->prepare($sql); 
            $stmt->execute(); 

            $result = $stmt->fetchAll(); 
?>

<section id="theWall">
		<?php
		foreach($result as $record){
				print'<figure class="grow pic" onmouseouver="displayText"><a href="' . $record["fldFileLink"] . '" target="_blank"><img alt="" src="' . $record["fldFileLink"] . '" height="100" width="100" /><figcaption class="text">Student</figcaption></figure><figure></a>';
				}
				?>
</section> 
<br> <br> <br> <br> <br> <br> <br>
<p id="news">Fill out a form to get on the wall!<p>
<br><br>
<?php
		 include ("footer.php");
?>


</html>