<?php
session_start();
function function_alert($message) {
    // Display the alert box 
    echo "<script>alert('$message');</script>";
}
if (isset($_POST['signin'])){
    require_once "connect.php";
    $name = $_POST['username'];
    $pass = $_POST['password'];
    $query=mysqli_query($con,"select * from user where username_user='$name' and password_user='$pass'");
    
    $count=mysqli_num_rows($query);
    if($count==1){
        $_SESSION['currentusername']=$name;
        $row = mysqli_fetch_array($query);
        $_SESSION['idcurrentuser']=$row['id_user'];
        header("location:task_scriptmanager.php");
    }else{
        echo '<script>alert("username / password salah")</script>';
        $_SESSION["currentusername"]=null;
        header("location:login.php?error=1");
    }
}
else if (isset($_POST['signup'])){
    
	//$_SESSION['new']="new";
	header("Location: signup.php");
}
?>