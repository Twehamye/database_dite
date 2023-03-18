<?php 
include 'includes/header_LO.php' ;
include 'db_conn.php';


$query = "SELECT * FROM staff";
$query2 ="SELECT * FROM borrower";

$result1 =mysqli_query($conn, $query);
$result2 = mysqli_query($conn, $query2);

?>
<!DOCTYPE html>
<html> 
<head>
<title>LOAN APPLICATION FORM </title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<h2> Enter Loan Application Information Here</h2>
<form action="" method="POST">

Borrower ID: <select name="borrower_id" class="form-control">
					<?php while($row1 = mysqli_fetch_array($result2)):;?>
					<!--<option value="">---select customer---</option>-->
					<option ><?php echo $row1[0];?></option>
					<?php endwhile; ?>
				</select>

Loan Type: <select name="loan_type" class="form-control">
				<option value="0">--select Loan type--</option>
				<option value="Quick loan">Quick loan</option>
				<option value="School fees Loan">School fees Loan</option>
				<option value="Business loan">Business loan</option>
			 </select>
Loan Period (months): <input type="int" name="loan_period" required>
Loan Amount Requested: <input type="decimal" name="loan_amount_requested" required>
Security Name: <input type="text" name="security_name" required>
Value of Security: <input type="decimal" name="security_value" required>
Source of Funds: <select name="source_of_income" class="form-control">
					<option value="">--select Source of fund--</option>
					<option value="Business">Business</option>
					<option value="Salary">Salary</option>
				  </select><br>

<input type="submit" name="submit" value="Submit">
<a class="home" href="add_borrower.php">Register new Borrower</a>

</form>

	
</body>

</html>

<?php
//$APPLICATION_NO = $_POST['APPLICATION_NO'];
$borrower_id = $_POST['borrower_id'];
$loan_type = $_POST['loan_type'];
$loan_period = $_POST['loan_period'];
$loan_amount_requested = $_POST['loan_amount_requested'];
$security_name = $_POST['security_name'];
$security_value = $_POST['security_value'];
$source_of_income = $_POST['source_of_income'];




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



$query="INSERT INTO loan_request(borrower_id, loan_type,loan_period,loan_amount_requested,security_name,security_value,source_of_income) VALUES('$borrower_id','$loan_type','$loan_period','$loan_amount_requested','$security_name','$security_value','$source_of_income')";

$results =mysqli_query($conn,$query);
if(!$results){
	echo "unable post data  ".mysqli_error();
}
else
	header("Location: home.php");
    exit();

mysqli_close($conn);

?>