<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
	<?php
  include "library.php";
  session_start();
  ?>
  <style>
   .card{
     margin-:100px;
     
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
  require_once "connect.php";

  if(!isset($_GET['id'])){
    header("location:group.php");
  }
  $query=mysqli_query($con,"SELECT `group`.*,`gambartable`.`url_gambar` FROM `group` LEFT JOIN `gambartable` ON `group`.`id_gambar` = `gambartable`.`id_gambar` WHERE `group`.`id_group` = ".$_GET['id']);

  $count=mysqli_num_rows($query);
  if($count==1){
    $group = mysqli_fetch_array($query);
  }else{
    header("location:group.php");
  }
  echo '<div class="card" style="width: 100%; background-image:url(';
  echo "'gallery/".$group["url_gambar"]."'";
  echo ');" >
    <div class="bodycard">
      <h1>'.$group["name_group"].'</h1>
      <p>'.$group["desc_group"].'</p>
      <button type="button" class="btn btn-primary" id="unfollow">Unfollow
       </button>  

      </div>
    </div>';
  ?>
  
  </body>
  </html>