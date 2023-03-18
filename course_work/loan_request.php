<?php
//$APPLICATION_NO = $_POST['APPLICATION_NO'];
$borrower_id = $_POST['borrower_id'];
$loan_type = $_POST['loan_type'];
$loan_period = $_POST['loan_period'];
$loan_amount_requested = $_POST['loan_amount_requested'];
$security_name = $_POST['security_name'];
$security_value = $_POST['security_value'];
$source_of_income = $_POST['source_of_income'];

// open connection to a local server
$servername ="localhost";
$username="root";
$password="";
//$dbname="dite";

$connect = mysqli_connect($servername,$username,$password);
if(!$connect){
	echo "unable to connect ".mysqli_connect_error();
}
else
	//echo "connection successful <br><br>";

// select the dite database
$dbselect=mysqli_select_db($connect,"course_work");
if(!$dbselect){
	echo "unable to select database ".mysqli_error();
}
else
	//echo "database selected successfully <br><br>";

// Post data to the staff table

$query="INSERT INTO loan_request(borrower_id, loan_type,loan_period,loan_amount_requested,security_name,security_value,source_of_income) VALUES('$borrower_id','$loan_type','$loan_period','$loan_amount_requested','$security_name','$security_value','$source_of_income')";

$results =mysqli_query($connect,$query);
if(!$results){
	echo "unable post data  ".mysqli_error();
}
else
	header("Location: home.php");
    exit();

mysqli_close($conn);

?>
