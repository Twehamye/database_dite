<?php 
	include 'includes/header_LO.php' ;
	include 'db_conn.php';
?>

<!DOCTYPE html>
<html> 
<head>
<title>BORROWER FORM </title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<h2> Enter Borrower Information Here</h2>
<form action="" method="POST" >
Borrower ID Number: <input type="text" name="borrower_id" required><br>
Borrower Name: <input type="text" name="name" required><br>
NIN Number: <input type="text" name="nin" required><br><br>
Telephone: <input type="text" name="telephone" required><br>
Physical Address: <input type="int" name="address" required><br><br>


<input type="submit" name="submit" value="Submit">
<a class="home" href="index.php">Back Home</a>
</form>

</body>

</html>

<?php 

if(isset($_POST['submit'])){

	$borrower_id = $_POST['borrower_id'];
	$name = $_POST['name'];
	$nin = $_POST['nin'];
	$telephone = $_POST['telephone'];
	$address = $_POST['address'];


	if(!$conn){
		echo "unable to connect ".mysqli_connect_error();
	}
	else
		//echo "connection successful <br><br>";


	// select the dite database
	$dbselect=mysqli_select_db($conn,"course_work");
	if(!$dbselect){
		echo "unable to select database ".mysqli_error();
	}
	else
		//echo "database selected successfully <br><br>";

	// Post data to the staff table

	$query="INSERT INTO borrower(borrower_id, name, nin, telephone,address) VALUES('$borrower_id','$name','$nin','$telephone','$address')";

	$results =mysqli_query($conn,$query);
	if(!$results){
		echo "unable post data  ".mysqli_error();
	}
	else
		header("location: index_borrower.php");

	mysqli_close($conn);
}

?>