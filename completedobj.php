<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initiale-scale=1">

    <title>Home | ToDoWeb</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />



</head>
<?php  
session_start();
if(isset($_SESSION['u'])){


?>

<body class="bg-dark text-white">
    <div class="container-fluid">
        <div class="row">

            <?php include "header.php";
            require "connection.php"; ?>

            <hr />


            <div class="col-12" id="basicSearchResult">
                <div class="row">

                   

                    <?php

                    $c_rs = Database::search("SELECT * FROM `priority`");
                    $c_num = $c_rs->num_rows;

                    for ($y = 0; $y < $c_num; $y++) {
                        $cdata = $c_rs->fetch_assoc();

                    ?>
                        <!--category name-->

                        <div class="col-12 mt-3 mb-3">
                            <a href="#" class="text-decoration-none text-white link-dark fs-3 fw-bold"><?php echo $cdata["name"]; ?></a> &nbsp;&nbsp;
                         
                        </div>

                        <!--category name-->

                        <!--products-->

                        <div class="col-12 mb-3">
                            <div class="row border border-primary">

                                <div class="col-12">
                                    <div class="row justify-content-center gap-2">

                                        <?php

                                        $product_rs = Database::search("SELECT * FROM `objective`,`status` WHERE
                                        `priority_id`='".$cdata["id"]."' AND
                                        `status_id`=`status`.id AND
                                        `status_id`='2' ORDER BY `end_date` DESC");
                                        $product_num = $product_rs->num_rows;

                                        for ($z = 0; $z < $product_num; $z++) {
                                            $product_data = $product_rs->fetch_assoc();


                                          $send=$product_data["id"];
                                          $head=$product_data["heading"];
                                          $sd=$product_data["set_date"];
                                          $ed=$product_data["end_date"];
                                          $s=$product_data["o_id"];
                                          $des=$product_data["description"];
                                          
                                        ?>
                                            <div class="card col-6 col-lg-2 mt-2 mb-2 bg-dark border" style="width: 18rem;">

                                               
                                                
                                                <div class="card-body ms-0 m-0 text-center">
                                                    <h5 class="card-title"><?php echo $product_data["heading"]; ?></span></h5>
                                                    

                                       

                                                        <span class="card-text text-warning fw-bold">Status </span> <br />
                                                        <h4 class="card-text text-success fw-bold"><?php echo $product_data["name"]?></h4>
                                                        <span class="card-text text-danger fw-bold"> Set Date</span><br />
                                                        <h5><?php echo $product_data["set_date"]; ?></h5> 
                                                        <span class="card-text text-danger fw-bold"> End Date</span>
                                                        <h5><?php echo $product_data["end_date"]; ?></h5> <br />
                                                     
                                                        <button class="col-12 btn btn-success mt-2" onclick="changestatus('<?php echo ($send) ?>');">Change Status</button>
                                                        <button class="col-12 btn btn-secondary mt-2" onclick="viewdescription('<?php echo($des)?>');">View Description</button>
                                                        <a href='<?php echo "updateobjective.php?id=$s&sid=$send "?>' class="col-12 btn btn-danger mt-2">Edit</a>
                                                        <button class="col-12 btn btn-warning mt-2" onclick="del('<?php echo($s)?>');">Delete</button>

                                                  

                                                    

                                                   
                            
                                                </div>
                                            </div>
                                        <?php

                                        }

                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--products-->
                    <?php
                    }

                    ?>
                </div>
            </div>

            <!--modal-->
    <div class="modal" tabindex="-1" id="modal">
        <div class="modal-dialog bg-dark text-white">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header">
                    <h5 class="modal-title">Select Objective Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">

                        <div class="col-6">
                            <label class="form-label">Set New Status</label>
                            <div class=" mb-3 ">
                              
                                    
                                    <select id="es" class="form-select bg-dark text-white" aria-label="Default select example" onchange="m(this.value);">
                                        <option selected>Select Status</option>
                                        <?php  
                                      
                                      $results= Database::search("SELECT * FROM `mark` ");
                                      $results_num= $results->num_rows;

                                      for($x=0;$x<$results_num;$x++){
                                        $row=$results->fetch_assoc();

                                     
                                        
                                        ?>
                                        
                                        <option  value="<?php echo($row["id"]);?>"><?php echo($row["mark"]);?></option>
                                        

                                <?php      }
                                
                                        ?>
                                 
                                    </select>
                                
                                
                                 </div>

                        </div>

                     
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="changem();">Reset Password</button>
                </div>
            </div>
        </div>
    </div>
    <!--modal-->
             <!--modal-->
             <div class="modal" tabindex="-1" id="desriptionmodal">
        <div class="modal-dialog bg-dark text-white">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header">
                    <h5 class="modal-title">Objective Description</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">

                        <div class="col-6">
                            <label class="form-label" id="desp" style="font-size: 20px ;"></label>
                            
                            
                           

                        </div>

                     
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" >Reset Password</button>
                </div>
            </div>
        </div>
    </div>
    <!--modal-->

        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>
<?php  
}else{
    header("Location:http://localhost/WEB/index.php");
}


?>

</html>