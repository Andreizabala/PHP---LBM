
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="book-container">
    <form class="form-inline my-2 my-lg-0" id="book-srch">
        <input class="form book-srch" type="search" placeholder="Search" aria-label="Search" name="search" required autocomplete="off">
        <button class="btn btn-danger" type="submit">Search</button>
      </form>
    </div>



<?php
include("server.php");
$search = $_REQUEST["search"];

$query = "SELECT * from info where  no like'%$search%' or category like '%$search%' or title like '%$search%' or year like '%$search%' or author like  '%$search%' order by title";

$result = mysqli_query($db,$query);
if(mysqli_num_rows($result)>0){
?>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">PHOTO</th>
      <th scope="col">ISBN</th>
      <th scope="col">CATEGORY</th>
      <th scope="col">TITLE</th>
      <th scope="col">YEAR</th>
      <th scope="col">AUTHOR</th>
      
    </tr>
  </thead>
  <tbody>
   
<?php while($row = mysqli_fetch_assoc($result))

{

?>

    <tr>
 
      <th class="book" scope="row"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row["name"]).'" height="50" width="50"';?></th>
      <td><?php echo strtolower($row["no"]);?> </td>
      <td><?php echo strtolower($row["category"]);?> </td>
      <td><?php echo $row["title"];?> </td>
      <td><?php echo strtolower($row["year"]);?> </td>
      <td><?php echo strtolower($row["author"]);?> </td>
    </tr>
<?php
}


}
else
echo '<div style="color:red; text-align:center;">NO BOOK EXIST</div>';
echo '<a href="index.php"><div style="color:red;  text-align:center;">SEARCH AGAIN</div>';
?>

  </tbody>
</table>
</div>
    


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>