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
		<h1>Search Data into form and Update it</h1><br>

		<form  method="post" action="">
			<input type="text" name="borrower_id" placeholder="Enter Borrower Id for Search">
			<input type="submit" name="search" value="Search Record">
		</form>

		<?php 
			$db = mysqli_select_db($conn, 'course_work');
			if(isset($_POST['search'])){

				$borrower_id =$_POST['borrower_id'];

				$query = "SELECT * FROM borrower WHERE borrower_id ='$borrower_id' ";
				$query_run = mysqli_query($conn, $query);

				while($row = mysqli_fetch_array($query_run)){

					?>
				
					<form action="" method="POST">
						<input type="hidden" name="borrower_id" value="<?php echo $row['borrower_id'] ?> "><br><br>
						<input type="text" name="name" value="<?php echo $row['name'] ?> "><br><br>
						<input type="text" name="nin" value="<?php echo $row['nin'] ?> "><br><br>
						<input type="text" name="telephone" value="<?php echo $row['telephone'] ?> "><br><br>
						<input type="text" name="address" value="<?php echo $row['address'] ?> "><br><br>

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

		$name = $_POST['name'];
		$nin = $_POST['nin'];
		$telephone = $_POST['telephone'];
		$address = $_POST['address'];
		

		$query = "UPDATE `borrower` SET name ='$_POST[name]',nin ='$_POST[nin]',telephone ='$_POST[telephone]',address ='$_POST[address]' WHERE borrower_id = '$_POST[borrower_id]' ";

		$query_run = mysqli_query($conn, $query);

		if($query_run){

			echo '<script> alert("Record Updated Successfully")</script> ';
		}

		else{

			echo '<script> alert("Record Not Updated ")</script> ';
		}
	}

?>	