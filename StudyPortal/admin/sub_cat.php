<div id="bodyright">
	<?php if(isset($_GET['edit_sub_cat'])) { echo edit_sub_cat(); }else { ?>
	<h3>View Sub Categories</h3>
	<div id="add">
		<details>
			<summary>Add Sub Category</summary>
			<form method="post" enctype="multipart/form-data">
				<select name="cat_id">
					<option value="">Select Category</option>
					<?php echo select_cat(); ?> 
				</select>
				<input type="text" name="sub_cat_name" placeholder="Enter Sub Category Here"/>
				<center><button name="add_sub_cat">Add Category</button></center>
			</form>
		</details>

		<table cellspacing="0">
			<tr>
				<th>Sr. No</th>
				<th>Sub-Category</th>
				<th>Main Category</th>
				<th>Edit</th>
				<th>Delete</th>
				<?php echo view_sub_cat(); ?>
			</tr>
		</table>
	</div>
<?php } ?>
</div>

<?php echo add_sub_cat(); ?>