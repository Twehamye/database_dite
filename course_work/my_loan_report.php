<?php
include 'db_conn.php';
include 'header.php';
include 'includes/my_loans_header.php';


$mysqli = new mysqli($sname, $uname, $password, $db_name); 

if ($mysqli->connect_error) {
    die('Connect Error (' .
    $mysqli->connect_errno . ') '.
    $mysqli->connect_error);
}
// SQL query to select data from database
$var = $_SESSION['borrower_id'];
//SELECT * FROM `borrower` WHERE address='mbarara'; 
$sql = " SELECT * FROM `loan` WHERE borrower_id='$var' ";
$result = $mysqli->query($sql);
$mysqli->close();
?>
<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <title></title>
    <!-- CSS FOR STYLING THE PAGE -->
    <style>
        <table class="center"> {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }
 
        h1 {
            text-align: center;
            color: #FFFF00;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT',
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
 
        td {
            background-color: #E4F5D4;
            border: 1px solid black;
        }
 
        th,
        td {
            font-weight: bold;
            border: 2px solid red ;
            padding: 10px;
            text-align: center;
        }
 
        td {
            font-weight: lighter;
        }
    </style>
</head>
 
<body>
    <section>
        
        <!-- TABLE CONSTRUCTION -->
        <table>
            <tr>
                <th>LOAN ID</th>
                <th> BORROWER ID</th>
                <th>STAFF ID</th>
                <th> AMOUNT DISBURSED</th>
                <th>INTEREST</th>
                <th>DISBURMENT DATE</th>
                <th>PAY BACK DATE</th>
                <th>STATUS</th>

                <!--<th>GFG Articles</th> -->
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
                // LOOP TILL END OF DATA
                while($rows=$result->fetch_assoc())
                {
            ?>
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><?php echo $rows['loan_id'];?></td>
                <td><?php echo $rows['borrower_id'];?></td>    
                <td><?php echo $rows['staff_id'];?></td>
                <td><?php echo $rows['amount_disbursed'];?></td>
                <td><?php echo $rows['interest'];?></td>
                <td><?php echo $rows['disbursment_date'];?></td>
                <td><?php echo $rows['pay_date'];?></td>
                <td><?php echo $rows['loan_status'];?></td>
                <!--<td><?php// echo $rows['articles'];?></td>-->
            </tr>
            <?php
                }
            ?>
        </table>
    </section><br>

    <a href="logout.php">Logout</a>
</body>
 
</html>