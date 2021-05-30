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

   .bodycard{
     padding-left:20px;
     padding-top:17px;
   }
 </style>
 <script>
   $(document).ready(function(){
    $('.bodycard').on('click', 'button', function(){
      var currentbutton = $(this).attr('id');
      $.ajax({url: "follow_scriptmanager.php", type : "POST", async:false, data:{
        ajaxAction : $(this).attr('id'),
        idGroup : $(this).parent().attr('id')
      }, success: function(msg){

      }});
      if(currentbutton=='unfollowBtn'){
        $(this).parent().append('<button type="button" class="btn btn-primary" id="followBtn">Follow </button>');
        $(this).remove();
      }else{
        $(this).parent().append('<button type="button" class="btn btn-danger" id="unfollowBtn">Unfollow </button>');
        $(this).remove();
      }
    })
  });
</script>
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
  <div class="bodycard" id="'.$group["id_group"].'">
  <h1>'.$group["name_group"].'|group id:'.$group["id_group"].'</h1>
  <p>'.$group["desc_group"].'</p>';
  if($group["id_admin"]!=$_SESSION['idcurrentuser']){
    $query=mysqli_query($con,"SELECT * FROM `follow` WHERE `id_group` = ".$_GET['id']." AND `id_user`=".$_SESSION['idcurrentuser']);
    $count=mysqli_num_rows($query);
    if($count>=1){
      echo '<button type="button" class="btn btn-danger" id="unfollowBtn">Unfollow
      </button>  ';
    }else{
      echo '<button type="button" class="btn btn-primary" id="followBtn">Follow
      </button>  ';
    }
  }
  echo'</div>
  </div>';
  ?>
  <div class="container">
    <table class="table table-info table-hover mt-4 mb-3" id="GroupTaskTable">
      <thead>
        <tr>
          <th scope="col">v</th>
          <th scope="col">Name</th>
          <th scope="col">Label</th>
          <th scope="col">Owner</th>
          <th scope="col">Date</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        if (session_status() === PHP_SESSION_NONE) {
          session_start();
        }
        //CHANGE THIS IMPORTANT
        $currentuserid = '1';
        require_once "connect.php";

        $query = 'SELECT * FROM `grouptask` WHERE `id_group` = '.$group["id_group"]. ' ORDER BY `date_grouptask';

        $result = mysqli_query($con, $query);
        $count = mysqli_num_rows($result);
        if($group["id_admin"]!=$_SESSION['idcurrentuser']){
          $checkboxHtml = '';
        }else{
          $checkboxHtml = '<input class="form-check-input" type="checkbox">';
        }
        if($count>0){
          while ($row = mysqli_fetch_array($result)) {
            echo '<tr id="GroupTask'.$row['id_grouptask'].'" name="GroupTask'.$row['id_grouptask'].'" class="private">
            <td>';
            echo $checkboxHtml;
            echo '</td>
            <td class="taskname">'.$row['name_grouptask'].'</td>
            <td class="tasklabel">'.$row['label_grouptask'].'</td>
            <td class="taskowner">'.$group["name_group"].'</td>
            <td class="taskdate">'.$row['date_grouptask'].'</td>
            </tr>';
          }
        }
        ?>
      </tbody>
    </table>
  </div>

  <?php
    if($group["id_admin"]==$_SESSION['idcurrentuser']){
         echo '<button class="btn btn-info fixed-bottom mx-4 mb-4" data-bs-toggle="modal" data-bs-target="#addGroupTaskModal" id="addGroupTaskModalBtn">+ ADD TASK</button>
  <div class="modal fade" id="addGroupTaskModal" tabindex="-1" aria-labelledby="addGroupTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form  action="grouptask_scriptmanager.php" method="post">
          <input type="hidden" readonly class="form-control-plaintext" id="staticIDGroup" name="staticIDGroup" value="'.$group['id_group'].'">
          <div class="modal-header">
            <h5 class="modal-title" id="addGroupTaskModalLabel">Create a New Group Task</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="d-grid gap-2">
              <!-- Row Name -->
              <div class="row">
                <div class="col-sm-2">
                  <label for="inputGroupTaskNameToAdd" class="col-form-label">GroupTask</label>

                </div> <div class="col-sm-10">

                  <input type="text" class="form-control" id="inputGroupTaskNameToAdd" placeholder="Group Task Name" name="inputGroupTaskNameToAdd" value="A Group Task">
                </div>
              </div>
              <!-- Row Label -->
              <div class="row">
                <div class="col-sm-2">
                  <label for="SelectLabelToAdd" class="col-form-label">Label</label>

                </div>
                <div class="col-sm-10" id="newLabelInput">
                  <input type="text" class="form-control" id="inputLabelNameToAdd" placeholder="New Label Name" name="inputLabelNameToAdd">
                </div>
              </div>
              <!-- Row Date -->
              <div class="row">
                <div class="col-sm-2">
                  <label for="inputDateToAdd" class="col-form-label">Date</label>
                </div> <div class="col-sm-10">

                  <input type="date"  class="form-control" id="inputDateToAdd" name="inputDateToAdd" value="'.date("Y-m-d").'" min="';
                   echo date("Y-m-d");
            echo '" >
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-primary" id="addGroupTaskSaveBtn" name="addGroupTask" type="submit" >Save New Group Task</button>
          </div>
        </form>
      </div>
    </div>
  </div>';
        echo '
        <div class="modal fade" id="editTaskModal" tabindex="-1" aria-labelledby="editTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="grouptask_scriptmanager.php" method="post">
         <input type="hidden" readonly class="form-control-plaintext" id="staticIDGroup" name="staticIDGroup" value="'.$group['id_group'].'">
          <div class="modal-header">
            <h5 class="modal-title" id="editTaskModalLabel">Edit Task</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="d-grid gap-2">
              <input type="hidden" readonly class="form-control-plaintext" id="staticIDtoEdit" name="staticIDtoEdit" value="">
              <!-- Row Name -->
              <div class="row">
                <div class="col-sm-2">
                  <label for="inputTaskNameToEdit" class="col-form-label">Task</label>

                </div> <div class="col-sm-10">

                  <input type="text" class="form-control" id="inputTaskNameToEdit" name="inputTaskNameToEdit">
                </div>
              </div>
              <!-- Row Label -->
              <div class="row">
                <div class="col-sm-2">
                  <label for="SelectLabelToEdit" class="col-form-label">Label</label>

                </div> 
                <div class="col-sm-10" id="newLabelInput">
                  <input type="text" class="form-control" id="inputLabelNameToEdit" name="inputLabelNameToEdit">
                </div>
              </div>
              <!-- Row Date -->
              <div class="row">
                <div class="col-sm-2">
                  <label for="inputTaskNameToAdd" class="col-form-label">Date</label>
                </div> <div class="col-sm-10">

                  <input type="date" class="form-control" id="inputTaskDateToEdit" name="inputTaskDateToEdit">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-primary" id="saveEdit" name="editGroupTask" type="submit">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>';
  echo "<script>
  $('tr').on('click',function(e){
        if(e.target.nodeName=='INPUT'||e.target.nodeName=='TH'){
          return;
        }
        $('#inputTaskNameToEdit').val('');
        $('#inputLabelNameToEdit').val('');
        $('#inputTaskDateToEdit').val('');
        $('#editTaskModal').modal('toggle');
        var taskElement = e.target.parentElement;
        // IMPORTANT : ADD ID 
        $('#inputTaskNameToEdit').val($(taskElement).find('.taskname').text());
        $('#inputLabelNameToEdit').val($(taskElement).find('.tasklabel').text());
        $('#inputTaskDateToEdit').val($(taskElement).find('.taskdate').text());
        $('#staticIDtoEdit').val($(taskElement).attr('id'));  

      })
  </script>";
    }
  ?>
  
</div>

</body>
</html>