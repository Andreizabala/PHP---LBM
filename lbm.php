<?php
	//session_start();
$db = mysqli_connect("localhost","root","","lbm");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

	$isbn= "";
	$category = "";
	$title = "";
	$year = "";
	$author = "";
	$trn_date="";
	$id=0;
	$edit=false;
	
	
	if (isset($_POST['save'])) {

		$isbn = test_input($_POST['isbn']);
		$category = test_input($_POST['category']);
		$title =test_input($_POST['title']);
		$year = test_input($_POST['year']);
		$author = test_input($_POST['author']);
		$trn_date = date("Y-m-d H:i:s");
		
		$query = "INSERT INTO itech (isbn,category,title,year, author,trn_date) VALUES ('$isbn','$category','$title','$year','$author',$trn_date)" ;
		mysqli_query($db, $query);
	
		header("location: admin.php"); //redirect to admin page after inserting

}
function test_input($data) 
		{
  		$data = trim($data);
  		$data = stripslashes($data);
  		$data = htmlspecialchars($data);
  		return $data;
		}

		
if (isset($_POST['update'])) {

$ISBN = test_input($_POST['ISBN']);
		$CATEGORY = test_input($_POST['CATEGORY']);
		$CATEGORY =test_input($_POST['TITLE']);
		$YEAR = test_input($_POST['YEAR']);
		$AUTHOR = test_input($_POST["AUTHOR"]);
		$trn_date = date("Y-m-d H:i:s");
$id = strtoupper(test_input($_POST['id']));
		
$query = "UPDATE BOOKS SET ISBN='$Isbn',CATEGORY='$Category', TITLE='$Title', YEAR='$Year', AUTHOR='$Author'WHERE id=$id ";

		mysqli_query($db, $query);
		
$result=mysqli_query($db, "SELECT * FROM info order by id desc");
		header("location: admin.php"); //redirect to admin page after inserting

}


if (isset($_GET['del'])) {
	$id = $_GET['del'];
mysqli_query($db, "DELETE FROM info WHERE id=$id");
	
header("location: admin.php"); 
	}
	

$result=mysqli_query($db, "SELECT * FROM info order by id desc");

?>
