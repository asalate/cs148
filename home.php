<?php
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



<ol class="photos">
		<?php
		foreach($result as $record){
				print'<li><a href="' . $record["fldFileLink"] . '" target="_blank"><img alt="" src="' . $record["fldFileLink"] . '" height="100" width="100" /></a></li>';
				}
				?>
</ol> 
<p id="news">Fill out a form to get on the wall!<p>
<h2>What is The Wall?</h2>

<p>The Wall is a place for professors or students to see their student or classmates. So far it's only for 
Robert Erickson and students in his classes, but it could easily expand. The bigger, the better. Soon it can be a place 
for students to update their classes, and if added, a small blog about themselves.<br><br>
Please go and fill out a form to get on the wall! But remember only one picture per person, so choose wisely. </p>

<h2>What's Next?</h2>

<p>Some of my ideas include:</p>
<ul>
<li>Once actual students are on the wall, their name will appear on the image.</li>
<li>Or their name will appear when you hoover over their picture.</li>
<li>Possibly when clicking on the image, it can take you to the students info that they've provided from the form.</li>
<li>Make a page where students can edit and update their information.</li>
<li>A picture will appear on the wall after being approved.</li>
</ul>
<br>
<p>Please consider joining the wall. It's a great place to be and keep up to date on your CS peers.</p>
<?php
		 include ("footer.php");
?>


</html>