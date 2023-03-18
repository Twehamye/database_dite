<?php
include 'db_conn.php';
include 'includes/header_Admin.php';

$mysqli = new mysqli($sname, $uname,
                $password, $db_name);
 
// Checking for connections
if ($mysqli->connect_error) {
    die('Connect Error (' .
    $mysqli->connect_errno . ') '.
    $mysqli->connect_error);
}
 


// SQL query to select data from database
$sql = " SELECT * FROM staff ";
$result = $mysqli->query($sql);
$mysqli->close();
?>
<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <title>All Staff List</title>
    <!-- CSS FOR STYLING THE PAGE -->
    <link rel="stylesheet" type="text/css" href="assets/another_style.php">
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
        <h1>All Staff List</h1>
        <!-- TABLE CONSTRUCTION -->
        <table>
            <tr>
                <th>Staff ID</th>
                <th>User Name</th>
                <th>Role</th>
                <th>Email</th>
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
                <td><?php echo $rows['staff_id'];?></td>
                <td><?php echo $rows['user_name'];?></td>
                <td><?php echo $rows['role'];?></td>
                <td><?php echo $rows['email'];?></td>
                <!--<td><?php// echo $rows['articles'];?></td>-->
            </tr>
            <?php
                }
            ?>
        </table>
    </section>
</body>
 
</html>