<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
	<?php
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
    </style>
    <script>
        $(document).ready(function(){
            $("#1").click(function(){
                window.location.replace("http://localhost/projecttekweb/isigroup.php");
                //alert();
            });
            $("#2").click(function(){
                window.location.replace("http://localhost/projecttekweb/isigroup.php");
                //alert();
            });
            $("#3").click(function(){
                window.location.replace("http://localhost/projecttekweb/isigroup.php");
                //alert();
            });
            $("#4").click(function(){
                window.location.replace("http://localhost/projecttekweb/isigroup.php");
                //alert();
            });
            $("#searchgroup").click(function(){
                var id_search= $("#searchingbar").val();
                window.location.replace("http://localhost/projecttekweb/isigroup.php?id="+ id_search);
                //alert(id_search);
            });
        });
    </script>
</head>
<body>
    <?php
		include "navbar.php";
        /*$result = mysqli_query($con, "SELECT * FROM barang" );
        $counter = 0;
        while ($row = mysqli_fetch_array($result)) {
            if($counter%3==0){
                echo '<div class="row">';
            }
            echo '<div class="col-4 d-flex flex-column barangData" id="'.$row["id_barang"].'">
            <div class="card" style="width: 22rem;height:19rem;border: 5px solid #E3E6ED">
                                        <img src="..." class="card-img-top" alt="...">
                                        <div class="card-body" id="1">
                                                <h5 class="card-title" >Group A</h5>
                                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
                                                <a href="#" class="btn btn-primary" style="width: 18rem">Following</a>
                                        </div>
            </div>
            </div>';
            if($c%3==2){
                echo '</div>';
            }
            $counter=$counter+1;

        }
        if($c%3!=1){
            echo '</div>';
        }*/
	?>
    <form method="post" action="" class="">	
                    <div class="shadow-lg bg-info p-5 rounded-lg m-3 rounded" id="buatbackground">
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
                            <div class="row ">
                                <div class="col">
                                    <div class="card" style="width: 22rem;height:19rem;border: 5px solid #E3E6ED">
                                        <img src="..." class="card-img-top" alt="...">
                                        <div class="card-body" id="1">
                                                <h5 class="card-title" >Group A</h5>
                                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                <a href="#" class="btn btn-primary" style="width: 18rem">Following</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                <div class="card" style="width: 22rem;height:19rem;border: 5px solid #E3E6ED">
                                        <img src="..." class="card-img-top" alt="...">
                                        <div class="card-body" id="2">
                                                <h5 class="card-title" >Group B</h5>
                                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                <a href="#" class="btn btn-primary" style="width: 18rem">Following</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card" style="width: 22rem;height:19rem;border: 5px solid #E3E6ED">
                                        <img src="..." class="card-img-top" alt="...">
                                        <div class="card-body"  id="3">
                                                <h5 class="card-title">Group C</h5>
                                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                <a href="#" class="btn btn-primary" style="width: 18rem">Following</a>
                                        </div>
                                    </div>   
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col">
                                    <div class="card" style="width: 22rem;height:19rem; border: 5px solid #E3E6ED" >
                                        <img src="..." class="card-img-top" alt="...">
                                        <div class="card-body" id="4">
                                                <h5 class="card-title" >Group D</h5>
                                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                <a href="#" class="btn btn-primary" style="width: 18rem">Following</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                <div class="card" style="width: 22rem;height:19rem;border: 5px solid #E3E6ED;">
                                        <img src="..." class="card-img-top" alt="...">
                                        <div class="card-body" id="5">
                                                <h5 class="card-title" >Group E</h5>
                                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                <a href="#" class="btn btn-primary" style="width: 18rem">Following</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card" style="width: 22rem;height:19rem;border: 5px solid #E3E6ED">
                                        <img src="..." class="card-img-top" alt="...">
                                        <div class="card-body"  id="6">
                                                <h5 class="card-title">Group F</h5>
                                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                <a href="#" class="btn btn-primary" style="width: 18rem">Following</a>
                                        </div>
                                    </div>   
                                </div>
                            </div>
                     </div>
                </form>
</body>
</html>