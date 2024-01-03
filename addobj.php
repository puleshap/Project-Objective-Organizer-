<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create New Objective | eShop</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/logo.svg" />

</head>

<body class="bg-dark text-white">

    <div class="container-fluid ">
        <div class="row gy-3">
            <?php include "header.php";

            require "connection.php";
session_start();
            if (isset($_SESSION["u"])) {

            ?>

                <div class="col-12">
                    <div class="row">

                        <div class="col-12 text-center border-top border-bottom border-0">
                            <h2 class="h2 text-warning fw-bold">Create a New Objective</h2>
                        </div>

                        <div class="col-12">
                            <div class="row">

                                <div class="col-12 col-lg-4 ">
                                    <div class="row">

                                      
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4 mt-3 ">
                                    <div class="row">

                                    <div class="col-12">
                                            <label class="form-label fw-bold" style="font-size: 20px;">Select Objective Priority</label>
                                        </div>

                                        <div class="col-12">
                                            <select class="form-select  text-center bg-dark text-white " id="category" onchange="load_brand();">
                                                <option value="0">Select Priority</option>
                                                <?php

                                                $category_rs = Database::search("SELECT * FROM `priority`");
                                                $category_num = $category_rs->num_rows;

                                                for ($x = 0; $x < $category_num; $x++) {
                                                    $category_data = $category_rs->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $category_data["id"]; ?>"><?php echo $category_data["name"]; ?></option>
                                                <?php
                                                }

                                                ?>
                                            </select>
                                        </div>


                                    </div>
                                </div>

                                <div class="col-12 col-lg-4 ">
                                   
                                </div>

                                <div class="col-12">
                                    <hr class="border-success" />
                                </div>

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label fw-bold" style="font-size: 20px;">
                                              Add the Heading to your Objective
                                            </label>
                                        </div>
                                        <div class="offset-0 offset-lg-2 col-12 col-lg-8">
                                            <input type="text" class="form-control bg-dark text-white" id="title" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <hr class="border-success" />
                                </div>

                               

                               

                                <div class="col-12">
                                    <hr class="" />
                                </div>

                                <div class="col-12">
                                    <div class="row ">
                                      
                                        <div class="col-12 col-lg-6 ">
                                            <div class="row">
                                                <div class="col-12 offset-lg-1 col-lg-3 ">
                                                    <label class="form-label fw-bold " style="font-size: 20px;">Start Date</label>
                                                </div>
                                                <div class="col-12 col-lg-8">
                                                    <div class="input-group mb-2 mt-2">
                                                       
                                                      
                                                        <input type="date" class="form-control bg-dark text-white " id="sd"  value="<?php echo date('y-m-d');?>" />
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="row border-start">
                                                <div class="col-12 offset-lg-1 col-lg-3">
                                                <label class="form-label fw-bold" style="font-size: 20px;">End Date</label>
                                                </div>
                                                <div class="col-12 col-lg-8">
                                                    <div class="input-group mb-2 mt-2">
                                                        
                                                        <input type="date" class="form-control bg-dark text-white" id="ed" value="<?php echo date('y-m-d');?>" />
                                                   
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <hr class="border-success" />
                                </div>

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label fw-bold" style="font-size: 20px;">Objective Description</label>
                                        </div>
                                        <div class="col-12">
                                            <textarea cols="30" rows="15" class="form-control bg-dark text-white" id="desc"></textarea>
                                        </div>
                                    </div>
                                </div>

                             

                             

                                <div class="col-12">
                                    <hr class="" />
                                </div>

                               

                                <div class="offset-lg-4 col-12 col-lg-4 d-grid mt-3 mb-3">
                                    <button class="btn btn-success" onclick="addobj();">Save New Objective</button>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            <?php

            } else {
                header("Location:index.php");
            }

            ?>

           
        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>