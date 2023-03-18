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
		<h1>Search Loan request Data by Request Id into form and Update it</h1><br>

		<form  method="POST" action="">
			<input type="text" name="request_id" placeholder="Enter Request Id for Search">
			<input type="submit" name="search" value="Search Record">
		</form>

		<?php 
			$db = mysqli_select_db($conn, 'course_work');
			if(isset($_POST['search'])){

				$request_id =$_POST['request_id'];

				$query = "SELECT * FROM loan_request WHERE request_id ='$request_id' ";
				$query_run = mysqli_query($conn, $query);

				while($row = mysqli_fetch_array($query_run)){

					?>
				
					<form action="" method="POST">
						<input type="hidden" name="request_id" value="<?php echo $row['request_id'] ?> ">
						<input type="text" name="borrower_id" value="<?php echo $row['borrower_id'] ?> ">
						<input type="text" name="loan_type" value="<?php echo $row['loan_type'] ?> ">
						<input type="text" name="loan_period" value="<?php echo $row['loan_period'] ?> ">
						<input type="text" name="loan_amount_requested" value="<?php echo $row['loan_amount_requested'] ?> ">
						<input type="text" name="security_name" value="<?php echo $row['security_name'] ?> ">
						<input type="text" name="security_value" value="<?php echo $row['security_value'] ?> ">
						<input type="text" name="source_of_income" value="<?php echo $row['source_of_income'] ?> "><br>

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

		$borrower_id = $_POST['borrower_id'];
		$loan_type = $_POST['loan_type'];
		$loan_period = $_POST['loan_period'];
		$loan_amount_requested = $_POST['loan_amount_requested'];
		$security_name = $_POST['security_name'];
		$security_value = $_POST['security_value'];
		$source_of_income = $_POST['source_of_income'];
		
		
		$query = "UPDATE `loan_request` SET borrower_id ='$_POST[borrower_id]', loan_type ='$_POST[loan_type]',loan_amount_requested ='$_POST[loan_amount_requested]', security_name ='$_POST[security_name]',security_value ='$_POST[security_value]', source_of_income ='$_POST[source_of_income]' WHERE request_id = '$_POST[request_id]' ";

		$query_run = mysqli_query($conn, $query);

		if($query_run){

			echo '<script> alert("Record Updated Successfully")</script> ';
		}

		else{

			echo '<script> alert("Record Not Updated ")</script> ';
		}
	}

?>	