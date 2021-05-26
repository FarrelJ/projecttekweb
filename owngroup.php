<DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
	<?php
		include "library.php";
        if (isset($_POST['creategroup'])){
           
            header("location:creategroup.php");	
        }
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
</head>
<body>
    <?php
		include "navbar.php";
	?>
    <form method="post" action="owngroup.php" class="">	
    <div class="shadow-lg bg-info p-5 rounded-lg m-3 rounded" id="buatbackground">
                            <h1>List of my group(nanti ganti gambar)</h1>
                            <div class="container d-flex justify-content-center" id="searchbar">
                                <div class="card mt-5 p-4" >
                                <center>Lets Create a new group here!<center>
                                    <div class="input-group mb-3"> 
                                    <button type="submit" class="btn btn-primary" style="width:90%" name="creategroup">Create Group</button>
                                        <button type="button" class="btn btn-primary">
                                            <img src="bootstrap/icons/file-plus.svg" alt="Bootstrap" width="16" height="16">
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col">
                                    <div class="card" style="width: 22rem;height:19rem;border: 5px solid #E3E6ED">
                                        <img src="..." class="card-img-top" alt="...">
                                        <div class="card-body">
                                                <h5 class="card-title" id="1">Group A</h5>
                                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                <a href="#" class="btn btn-primary" style="width: 18rem">Following</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                <div class="card" style="width: 22rem;height:19rem;border: 5px solid #E3E6ED">
                                        <img src="..." class="card-img-top" alt="...">
                                        <div class="card-body">
                                                <h5 class="card-title" id="2">Group B</h5>
                                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                <a href="#" class="btn btn-primary" style="width: 18rem">Following</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card" style="width: 22rem;height:19rem;border: 5px solid #E3E6ED">
                                        <img src="..." class="card-img-top" alt="...">
                                        <div class="card-body">
                                                <h5 class="card-title" id="3">Group C</h5>
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
                                        <div class="card-body">
                                                <h5 class="card-title" id="4">Group D</h5>
                                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                <a href="#" class="btn btn-primary" style="width: 18rem">Following</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                <div class="card" style="width: 22rem;height:19rem;border: 5px solid #E3E6ED;">
                                        <img src="..." class="card-img-top" alt="...">
                                        <div class="card-body">
                                                <h5 class="card-title" id="5">Group E</h5>
                                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                <a href="#" class="btn btn-primary" style="width: 18rem">Following</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card" style="width: 22rem;height:19rem;border: 5px solid #E3E6ED">
                                        <img src="..." class="card-img-top" alt="...">
                                        <div class="card-body">
                                                <h5 class="card-title" id="5">Group E</h5>
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