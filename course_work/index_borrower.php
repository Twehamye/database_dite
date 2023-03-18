
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BORROWER LOGIN</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <form action="login_borrower.php" method="post">
    <h2>BORROWER LOGIN</h2>
    <?php if (isset($_GET['error'])) { ?>
      <p class="error"><?php echo $_GET['error'];?></p>
    <?php } ?>
    <label>BORROWER ID</label>
    <input type="text" name="borrower_id" placeholder="ID" required><br>
    <label>Telephone</label>
    <input type="text" name="telephone" placeholder="Telephone" required><br>
    
    <input type="submit" name="login-borrower" value="Login">
	<a class="home" href="index.php">Back Home</a>
    
  </form>

 
</body>
</html>


