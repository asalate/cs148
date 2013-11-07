
<!--<nav>
     <dl class="menu">
     	<dt><a href="home.php">Home</a></dt>
        <dt><a href="form.php">Form</a></dt>
        <dt><a href="info.php">Info</a></dt>    
     </dl>
</nav> -->

<nav id="navMenu" class="nav">
	<ol>
	<?php if(basename($_SERVER['PHP_SELF'])=="home.php"){
    print '<li class="activePage">Home</li>' . "\n";
} else {
    print '<li><a href="home.php">Home</a></li>' . "\n";
} 
if(basename($_SERVER['PHP_SELF'])=="form.php"){
    print '<li class="activePage">Form</li>' . "\n";
} else {
    print '<li><a href="form.php">Form</a></li>' . "\n";
}
if(basename($_SERVER['PHP_SELF'])=="post.php"){
    print '<li class="activePage">Info</li>' . "\n";
} else {
    print '<li><a href="info.php">Info</a></li>' . "\n";
}

?>
	</ol>
</nav>
