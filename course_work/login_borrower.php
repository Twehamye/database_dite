<?php
session_start();
if(isset($_POST['login-borrower'])){
    include 'db_conn.php';
    $borrower_id = $_POST["borrower_id"];
    $telephone = $_POST['telephone']; 
    
    
    $sql = "Select * from borrower where borrower_id='$borrower_id'";

    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num >0){
        //echo 'record found<br>';
       
        $row=mysqli_fetch_assoc($result);
        

        if($row['borrower_id'] === $borrower_id && $telephone === $row['telephone']  ){ 
            
            
            $_SESSION['borrower_id'] = $row['borrower_id'];
            //header("Location: home.php");
            //exit();
            //echo 'You are In';
            header("Location: home_borrower.php");
            exit();
            //header("location: home.php");
            //exit();
        } 
        else{
            header("location: index_borrower.php?error=Invalid Credentials");
            exit();
        }
        
        
    } 
    else{
        $showError = "Invalid Credentials";
    }
}
else{
    header("location: index.php?error=Invalidpath");
    exit();

}
    
?>