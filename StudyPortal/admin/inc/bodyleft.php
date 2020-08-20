<div id="bodyleft">
	<h3> Category Managment</h3>
	<ul>
		<li><a href="index.php">Dashboard</a></li>
		<li><a href="index.php?cat">Courses Category</a></li>
		<li><a href="index.php?sub_cat">Sub Course Category</a></li>
	</ul>

	<h3> Course Managment</h3>
	<ul>
		<li><a href="#">Active Courses</a></li>
		<li><a href="#">Pending Courses</a></li>
		<li><a href="#">Unpublish Courses</a></li>
		<li><a href="#">Courses Search</a></li>
	</ul>

	<h3> User Managment</h3>
	<ul>
		<li><a href="#">View All Student</a></li>
		<li><a href="#">View All Teacher</a></li>
		<li><a href="#">Advance User Search</a></li>
	</ul>

	<h3> PayRoll </h3>
	<ul>
		<li><a href="#">Payment to Teacher</a></li>
		<li><a href="#">Paid History</a></li>
		<li><a href="#">Advance Search</a></li>
	</ul>

	<h3> Pages Managment </h3>
	<ul>
		<li><a href="index.php?terms">Terms & Condition Page</a></li>
		<li><a href="#">Contact Us</a></li>
		<li><a href="#">About Us</a></li>
		<li><a href="#">FAQs Page</a></li>
		<li><a href="#">Edit Slider</a></li>
	</ul>	
</div>


<?php 
	if(isset($_GET['cat'])){
		include("cat.php");
	}
	if(isset($_GET['sub_cat'])){
		include("sub_cat.php");
	}
	if(isset($_GET['terms'])){
		include("terms.php");
	}
?>