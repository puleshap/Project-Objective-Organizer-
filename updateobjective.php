<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Update Objective | ToDoWeb</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />



</head>

<body class="bg-dark text-white">

    <div class="container-fluid ">
        <div class="row gy-3">
            <?php include "header.php";

            require "connection.php";
            session_start();

            if (isset($_SESSION["u"])) {
                if (isset($_GET["id"])) {
                    
                    $pid = $_GET["id"];
                  

        
                    $object_rs = Database::search("SELECT * FROM `objective`,`status` WHERE o_id='" . $pid . "'
                    AND `id`= `status_id`");
                
                    $product_num = $object_rs->num_rows;
                    
                
                        $o_data = $object_rs->fetch_assoc();

                      


            ?>

                <div class="col-12">
                    <div class="row">

                        <div class="col-12 text-center border-top border-bottom border-0">
                            <h2 class="h2 text-warning fw-bold">Create a New Objective</h2>
                        </div>

                        <div class="col-12">
                            <div class="row">

                            <div class="col-12 col-lg-4 mt-3 ">
                                    <div class="row">

                                    <div class="col-12">
                                            <label class="form-label fw-bold" style="font-size: 20px;">Current Objective Status-</label>
                                            <?php  
                                            $name = $o_data["name"];
                                            if  ($name =='Incompleted'){
                                            ?>
                                            <label class="form-label fw-bold text-danger" style="font-size: 25px;" ><?php echo($o_data["name"])?></label>
                                            <?php  
                                            $name = $o_data["name"];
                                            }else if  ($name =='Completed'){
                                            ?>
                                             <label class="form-label fw-bold text-success" style="font-size: 25px;" ><?php echo($o_data["name"])?></label>
                                            <?php  
                                            $name = $o_data["name"];
                                            }else if  ($name =='Canceled'){ ?>

                                            <label class="form-label fw-bold text-warning" style="font-size: 25px;" ><?php echo($o_data["name"])?></label>
                                            <?php }
                                            ?>
                                        </div>

                                       


                                    </div>
                                </div>

                                <div class="col-12 col-lg-4 mt-3 ">
                                    <div class="row">

                                    <div class="col-12">
                                            <label class="form-label fw-bold" style="font-size: 20px;">Select Objective Status</label>
                                        </div>

                                        <div class="col-12">
                                            <select class="form-select  text-center bg-dark text-white " style="font-size: 20px;" id="category" >
                                            <option value="0">Update Objective Status</option>
                                                <?php

                                                $category_rs = Database::search("SELECT * FROM `status`");
                                                $category_num = $category_rs->num_rows;

                                                for ($x = 0; $x < $category_num; $x++) {
                                                    $category_data = $category_rs->fetch_assoc();
                                                ?>
                                                    <option  value="<?php echo $category_data["id"]; ?>"><?php echo $category_data["name"]; ?></option>
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
                                            <input type="text" class="form-control bg-dark text-white " id="title" style="font-size: 20px;" value="<?php echo($o_data["heading"]);?>"/>
                                        </div>
                                    </div>
                                </div>

                                

                               

                               

                                <div class="col-12">
                                    <hr class="" />
                                </div>

                                <div class="col-12">
                                    <div class="row ">
                                      
                                        <div class="col-12 col-lg-6 ">
                                            <div class="row">
                                                <div class="col-12 offset-lg-1 col-lg-3 mt-3 ">
                                                    <label class="form-label fw-bold " style="font-size: 20px;">Start Date</label>
                                                </div>
                                                <div class="col-12 col-lg-8">
                                                    <div class="input-group mb-2 mt-2 " >
                                                       
                                                      
                                                        <input type="date" class="form-control bg-dark text-white "style="font-size: 20px;" id="sd" placeholder=""  value="<?php echo($o_data["set_date"]); ?>" />
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="row border-start">
                                                <div class="col-12 offset-lg-1 col-lg-3 mt-3">
                                                <label class="form-label fw-bold" style="font-size: 20px;">End Date</label>
                                                </div>
                                                <div class="col-12 col-lg-8">
                                                    <div class="input-group mb-2 mt-2">
                                                        
                                                        <input type="date" class="form-control bg-dark text-white"style="font-size: 20px;" id="ed" value="<?php echo($o_data["end_date"]); ?>" />
                                                   
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
                                            <textarea cols="30" rows="15" class="form-control bg-dark text-white"style="font-size: 20px;" id="desc"><?php echo($o_data["description"]);?></textarea>
                                        </div>
                                    </div>
                                </div>

                             

                             

                                <div class="col-12">
                                    <hr class="" />
                                </div>

                               

                                <div class="offset-lg-4 col-12 col-lg-4 d-grid mt-3 mb-3">
                                    <button class="btn btn-success" onclick="updateobj('<?php echo ($pid)?>');">Update Objective</button>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            <?php
                    }
            } else {
                header("Location:home.php");
            }

            ?>

           
        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>