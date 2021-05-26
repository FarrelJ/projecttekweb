<DOCTYPE HTML>
<html>
    <head>
   
    <?php
    session_start();
    include "library.php";
    if (isset($_POST['create'])){
        require_once "connect.php";
        echo '<script>alert("succesfully create account")</script>';
        $username=$_POST['username'];
	    $password=$_POST['password'];
	    $_SESSION['name']=$username;
	    $sql="insert into user values(null,'$username','$password')";
        $query=mysqli_query($con,$sql);
        header("location:login.php");	
    }
    if (isset($_POST['cancel'])){	
        header("location:login.php");	
    }
    ?>
    <style>
         body, html {
             height: 100%;
        }
        .cont{
           
            background-image:url('gallery/venty.jpg');
            height: 100%;
            width:100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            
        }
        .postlogin{
           padding-top:250px;
           
         }
         #signupbutton{
             margin-left:150px;
         }
 
    </style>
    </head>

    <body>
        <div class="cont" >
             <div class="formlogin" style="width:800px;border-radius: 55px;">
                <form method="post" action="signup.php" class="postlogin">	
                    <div class="shadow-lg bg-light p-5 rounded-lg m-3 rounded" >
                        <h3>Sign Up here</h3>
                            <div class="mb-3 row">
				                 <label for="Username" class="col-sm-4 col-form-label">Username</label>
				                <div class="col-sm-6">
					             <input type="text" class="form-control" name="username" placeholder="Username">
				                </div>
			                </div>
			                <div class="mb-3 row">
				            <label for="inputPassword" class="col-sm-4 col-form-label">Password</label>
				                    <div class="col-sm-6">
					                    <input type="password" class="form-control" name="password" placeholder="Password">
				                     </div>
			                 </div>
			                 <div class="mb-3 row">
				                    <div class="col-sm-6 offset-md-4">
				                        <button type="submit" class="btn btn-info" name="create" id="signinbutton">Create</button>
				                        <button type="submit" class="btn btn-info" name="cancelsignup" id="signupbutton">Cancel</button>
				                    </div>
			                 </div>
                     </div>
                </form>
                </div>
        </div>
    <body>


</html>