
<?php  

include 'includes/header_Admin.php';
include 'db_conn.php';
 
?>

<!DOCTYPE html>
<html> 
<head>
<title> STAFF FORM </title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<h2> Enter Staff Information Here</h2>
<form action="" method="POST">
Staff ID: <input type="text" name="staff_id" required><br>
Username: <input type="text" name="user_name" required><br>			
Email: <input type="email" name="email" required><br>
Password: <input type="password" name="password" required><br>
Repeat Password: <input type="password" name="passwordrepeat" required><br><br>

<input type="submit" name="submit" value="submit">
</form>

<?php //location(); ?>

</body>

</html>

<?php
	if(isset($_POST['submit'])){

		$staff_id = $_POST['staff_id'];
		$user_name = $_POST['user_name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$passwordrepeat = $_POST['passwordrepeat'];


		//$connect = mysqli_connect($sname,$uname,$password);
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
		else{
			//echo "database selected successfully <br><br>";
		}

		if($_POST['password'] === $_POST['passwordrepeat']){
		// Post data to the staff table
			$hashedPwd = md5($password);
			$query="INSERT INTO staff(staff_id,user_name,email,password) VALUES('$staff_id','$user_name','$email','$hashedPwd')";

			$results =mysqli_query($conn,$query);
			if(!$results){
				echo "unable post data to the staff table ".mysqli_error();
			}
			else{
				header("Location: home.php");
	    		exit();

			mysqli_close($conn);
			}
		}
		else{

			header("Location: add_staff.php?error=passwordmismatch");
	    		exit();
		}
		
	}
	else{
		//echo 'invalidpath';
	}

?>