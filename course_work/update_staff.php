<?php 
include 'db_conn.php';
//include 'header.php';

?>
<html>
<head>
<title></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
	<center>
		<h1>Search Staff Data by Id into form and Update it</h1><br>

		<form  method="POST" action="">
			<input type="text" name="staff_id" placeholder="Enter Borrower Id for Search">
			<input type="submit" name="search" value="Search Record">
		</form>

		<?php 
			$db = mysqli_select_db($conn, 'course_work');
			if(isset($_POST['search'])){

				$staff_id =$_POST['staff_id'];

				$query = "SELECT * FROM staff WHERE staff_id ='$staff_id' ";
				$query_run = mysqli_query($conn, $query);

				while($row = mysqli_fetch_array($query_run)){

					?>
				
					<form action="" method="POST">
						<input type="hidden" name="staff_id" value="<?php echo $row['staff_id'] ?> "><br><br>
						<input type="text" name="user_name" value="<?php echo $row['user_name'] ?> "><br><br>
						<input type="text" name="email" value="<?php echo $row['email'] ?> "><br><br>
						<input type="password" name="password" value="<?php echo $row['password'] ?> "><br><br>

						<input type="submit" name="update" value="Update Data">
						<a class="home" href="index.php">Back Home</a>
						
					</form>

	</center>


				<?php 
			}
		}

	?>
</body>
</html> 

<?php
	if(isset($_POST['update'])){

		$user_name = $_POST['user_name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		
		$password1 = md5($password);
		$query = "UPDATE `staff` SET user_name ='$_POST[user_name]',email ='$_POST[email]',password ='$password1' WHERE staff_id = '$_POST[staff_id]' ";

		$query_run = mysqli_query($conn, $query);

		if($query_run){

			echo '<script> alert("Record Updated Successfully")</script> ';
		}

		else{

			echo '<script> alert("Record Not Updated ")</script> ';
		}
	}

?>	