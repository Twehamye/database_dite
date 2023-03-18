<?php
if(isset($_POST['login-submit'])){
    include 'db_conn.php';
    $staff_id = $_POST["staff_id"];
    $password = $_POST['password']; 
    
    //echo $password;
    // $sql = "Select * from users where username='$username' AND password='$password'";
    $sql = "Select * from staff where staff_id='$staff_id'";

    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num >0){
        echo 'record found<br>';
       
        $row=mysqli_fetch_assoc($result);
        //print_r($row['PASSWORD']);
        
        $hash = md5($password);

        //print_r($hash);

        if($hash === $row['password'] && $row['staff_id'] === $staff_id){ 
            //$login = true;
            //session_start();
            //$_SESSION['loggedin'] = true;
            $page=$row['role'].".php";
            $_SESSION['staff_id'] = $row['staff_id'];
            //$_SESSION['user_name'] = $row['user_name'];

            //echo 'You are In';
            header("Location: $page");
            exit();
            //header("location: home.php");
            //exit();
        } 
        else{
            //echo '<script> alert("Invalid Credentials")</script> ';
            header("Location: index.php?error=Invalid Credentials");
            exit();
        }
        
        
    } 
    else{
        //$showError = "Invalid Credentials";
        header("Location: index.php?error=Invalid Credentials");
            exit();
    }
}
else{
    header("location: index.php?error=Invalidpath");
    exit();

}
    
?>



