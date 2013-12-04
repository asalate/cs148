
<!--<nav>
     <dl class="menu">
     	<dt><a href="home.php">Home</a></dt>
        <dt><a href="form.php">Form</a></dt>
        <dt><a href="info.php">Info</a></dt>    
     </dl>
</nav> -->

<nav id="navMenu" class="nav">
	<ol>
	<?php if(basename($_SERVER['PHP_SELF'])=="http://www.uvm.edu/~asalate/cs148/assignment7.1/home.php"){
    print '<li class="activePage">Home</li>' . "\n";
} else {
    print '<li><a href="http://www.uvm.edu/~asalate/cs148/assignment7.1/home.php">Home</a></li>' . "\n";
} 
if(basename($_SERVER['PHP_SELF'])=="http://www.uvm.edu/~asalate/cs148/assignment7.1/form.php"){
    print '<li class="activePage">Form</li>' . "\n";
} else {
    print '<li><a href="http://www.uvm.edu/~asalate/cs148/assignment7.1/form.php">Form</a></li>' . "\n";
}
if(basename($_SERVER['PHP_SELF'])=="http://www.uvm.edu/~asalate/cs148/assignment7.1/info.php"){
    print '<li class="activePage">Info</li>' . "\n";
} else {
    print '<li><a href="http://www.uvm.edu/~asalate/cs148/assignment7.1/info.php">Info</a></li>' . "\n";
}
if(basename($_SERVER['PHP_SELF'])=="http://www.uvm.edu/~asalate/cs148/assignment7.1/form/form.php"){
    print '<li class="activePage">Admin</li>' . "\n";
} else {
    print '<li><a href="http://www.uvm.edu/~asalate/cs148/assignment7.1/form/form.php">Admin</a></li>' . "\n";
}

?>
	</ol>
</nav>
