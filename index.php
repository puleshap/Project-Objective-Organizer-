<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initiale-scale=1">

    <title>ToDoWeb</title>

    <link rel="stylesheet" href="bootstrap.css"/>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"/>


</head>

<body class="main-body">

<div class="container-fluid vh-100 d-flex justify-content-center">
    <div class="row align-content-center">

    <!--header-->
    <div class="col-12">
        <div class="row">
            
            <div class="col-12">
                <h2 class="text-center  heading" >Welcome to Get Work Done!</h2>
            </div>
        </div>
    </div>
    <!--header-->

    <!--content-->
    <div class="col-12 p-3">
        <div class="row">

        <div class="col-3"></div>
        <div class="col-12 col-lg-6" id="signUpBox">
            <div class="row g-2">
                <div class="col-12">
                    <p class="title2">Create New Account</p>
                    
                </div>
                <div class="col-12 d-none" id="msgdiv">
              
                    <div class="alert alert-danger" role="alert" id="alertdiv">
                    
                    <i class="bi bi-x-octagon-fill fs-5" id="msg">

                </i>
                
                    </div>
                    
                </div>
                <div class="col-6">
                    <label class="form-label b_intext">First Name</label>
                    <input type="text" class="form-control intext" id="f"/>
                </div>
                <div class="col-6">
                    <label class="form-label b_intext">Last Name</label>
                    <input type="text" class="form-control intext" id="l"/>
                </div>
                <div class="col-12">
                    <label class="form-label b_intext">Usename</label>
                    <input type="email" class="form-control intext" id="u"/>
                </div>
                <div class="col-12">
                    <label class="form-label b_intext">Password</label>
                    <input type="password" class="form-control intext" id="p"/>
                </div>
                <div class="col-6">
                    <label class="form-label b_intext">Security Code</label>
                    <input type="text" class="form-control intext" id="s"/>
                </div>
                <div class="col-6">
                    <label class="form-label b_intext">Birthday</label>
                    <input type="date" class="form-control intext" id="b"  value="<?php echo date('y-m-d');?>"/>
                </div>
                
               
                <div class="col-12 col-lg-6 d-grid">
                    <button class="btn btn-primary" onclick="signup();">Sign Up</button>
                </div>
                <div class="col-12 col-lg-6 d-grid">
                    <button class="btn btn-dark" onclick="changeView();" >Alredy have an account?Sign In</button>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 d-none" id="signInBox">
            <div class="row g-2">
                <div class="col-12">
                    <p class="title2">Sign In</p>
                    <span class="text-danger" id="msg2"></span>
                </div>
                <?php
                
                $email = "";
                $password = "";
                $check = "";

                if(isset($_COOKIE["username"])){
                    $email = $_COOKIE["username"];
                    
                }

                if(isset($_COOKIE["pass"])){
                    $password = $_COOKIE["pass"];
                  
                }
              
                
                ?>
                <div class="col-12 ">
                    <label class="form-label b_intext" >Username</label>
                    <input type="text" class="form-control intext " id="username"   value="<?php echo($email)?>"/>
                </div>
                <label class="form-label b_intext" >Password</label>
                <div class="col-12 input-group ">
                    
                    <input type="password" class="form-control intext" id="password"    value="<?php echo($password)?>" />
                    <span class="btn btn-secondary"  >
                       <i class="bi bi-eye-slash-fill" id="eye"  onclick="change();"></i>
                    </span>
                </div>
                <div class="col-6">
                    <div class="form-check">
                        <input class="form-check-input mt-2" type="checkbox" value="1" id="rememberme" checked="true"/>
                        <label class="form-check-label" style="font-weight:bold; font-size: 18px;">Remember Me</label>
                    </div>
                </div>
                <div class="col-6 text-end">
                    <a href="#" class="link-primary" onclick="forgotPassword();">Forgot Password?</a>
                </div>
                <div class="col-12 col-lg-6 d-grid">
                    <button class="btn btn-primary" onclick="signIn();">Sign In</button>
                </div>
                <div class="col-12 col-lg-6 d-grid">
                    <button class="btn btn-danger" onclick="changeView();" >New to eShop?Join now</button>
                </div>

            </div>
        </div>

        </div>
    </div>
    <!--content-->

    <!--modal-->

    <div class="modal" tabindex="-1" id="forgotPasswordModal">
    <div class="modal-dialog bg-dark text-white">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header">
                    <h5 class="modal-title">Reset Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">

                        <div class="col-6">
                            <label class="form-label">Username</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="un"/>
                                </div>

                        </div>

                        <div class="col-6">
                            <label class="form-label">New Password</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="np"/>
                             </div>

                        </div>

                        <div class="col-12">
                            <label class="form-label">Security Code</label>
                            <input type="text" class="form-control" id="sc"/>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="resetpw();">Reset Password</button>
                </div>
            </div>
        </div>
    </div>

    <!--modal-->

    <!--footer-->

    <div class="col-12 fixed-bottom d-none d-lg-block">
        <p class="text-center">&copy; 2022 eShop.lk || All Right Reserved</p>
    </div>

    <!--footer-->

    </div>

</div>

    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>