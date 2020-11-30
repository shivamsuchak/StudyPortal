<?php
	function add_cat()
	{
		include("inc/db.php");
		if(isset($_POST['add_cat']))
		{
			$cat_name=$_POST['cat_name'];

			$check=$pdo->prepare("select * from category where cat_name='$cat_name'");
			$check->setFetchMode(PDO:: FETCH_ASSOC);
			$check->execute();
			$count=$check->rowCount();

			if($count==1)
			{
				echo "<script>alert('Already Added')</script>";
				echo "<script>window.open('index.php?cat', '_self')</script>";	
			}else{

				$add_cat=$pdo->prepare("insert into category(cat_name)values('$cat_name')");
				if($add_cat->execute())
				{
					echo "<script>alert('Added Successfully')</script>";
					echo "<script>window.open('index.php?cat', '_self')</script>";
				}
				else
				{
					echo "<script>alert('Something went wrong Try Again later!')</script>";
					echo "<script>window.open('index.php', '_self')</script>";
				}
			}
		}
	}

	function edit_cat()
	{
		include("inc/db.php");
			
		if(isset($_GET['edit_cat']))
		{

			$id=$_GET['edit_cat'];
//			$cat_name=$_GET['cat_name'];

			$get_cat=$pdo->prepare("select * from category where cat_id='$id'");
			$get_cat->setFetchMode(PDO:: FETCH_ASSOC);
			$get_cat->execute();
			$row=$get_cat->fetch();
			
			echo"<h3>Edit Category</h3>
			<form id='edit_form' method='post' enctype='multipart/form-data'>
				<input type='text' name='cat_name' value='".$row['cat_name']."' placeholder='Enter Category Here'/>
				<center><button name='edit_cat'>Edit Category</button></center>
			</form>";

			if(isset($_POST['edit_cat'])){
				$cat_name=$_POST['cat_name'];
				$check=$pdo->prepare("select * from category where cat_name='$cat_name'");
				$check->setFetchMode(PDO:: FETCH_ASSOC);
				$check->execute();
				$count=$check->rowCount();

				if($count==1)
				{
					echo "<script>alert('Already Added')</script>";
					echo "<script>window.open('index.php?cat', '_self')</script>";	
				}else{

					$up=$pdo->prepare("update category set cat_name='$cat_name' where cat_id='$id'");

					if($up->execute())
					{
						echo "<script>alert('Upadted Successfully')</script>";
						echo "<script>window.open('index.php?cat', '_self')</script>";
					}
					else
					{
						echo "<script>alert('Something went wrong Try Again later!')</script>";
						echo "<script>window.open('index.php', '_self')</script>";
					}
				}
			}
		}
	}

	function edit_sub_cat()
	{
		include("inc/db.php");
			
		if(isset($_GET['edit_sub_cat']))
		{

			$id=$_GET['edit_sub_cat'];
//			$cat_name=$_GET['cat_name'];

			$get_cat=$pdo->prepare("select * from sub_category where sub_cat_id='$id'");
			$get_cat->setFetchMode(PDO:: FETCH_ASSOC);
			$get_cat->execute();
			$row=$get_cat->fetch();

			$cat_id=$row['cat_id'];
			$get_c=$pdo->prepare("select * from category where cat_id='$id'");
			$get_c->setFetchMode(PDO:: FETCH_ASSOC);
			$get_c->execute();
			$row_cat=$get_c->fetch();

			
			echo"<h3>Edit Sub Category</h3>
			<form id='edit_form' method='post' enctype='multipart/form-data'>
				<select name='cat_id'>
					<option value='".$row_cat['cat_id']."'>".$row_cat['cat_name']."</option>";
					 echo select_cat();
			echo "</select>
				<input type='text' name='sub_cat_name' value='".$row['sub_cat_name']."' placeholder='Enter Category Here'/>
				<center><button name='edit_sub_cat'>Edit Category</button></center>
			</form>";

			if(isset($_POST['edit_sub_cat'])){
				$cat_name=$_POST['sub_cat_name'];
				$cat_id=$_POST['cat_id'];
				$up=$pdo->prepare("update sub_category set sub_cat_name='$cat_name',cat_id='$cat_id' where sub_cat_id='$id'");
 
				if($up->execute())
				{
					echo "<script>alert('Upadted Successfully')</script>";
					echo "<script>window.open('index.php?sub_cat', '_self')</script>";
				}
				else
				{
					echo "<script>alert('Something went wrong Try Again later!')</script>";
					echo "<script>window.open('index.php', '_self')</script>";
				}
			}
		}
	}






	function add_sub_cat()
	{
		include("inc/db.php");
		if(isset($_POST['add_sub_cat']))
		{
			$cat_name=$_POST['sub_cat_name'];
			$cat_id=$_POST['cat_id'];
			$check=$pdo->prepare("select * from sub_category where sub_cat_name='$cat_name'");
			$check->setFetchMode(PDO:: FETCH_ASSOC);
			$check->execute();
			$count=$check->rowCount();

			if($count==1)
			{
				echo "<script>alert('Already Added')</script>";
				echo "<script>window.open('index.php?sub_cat', '_self')</script>";	
			}else{

				$add_cat=$pdo->prepare("insert into sub_category(sub_cat_name,cat_id)values('$cat_name','$cat_id')");
				if($add_cat->execute())
				{
					echo "<script>alert('Added Successfully')</script>";
					echo "<script>window.open('index.php?sub_cat', '_self')</script>";
				}
				else
				{
					echo "<script>alert('Something went wrong Try Again later!')</script>";
					echo "<script>window.open('index.php', '_self')</script>";
				}
			}
		}
	}

	function view_cat()
	{
		include("inc/db.php");
		$get_cat=$pdo->prepare("select * from category");
		$get_cat->setFetchMode(PDO:: FETCH_ASSOC);
		$get_cat->execute();
		$i=1;
		while ($row=$get_cat->fetch()):
			echo "<tr>
					<td>".$i++."</td>
					<td>".$row['cat_name']."</td>
					<td><a style='color: #000' title='Edit' href='index.php?cat&edit_cat=".$row['cat_id']."'><i class='far fa-edit'></i></td>
					<td><a style='color: #f00' title='Deleted' href='index.php?cat&del_cat=".$row['cat_id']."'><i class='far fa-trash-alt'></i></td>
				</tr>"; 
		endwhile;

		if(isset($_GET['del_cat']))
		{
			$id=$_GET['del_cat'];
			$del=$pdo->prepare("delete from category where cat_id='$id'");
			if($del->execute())
			{
				echo"<script>alert('Category Deleted')</script>";
				echo "<script>window.open('index.php?cat','_self')</script>";
			}
		}
	}


	function view_sub_cat()
	{
		include("inc/db.php");
		$get_cat=$pdo->prepare("select * from sub_category");
		$get_cat->setFetchMode(PDO:: FETCH_ASSOC);
		$get_cat->execute();
		$i=1;
		while ($row=$get_cat->fetch()):
			$id=$row['cat_id'];
			$get_c=$pdo->prepare("select * from category where cat_id='$id'");
			$get_c->setFetchMode(PDO:: FETCH_ASSOC);
			$get_c->execute();
			$row_cat=$get_c->fetch();
				echo "<tr>
					<td>".$i++."</td>		
					<td>".$row['sub_cat_name']."</td>
					<td>".$row_cat['cat_name']."</td>
					<td><a style='color: #000' title='Edit' href='index.php?sub_cat&edit_sub_cat=".$row['sub_cat_id']."'><i class='far fa-edit'></i></td>
					<td><a style='color: #f00' title='Delete' href='index.php?sub_cat&del_sub_cat=".$row['sub_cat_id']."'><i class='far fa-trash-alt'></i></td>
				</tr>"; 
			
		endwhile;
		if(isset($_GET['del_sub_cat']))
		{
			$id=$_GET['del_sub_cat'];
			$del=$pdo->prepare("delete from sub_category where sub_cat_id='$id'");
			if($del->execute())
			{
				echo"<script>alert('Sub Category Deleted')</script>";
				echo "<script>window.open('index.php?sub_cat','_self')</script>";
			}
		}	
	}

	function select_cat(){
		include("inc/db.php");
		$get_cat=$pdo->prepare("select * from category");
		$get_cat->setFetchMode(PDO:: FETCH_ASSOC);
		$get_cat->execute();
		while ($row=$get_cat->fetch()):
			echo "<option value='".$row['cat_id']."'>".$row['cat_name']."</option>";

		endwhile;
	}

	function add_term()
	{
		include("inc/db.php");
		if(isset($_POST['add_term']))
		{
			$cat_name=$_POST['term'];
			$cat_id=$_POST['for_whom'];
			$check=$pdo->prepare("select * from term where term='$cat_name'");
			$check->setFetchMode(PDO:: FETCH_ASSOC);
			$check->execute();
			$count=$check->rowCount();

			if($count==1)
			{
				echo "<script>alert('Already Added')</script>";
				echo "<script>window.open('index.php?terms', '_self')</script>";	
			}else{

				$add_cat=$pdo->prepare("insert into term(term,for_whom)values('$cat_name','$cat_id')");
				if($add_cat->execute())
				{
					echo "<script>alert('Added Successfully')</script>";
					echo "<script>window.open('index.php?terms', '_self')</script>";
				}
				else
				{
					echo "<script>alert('Something went wrong Try Again later!')</script>";
					echo "<script>window.open('index.php?terms', '_self')</script>";
				}
			}
		}
	}


	function view_term()
	{
		include("inc/db.php");
			
			$get_c=$pdo->prepare("select * from term");
			$get_c->setFetchMode(PDO:: FETCH_ASSOC); 	
			$get_c->execute();
			$i=1;
			while($row=$get_c->fetch()):
				echo "<tr>
					<td>".$i++."</td>		
					<td>".$row['term']."</td>
					<td>".$row['for_whom']."</td>
					<td><a style='color: #000' title='Edit' href='index.php?terms&edit_term=".$row['t_id']."'><i class='far fa-edit'></i></td>
					<td><a style='color: #f00' title='Delete' href='index.php?terms&del_term=".$row['t_id']."'><i class='far fa-trash-alt'></i></td>
				</tr>"; 
			endwhile;
		if(isset($_GET['del_sub_cat']))
		{
			$id=$_GET['del_sub_cat'];
			$del=$pdo->prepare("delete from sub_category where sub_cat_id='$id'");
			if($del->execute())
			{
				echo"<script>alert('Sub Category Deleted')</script>";
				echo "<script>window.open('index.php?sub_cat','_self')</script>";
			}
		}	
	}

	function edit_term()
	{
		include("inc/db.php");
			
		if(isset($_GET['edit_term']))
		{

			$id=$_GET['edit_term'];
//			$cat_name=$_GET['cat_name'];

			$get_cat=$pdo->prepare("select * from term where t_id='$id'");
			$get_cat->setFetchMode(PDO:: FETCH_ASSOC);
			$get_cat->execute();
			$row=$get_cat->fetch();
			
			echo"<h3>Edit T & C</h3>
			<form id='edit_form' method='post' enctype='multipart/form-data'>
				<select name='for_whom'>
					<option value='".$row['for_whom']."'>".$row['for_whom']."</option>
					<option value='student'>Student</option>
					<option value='teacher'>Teacher</option>";
					 echo select_cat();
			echo "</select>
				<input type='text' name='term' value='".$row['term']."' placeholder='Enter Category Here'/>
				<center><button name='edit_t'>Edit T & C</button></center>
			</form>";

			if(isset($_POST['edit_t'])){
				$cat_name=$_POST['term'];
				$cat_id=$_POST['for_whom'];
				$up=$pdo->prepare("update term set term='$cat_name',for_whom='$cat_id' where t_id='$id'");
 
				if($up->execute())
				{ 
					echo "<script>alert('Terms Upadted Successfully')</script>";
					echo "<script>window.open('index.php?terms', '_self')</script>";
				}
				else
				{
					echo "<script>alert('Something went wrong Try Again later!')</script>";
					echo "<script>window.open('index.php', '_self')</script>";
				}
			}
		}
	}


	


?>