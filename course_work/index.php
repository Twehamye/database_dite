<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="assets/index_style.css">
</head>
<body>
   <div class="left">

      <h1>Staff Login</h1>
      <form action="login.php" method="post">
          
          <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error'];?></p>
          <?php } ?>
          <label>Staff ID</label>
          <input type="text" name="staff_id" placeholder="ID" required><br>
          <label>Password</label>
          <input type="password" name="password" placeholder="Password" required><br>
          <button type="submit" name="login-submit">Login</button>
        </form>
       
   </div>

   <div class="right">
      <nav class="container-fluid navbar navbar-expand-sm bg-light navbar-dark ">
        <div class="container-fluid">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="add_borrower.php">Register Borrower</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="index_borrower.php"> Borrower Login </a>
            </li>
           
         </ul>

         </div>
      </nav>  
      
      <img src="img/loan.png" height="100%" width="100%">
   </div>
</body>
</html>