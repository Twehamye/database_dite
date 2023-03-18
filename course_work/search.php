<?php
include 'db_conn.php';
include 'header.php';

$mysqli = new mysqli($sname, $uname, $password, $db_name); 

// Checking for connections
if ($mysqli->connect_error) {
    die('Connect Error (' .
    $mysqli->connect_errno . ') '.
    $mysqli->connect_error);
}
 
$valueToSearch = $_POST['valueToSearch'];

// SQL query to select data from database
$sql = " SELECT * FROM staff WHERE user_name like '%$valueToSearch%'";
$result = $mysqli->query($sql);
$mysqli->close();
?>
<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <title>Search Results</title>
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
            border: 1px solid black;
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
        <h1>Search Results</h1>
        <!-- TABLE CONSTRUCTION -->
        <table>
            <tr>
                <th>Staff ID</th>
                <th>User Name</th>
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