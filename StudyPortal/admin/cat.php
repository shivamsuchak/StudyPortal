<div id="bodyright">
	<?php 
		if(isset($_GET['edit_cat'])) { 
			echo edit_cat();
		} else {
	?>
	<h3>View Categories</h3>
	<div id="add">
		<details>
			<summary>Add Category</summary>
			<form method="post" enctype="multipart/form-data">
				<input type="text" name="cat_name" placeholder="Enter Category Here"/>
				<center><button name="add_cat">Add Category</button></center>
			</form>
		</details>
		<table cellspacing="0">
			<tr>
				<th>Sr. No</th>
				<th>Category</th>
				<th>Edit</th>
				<th>Delete</th>
				<?php echo view_cat(); ?>
			</tr>
		</table>
	</div>
<?php } ?>
</div>

<?php echo add_cat();?>