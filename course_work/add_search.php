
<?php

include 'header.php'; 
include 'db_conn.php';
//include 'login3.php'
//if (isset($_SESSION['staff_id']) && isset($_SESSION['user_name']) ) {

?>


<form action="search.php" method="post" >

<input type="text" name="valueToSearch" placeholder="Search staff by Username.."></br>
<input type="submit" name="search" value="Search Record..">
</form>