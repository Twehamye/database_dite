<?php

include 'db_conn.php';


session_start();

if (isset($_SESSION['borrower_id'])){ 



?>
  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Loan Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">

  </head>
  <body>
    <nav class="container navbar navbar-expand-sm bg-info navbar-dark fixed-top">
      <div class="container-fluid">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="my_loan_report.php">My Loan Reports</a>
          </li>
          
        </ul>

       </div>
    </nav>

    <h1>Hello, <?php echo $_SESSION['borrower_id']; ?></h1><br><br>

    <h1>This is Your Loan List !! </h1><br>

  </body>
  </html> 

<?php 
}
else{
  header("Location: index_borrower.php");
  exit();
}
?>