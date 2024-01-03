<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initiale-scale=1">

    <title>User Profile | ToDoWeb</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="style.css" />



</head>

<body class=" bg-dark text-white">
    <div class="container-fluid">
        <div class="row">

            <?php include "header.php"; 
            session_start(); ?>

            <?php

            require "connection.php";

            if (isset($_SESSION["u"])) {
              
                $u = $_SESSION["u"]["id"];
                $f = $_SESSION["u"]["first_name"];

                $rs = Database::search("SELECT * FROM `user` WHERE `id` = '$u' ");

               $data=$rs->fetch_assoc();



            ?>

                <div class="col-12 " style="background-color:steelblue;">
                    <div class="row">

                        <div class="col-12 bg-dark rounded mt-4 mb-4">
                            <div class="row     ">
                                <div class="col-3 border-end">
                                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">

                                      



                                    </div>
                                </div>

                                <div class="col-md-5 border-end">
                                    <div class="p-3 py-5 mt-5 mb-5">

                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h4 class="fw-bold">Profile Settings</h4>
                                        </div>

                                        <div class="row mt-4">

                                            <div class="col-6">
                                                <label class="form-label">First Name</label>
                                                <input type="text"  class="form-control bg-dark text-white" value="<?php echo $data["first_name"]; ?>" id="fname"/>
                                            </div>

                                            <div class="col-6">
                                                <label class="form-label">Last Name</label>
                                                <input type="text" class="form-control bg-dark text-white" value="<?php echo $data["last_name"]; ?>" id="lname"/>
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Username</label>
                                                <input type="text" class="form-control bg-dark text-white"  value="<?php echo $data["username"]; ?>" id="username"/>
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Password</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control bg-dark text-white" id="password" readonly value="<?php echo $data["password"]; ?>"/>
                                                    <span class="btn btn-outline-secondary"  >
                                                        <i class="bi bi-eye-slash-fill" id="eye"  onclick="change();"></i>
                                                    </span>
                                                </div>
                                            </div>

                                           

                                            <div class="col-12">
                                                <label class="form-label">Registered date</label>
                                                <input type="text" class="form-control bg-dark text-white" readonly value="<?php echo $data["created_date"]; ?>"/>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Birthdate date</label>
                                                <input type="text" class="form-control bg-dark text-white" readonly value="<?php echo $data["birth_date"]; ?>"/>
                                            </div>

                                   

                                            <div class="col-12 d-grid mt-3">
                                                <button class="btn btn-primary" onclick="updateProfile();">Update My Profile</button>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                               

                            </div>
                        </div>

                    </div>
                </div>

            <?php

            } else {
                header("Location:http://localhost/Web/index.php");
            }

            ?>


          

        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>