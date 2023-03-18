<?php 
include 'includes/header_LO.php' ;
include 'db_conn.php';

$query = "SELECT * FROM loan_request";
$query2 ="SELECT * FROM staff";

$result1 =mysqli_query($conn, $query);
$result2 = mysqli_query($conn, $query2);

?>

<!DOCTYPE html>
<html> 
<head>
<title> LOAN FORM </title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<br>
	<h2> Enter Loan Application Information Here</h2>
	<h2> Enter Loan Information Here</h2>
	<form action="" method="POST">
		Loan Number: <input type="text" name="loan_id">
		Borrower ID : <select name="borrower_id" class="form-control">
							<?php while($row1 = mysqli_fetch_array($result1)):;?>
							<!--<option value="">---select customer---</option>-->
							<option ><?php echo $row1[1];?></option>
							<?php endwhile; ?>
						</select>
		Staff ID: <select name="staff_id" class="form-control">
							<?php while($row1 = mysqli_fetch_array($result2)):;?>
							<!--<option value="">---select customer---</option>-->
							<option ><?php echo $row1[0];?></option>
							<?php endwhile; ?>
						</select>
		Amount_Approved: <input type="decimal" name="amount_disbursed">
		Interest : <input type="decimal" name="interest">
		Disbursment Date: <input type="date" name="disbursment_date">
		Loan Payment Date: <input type="date" name="pay_date">
		Loan Status: <input type="text" name="loan_status"><br>

	<input type="submit" name="submit" value="Submit">
	<a class="home" href="index.php">Back Home</a>
	</form>

</body>

</html>


<?php

if(isset($_POST['submit'])){
	$loan_id = $_POST['loan_id'];
	$borrower_id = $_POST['borrower_id'];
	$staff_id = $_POST['staff_id'];
	$amount_disbursed = $_POST['amount_disbursed'];
	$interest = $_POST['interest'];
	$disbursment_date = $_POST['disbursment_date'];
	$pay_date = $_POST['pay_date'];
	$loan_status = $_POST['loan_status'];
	

	if(!$conn){
		echo "unable to connect ".mysqli_connect_error();
	}
	else
		//echo "connection successful <br><br>";


	// select the dite database
	$dbselect=mysqli_select_db($conn,'course_work');
	if(!$dbselect){
		echo "unable to select database ".mysqli_error();
	}
	else
		//echo "database selected successfully <br><br>";

	// Post data to the staff table

	$query="INSERT INTO loan(loan_id,borrower_id,staff_id,amount_disbursed,interest,disbursment_date,pay_date,loan_status) VALUES('$loan_id','$borrower_id','$staff_id','$amount_disbursed','$interest','$disbursment_date','$pay_date','$loan_status')";

	$results =mysqli_query($conn,$query);
	if(!$results){
		echo "unable post data to the staff table ".mysqli_error();
	}
	else
		header("Location: home.php");
	    exit();
	mysqli_close($conn);

}

?>