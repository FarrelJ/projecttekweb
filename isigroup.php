<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
	<?php
		include "library.php";
	?>
<style>
   .card{
       margin-:100px;
       background-image:url('gallery/venty.jpg');
            height: 200px;
            width:100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
   }
   #unfollow{
       padding-bottom:10px;
   }
   .bodycard{
       padding-left:20px;
       padding-top:17px;
   }
</style>

</head>
<body>
    <?php
		include "navbar.php";
        
	?>
        <div class="card" style="width: 100%;" >
        <?php                     
            echo $_GET['id']; 
        ?>
            <div class="bodycard">
            <h1>Nama group</h1>
            <p>Deskirpsi grup yang super duper amat sangat panjang sekali kurang panjang panjangnya deskripsinya.</p>
            <button type="button" class="btn btn-primary" id="unfollow">Unfollow
            <img src="bootstrap/icons/sliders.svg" alt="Bootstrap" width="16" height="17"></button>
            
        

            </div>
        </div>
</body>
</html>