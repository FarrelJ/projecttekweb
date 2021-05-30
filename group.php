<!DOCTYPE html>
<html>
<head>
    <title>
        
    </title>
    <?php
        session_start();
        include "connect.php";
        include "library.php";

    ?>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Heebo:wght@500&display=swap');

body {
    background-color: #E7E9F5;
    font-family: 'Heebo', sans-serif
}

.card {
    width: 500px;
    border: none;
    border-radius: 20px;
}

.form-control {
    border-radius: 10px;
    border: 1px solid #E3E6ED;
}

#searchbar{
    margin-bottom:50px;
   
}
.row{
    margin-top:55px;
}
#buatbackground{
    background-image:url('gallery/group.jpg');
    height: 100%;
    width:100%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
.carding{
   
             height:60%;
             width:100%;
         
}
    </style>
    <script>
        $(document).ready(function(){
            $("#searchgroup").click(function(){
                var id_search= $("#searchingbar").val();
                window.location.replace("/projecttekweb/isigroup.php?id="+ id_search);
                //alert(id_search);
            });
        });
    </script>
</head>
<body>
    <?php
        include "navbar.php";
    ?>
    <form method="post" action="" class=""> 
                    <div class="shadow-lg bg-info p-5 rounded-lg rounded" id="buatbackground">
                        <h1>Group(nanti ganti gambar)</h1>
                        <h3>Following (nanti ganti gambar)</h3>
                            <div class="container d-flex justify-content-center" id="searchbar">
                                <div class="card mt-5 p-4" >
                                <center>Find your group Here on Venty<center>
                                    <div class="input-group mb-3"> 
                                        
                                        <input type="search" class="form-control rounded" placeholder="Explore Group by id" aria-label="Search"  aria-describedby="search-addon" id="searchingbar">
                                        <button type="button" class="btn btn-primary" id="searchgroup">
                                            <img src="bootstrap/icons/search.svg" alt="Bootstrap" width="16" height="16">
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <?php
                                $id=$_SESSION['idcurrentuser'];
                                $query=mysqli_query($con,"SELECT * FROM `group` LEFT JOIN `gambartable`
                                ON `group`.`id_gambar` = `gambartable`.`id_gambar` 
                                RIGHT JOIN `follow` ON `group`.`id_group` = `follow`.`id_group`
                                WHERE `group`.`id_admin` <> .$id AND `follow`.`id_user`=".$id);
                                $count=mysqli_num_rows($query);
                                //echo $count;
                                $counter = 0;
                                while($group = mysqli_fetch_array($query))
                                {
                                    if($counter%3==0){
                                        echo '<div class="row">';
                                    }
                                    
                                    echo '<div class="card mx-5" style="width: 22rem;height:19rem;border: 5px solid #E3E6ED" id="'.$group['id_group'].'">
                                    <h>'.$group['name_group'].'</h>
                                    <div class="card-body ">
                                                  <img class="carding" src=';echo "'gallery/".$group["url_gambar"]."'";
                                          echo '>';
                                          echo'        
                                                  <p class="card-text">'.$group['desc_group'].'</p>
                                                  <a  class="btn btn-primary" style="width: 18rem">Following</a>
                                                  </div>
                                   </div>';
                                    
                                    if($counter%3==2){
                                        echo '</div>';
                                    }
                                    $counter=$counter+1;
                                }
                            ?>
                    </div>    
     </form>
</body>
</html>