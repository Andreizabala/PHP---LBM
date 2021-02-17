<?php
	//session_start();
	// initialize variables

	$no = "";
	$category = "";
	$title = "";
	$year = "";
	$author = "";

	$id=0;
	$edit=false;
	
	$db = mysqli_connect('localhost', 'root', '', 'crud');
	// if/when save button is clicked
	
	if (isset($_POST['save'])) {
		//we put strtoupper to convert string to uppercase
		$no=stripcslashes($db,$no);
		$no = strtoupper(mysql_real_escape_string($_POST['no']));
		$category=stripcslashes($db,$category);
		$category = strtoupper(mysql_real_escape_string($_POST['category']));
		$title=stripcslashes($db,$title);
		$title = strtoupper (mysql_real_escape_string($_POST['title']));
		$year=stripcslashes($db,$year);
		$year = strtoupper (mysql_real_escape_string($_POST['year']));
		$author=stripslashes($db,$author);
		$author = strtoupper(mysql_real_escape_string($_POST['author']));
      	$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  
		$query = "INSERT INTO info (no,category, title, year, author,name)
 				VALUES ('$no','$category','$title','$year','$author','$file')";

		mysqli_query($db, $query);
		header("location: admin.php"); //redirect to admin page after inserting

}

//update the row//
	if (isset($_POST['update'])) {
				//we put strtoupper to convert string to uppercase
		$no=stripcslashes($db,$no);
		$no = strtoupper(mysql_real_escape_string($_POST['no']));
		$category=stripcslashes($db,$category);
		$category = strtoupper(mysql_real_escape_string($_POST['category']));
		$title=stripcslashes($db,$title);
		$title = strtoupper (mysql_real_escape_string($_POST['title']));
		$year=stripcslashes($db,$year);
		$year = strtoupper (mysql_real_escape_string($_POST['year']));
		$author=stripslashes($db,$author);
		$author = strtoupper(mysql_real_escape_string($_POST['author']));
		$id = ($_POST['id']);
				
		$query = "UPDATE info SET no='$no',category='$category', title='$title', year='$year', author='$author'
		WHERE id=$id ";

		mysqli_query($db, $query);
				
		$result=mysqli_query($db, "SELECT * FROM info order by id desc");
		header("location: admin.php"); //redirect to admin page after inserting

}


		//delete the row //
		if (isset($_GET['del'])) {
		$id = $_GET['del'];
		mysqli_query($db, "DELETE FROM  info WHERE id=$id");
			
		header("location: admin.php"); //redirect to admin page after inserting
			}

			// retrieve record
		$result=mysqli_query($db, "SELECT * FROM info order by id desc");









?>




