<?php
session_start();



?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php
		include "library.php";
         include "connect.php";
        $id=$_SESSION['idcurrentuser'];
        $query=mysqli_query($con,"SELECT `username_user`,
        `id_user`,`password_user` FROM `user`  WHERE ``.`id_user` = ".$id);
         $count=mysqli_num_rows($query);
         if($count==1){
           $useraccount = mysqli_fetch_array($query);
         }
         //echo $useraccount["username_user"];
         if (isset($_POST['savechange'])){
            require_once "connect.php";
            $usernamenew=$_POST['username_change'];
           
            $password=$_POST['password_change'];
           
            $username_old=$_POST['username_old'];
            
            $sql=" UPDATE `user` SET password_user ='$password', username_user ='$usernamenew' WHERE username_user='$username_old'";
            $query=mysqli_query($con,$sql);
            session_destroy();
            header("location:login.php");	
           
        }
        if (isset($_POST['cancelchange'])){	
            header("location:task_mainpage.php");	
        }
	?>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box
}

body {
    font-family: 'Poppins', sans-serif;
    background-color: aliceblue
}

.wrapper {
    padding: 30px 50px;
    border: 1px solid #ddd;
    border-radius: 15px;
    margin: 10px auto;
    max-width: 600px
}

h4 {
    letter-spacing: -1px;
    font-weight: 400
}

.img {
    width: 70px;
    height: 70px;
    border-radius: 6px;
    object-fit: cover
}

#infoaccount p,
#deactivate p {
    font-size: 14px;
    color: #777;
    margin-bottom: 4px;
    text-align: justify;
}

#infoaccount b,
#infoaccount button,
#deactivate b {
    font-size: 14px
}

label {
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 500;
    color: #777;
    padding-left: 3px
}

.form-control {
    border-radius: 10px
}

input[placeholder] {
    font-weight: 500
}

.form-control:focus {
    box-shadow: none;
    border: 1.5px solid #0779e4
}

select {
    display: block;
    width: 100%;
    border: 1px solid #ddd;
    border-radius: 10px;
    height: 40px;
    padding: 5px 10px
}

select:focus {
    outline: none
}

.button {
    background-color: #fff;
    color: #0779e4
}

.button:hover {
    background-color: #0779e4;
    color: #fff
}

.btn-primary {
    background-color: #0779e4
}

.danger {
    background-color: #fff;
    color: #e20404;
    border: 1px solid #ddd
}

.danger:hover {
    background-color: #e20404;
    color: #fff
}

@media(max-width:576px) {
    .wrapper {
        padding: 25px 20px
    }

    #deactivate {
        line-height: 18px
    }
}
    </style>
</head>
<body>
<form method="post" action="accsetting.php" class="postlogin">	
<div class="wrapper bg-white mt-sm-5">
    <h4 class="pb-4 border-bottom">Account settings</h4>
    <div class="d-flex align-items-start py-3 border-bottom"> 
        <div class="pl-sm-4 pl-2" id="infoaccount">
             <b style="font-family: 'Poppins', sans-serif; font-size: 19px;">Username:<?php  echo $useraccount["username_user"];?></b>
            <p>Id:<?php  echo $useraccount["id_user"];?></p> 
        </div>
    </div>
    <div class="py-2">
           <center>Change account info here</center>
        <div class="row py-2">
            <div class="col-md-6"> 
            <label for="changename"> Old Username</label> 
            <input type="text" class="bg-light form-control" name="username_old" placeholder=" <?php  echo $useraccount["username_user"];?>"> </div>
        </div>
        <div class="row py-2">
            <div class="col-md-6"> 
            <label for="changename"> New Username</label> 
            <input type="text" class="bg-light form-control" name="username_change" placeholder="New Username"> </div>
        </div>
        <div class="row py-2">
            <div class="col-md-6"> 
            <label for="email">Password</label> 
            <input type="text" class="bg-light form-control" name="password_change" placeholder="<?php  echo $useraccount["password_user"];?>"> </div>
        </div>
       
        <div class="py-3 pb-4 border-bottom"> 
             <button type="submit" class="btn btn-primary mr-3" name="savechange">Save Changes</button> 
             <button type="submit" class="btn border button" name="cancelchange">Cancel</button> 
        </div>
        <div class="d-sm-flex align-items-center pt-3" id="deactivate">
            <div> <b>Deactivate your account</b>
                <p>Details about your company account and password</p>
            </div>
            <div class="ml-auto"> <button class="btn danger">Log Out</button> </div>
        </div>
    </div>
</div>
</form>
</body>
</html>