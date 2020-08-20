<div id="bodyright">
	<?php 
		if(isset($_GET['edit_cat'])) { 
			echo edit_cat();
		} else {
	?>
	<h3>View Terms & Conndition</h3>
	<div id="add">
		<details>
			<summary>Add New Terms & Conndition</summary>
			<form method="post" enctype="multipart/form-data">
				<select name="for_whom" required>
					<option value="">Select Term</option>
					<option value="student">Student</option>
					<option value="teacher">Teacher</option>
				</select>
				<input type="text" name="term" placeholder="Enter Term Here"/>
				<center><button name="add_term">Add T&C</button></center>
			</form>
		</details>
		<table style="width: 90%" cellspacing="0">
			<tr>
				<th>Sr. No</th>
				<th>Terms</th>
				<th>For Whom</th>
				<th>Action</th>
				<?php echo view_term(); ?>
			</tr>
		</table>
	</div>
<?php } ?>
</div>

<?php echo add_term();?>