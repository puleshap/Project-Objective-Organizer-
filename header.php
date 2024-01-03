<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initiale-scale=1">

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="col-12">
        <div class="row ">

            <div class="offset-lg-4 col-5 col-lg-6 align-content-center text-white">

                <?php


                if (isset($_SESSION["u"])) {
                    $data = $_SESSION["u"];

                ?>
                <h3 class="mt-2 mx-6 mx-4  text-lg-start ">Welcome <?php echo $data["username"]; ?></h3>
               
                    <h2 class="text-lg-start mx-7">Lets Make Your Day Productive!</h2>
                
                
                
              
                <?php

                } 

                ?>
                

            </div>

            <div class="mb-1 col-12 col-lg-1 align-content-center mt-4">
                <div class="row">

                  
                    <div class="col-6 col-lg-6 dropdown">
                        <button class="btn btn-light dropdown-toggle bg-dark text-white-50" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            My Settings
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark ">
                            <li><a class="dropdown-item" href="home.php">Homepage</a></li>
                            <li><a class="dropdown-item" href="userProfile.php">My Profile</a></li>
                            <li><a class="dropdown-item" href="addobj.php">Create New Objective</a></li>
                            <li><a class="dropdown-item" href="completedobj.php">View Completed Objectives</a></li>
                            <li><a class="dropdown-item" href="canceledobj.php">View Canceled Obejctives</a></li>
                            <li><a class="dropdown-item" onclick="signout();">Signout</a></li>
                         </ul>
                    </div>

                
                    <!-- msg modal -->

                </div>
            </div>

        </div>
    </div>

    <!--<script src="bootstrap.bundle.js"></script>-->
    <script src="bootstrap.js"></script>
    <script src="script.js"></script>
</body>

</html>