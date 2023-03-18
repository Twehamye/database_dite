<?php
include 'db_conn.php';
$searchErr = '';
$borrower_details='';
if(isset($_POST['save']))
{
    if(!empty($_POST['search']))
    {
        $search = $_POST['search'];
        //$stmt = $conn->prepare("select * from borrower where borrower_id like '%$search%' or name like '%$search%'");
        //$stmt->execute();
       // $borrower_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //print_r($employee_details);
         
        $sel_query= "Select * from borrower where borrower_id = '$search']";
        $result = mysqli_query($conn,$sel_query);

         if(!$borrower_details)
         {
            echo '<tr>No data found</tr>';
         }
        else{
            while($row = mysqli_fetch_assoc($result)) {

                echo '<tr>';

                echo '<td>'. $row['borrower_id'] . '</td>';
                //echo '<td>'. $row['school_ID'] . '</td>';
                echo '<td>'. $row['name'] . '</td>';
                echo '<td>'. $row['nin'] . '</td>';
                echo '<td>'. $row['telephone'] . '</td>';
                echo '<td>'. $row['address'] . '</td>';

                echo '<td width=250>';
                echo "<div class='ui mini buttons'>";
                echo '<a class="ui mini positive button" href="update_borrower.php?borrower_id='.$row['borrower_id'].'"> <i class="glyphicon glyphicon-pencil"></i>Update</a>';
                echo "<div class='or'></div>";    
                echo '<a class="ui mini red button" href="borrowe.php?borrower_id='.$row['borrower_id'].'"><i class="glyphicon glyphicon-remove"> </i>Delete</a>';
                echo "</div>";
                echo '</td>';    
               echo '</tr>';  
            }
                
        }
                     
                 
             
    }
    else
    {
        $searchErr = "Please enter the information";
    }
    
}
 
?>
<html>
<head>
<title>ajax example</title>
<link rel="stylesheet" href="bootstrap.css" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap-theme.css" crossorigin="anonymous">
<style>
.container{
    width:70%;
    height:30%;
    padding:20px;
}
</style>
</head>
 
<body>
    <div class="container">
    <h3><u>PHP MySQL search database and display results</u></h3>
    <br/><br/>
    <form class="form-horizontal" action="#" method="post">
    <div class="row">
        <div class="form-group">
            <label class="control-label col-sm-4" for="email"><b>Search Borrower Information:</b>:</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="search" placeholder="search here">
            </div>
            <div class="col-sm-2">
              <button type="submit" name="save" class="btn btn-success btn-sm">Submit</button>
            </div>
        </div>
        <div class="form-group">
            <span class="error" style="color:red;">* <?php echo $searchErr;?></span>
        </div>
         
    </div>
    </form>
    <br/><br/>
    <h3><u>Search Result</u></h3><br/>
    <div class="table-responsive">          
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Borrower Name</th>
             <th>NIN</th>
            <th>Phone No</th>
            <th>Address</th>
           
          </tr>
        </thead>
        <tbody>
                
             
         </tbody>
      </table>
    </div>
</div>
<script src="jquery-3.2.1.min.js"></script>
<script src="bootstrap.min.js"></script>
</body>
</html>