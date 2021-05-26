<DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
	<?php
        session_start();
		include "library.php";
        if (isset($_POST['submitgroup'])){
            echo '<script>alert("succesfully create account")</script>';
            require_once "connect.php";
            $groupname=$_POST['groupname'];
	        $deskripsi=$_POST['deskripsi'];
            $id=$_SESSION['idcurrentuser'];
            $id_gambar=$_POST['IDGambarSelected'];
            //echo $_SESSION['idcurrentuser'];
            $sql="INSERT INTO `group` VALUES (null,'$id','$groupname','$deskripsi','$id_gambar')";
            $query=mysqli_query($con,$sql);
            //echo $sql;
            echo mysqli_error($con);
            //printf(mysqli_error($con));
            header("location:creategroup.php");	
        }
        if (isset($_POST['cancelgroup'])){
            header("location:owngroup.php");	
        }
	?>
      <style>
         body, html {
             height: 100%;
        }
        .cont{
           
            background-image:url('gallery/logintemplate.png');
            height: 900px;
            width:100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            
        }
        .postlogin{
           padding-top:30px;
           width:650px;
         }
         #signupbutton{
             margin-left:25px;
         }
         #imggroup{
             height:350px;
             width:100%;
         }
         #selectedimage img{
             height:350px;
             width:100%;
         }
         .modal-lg {
              max-width: 80% !important;
        }
    </style>
    <script>
        $(document).ready(function(){
            $("#btngantiimage").click(function(){
                //$('#confirmModal').modal('toggle');
                //alert();
            });
            $("#btngantitema").click(function(){
                //$('#confirmModal').modal('toggle');
                //alert();
                $('#imggroup').remove();
                $('#confirmModal').modal('toggle');
                //$('#selectedimage').append('<img src="gallery/study_theme.jpg" name="image2opt">');
            });
            $("#confirmModal").on('click', '.btnimage',function(){
                var id_gambar = $(this).attr('id');
                //alert(id);
                var urlimage = $(this).children(":first").attr('src');
                //alert(urlimage);
                $('#selectedimage').html('<img src = ' + urlimage + '>');
                //$('#selectedimage').html('<img src = "' + varurlimage '" id =  "' + varid+ '">');
                $('#IDGambarSelected').val(id_gambar);
			});
            /*$("#confirmModal").on('click', '#1',function(){
                $('#selectedimage').html('<img src="gallery/kids_theme.jpg" name="image1opt" id="image1opt">');
			});
            $("#confirmModal").on('click', '#2',function(){
                $('#selectedimage').html('<img src="gallery/study_theme.jpg" name="image2opt" id="image2opt">');
			});
            $("#confirmModal").on('click', '#5',function(){
                $('#selectedimage').html('<img src="gallery/music_theme.jpg" name="image3opt" id="image3opt">');
			});*/
        });
    </script>
</head>
<body>
    <?php
		include "navbar.php";
	?>
    
    <div class="cont">
    <div class="formlogin" style="width:600px;border-radius: 55px;">
                <form method="post" action="creategroup.php" class="postlogin">	
                    <div class="shadow-lg bg-light p-5 rounded-lg m-3 rounded" >
                        <h3>Please enter your group information here</h3>
                            <div class="mb-3 row">
				                 <label for="Username" class="col-sm-4 col-form-label">Nama Group</label>
				                <div class="col-sm-6">
					             <input type="text" class="form-control" name="groupname" placeholder="Nama group">
				                </div>
			                </div>
			                <div class="mb-3 row">
				            <label for="inputPassword" class="col-sm-4 col-form-label" maxlength="10">Deskripsi</label>
				                    <div class="col-sm-6">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="deskripsi" placeholder="Deskripsi"rows="3"></textarea>
				                     </div>
			                 </div>
                             <div class="mb-3 row" >
				                    <label for="inputPassword" class="col-sm-4 col-form-label" id="pilihtema">Pilih tema grup</label>
                                    <input type="hidden" readonly class="form-control-plaintext" id="IDGambarSelected" name="IDGambarSelected" value="1">
                                    <div id="selectedimage"><img src="gallery/kids_theme.jpg" name="image1" id="imggroup"></div>
                                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#confirmModal"  name="btngantiimage" id="btngantiimage">Ganti Tema</button>
                                    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Change Background</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <?php
                                                         //include "themeselection.php"; 
                                                    ?>
                                                    Pilih Tema:<br>
                                                    <button type="button" class="btn btn-outline-primary btnimage" id="1"><img src="gallery/kids_theme.jpg" name="image1opt"></button>
                                                    <button type="button" class="btn btn-outline-primary btnimage" id="2"><img src="gallery/study_theme.jpg" name="image2opt"></button>
                                                    <button type="button" class="btn btn-outline-primary btnimage" id="5"><img src="gallery/music_theme.jpg" name="image3opt"></button>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="button" class="btn btn-primary" id="btngantitema">Ganti Tema</button>
                                                </div>
                                            </div>
                                        </div>
		                            </div>
                             </div>
			                 <div class="mb-3 row">
				                    <div class="col-sm-6 offset-md-4">
				                        <button type="submit" class="btn btn-info" name="submitgroup" id="signinbutton">Create group</button>
				                        <button type="submit" class="btn btn-info" name="cancelgroup" id="signupbutton">Cancel</button>
				                    </div>
			                 </div>
                     </div>
                </form>
        </div>
        </div>
        
</body>
</html>