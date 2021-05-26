<DOCTYPE HTML>
<html>
    <head>
   
    <?php
    include "library.php";
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
                <form method="post" action="ceklogin.php" class="postlogin">	
                    <div class="shadow-lg bg-light p-5 rounded-lg m-3 rounded" >
                        <h3>Welcome to Venty</h3>
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
				                        <button type="submit" class="btn btn-info" name="signin" id="signinbutton">Sign in</button>
				                        <button type="submit" class="btn btn-info" name="signup" id="signupbutton">Sign up</button>
				                    </div>
			                 </div>
                     </div>
                </form>
                </div>
        </div>
    <body>


</html>