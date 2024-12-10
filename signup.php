<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Sign Up Quizzard</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--===============================================================================================-->
        <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css" />
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css" />
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css" />
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css" />
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css" />
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css" />
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css" />
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css" />
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="assets/css/util.css" />
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="assets/css/main.css" />
        <!--===============================================================================================-->

        <style>
            #form {
                overflow: auto;
            }
            .login100-more {
                background-image: url("assets/img/bg-01.gif");
                position: fixed;
                left: -0px;
                top: 0px;
                height: 100vh;
            }
        </style>
    </head>

    <body>
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <form id="form" class="login100-form validate-form" action="includes/signup.inc.php" method="POST">
                        <center><span class="text-danger"><b>
                            <?php
                            if(isset($_GET['error'])){
                                if($_GET['error'] == 1){
                                    echo 'Please fill all fields';
                                } elseif($_GET['error'] == 2){
                                    echo 'Please enter a valid email';
                                } elseif($_GET['error'] == 3){
                                    echo 'User already exist';
                                } elseif($_GET['error'] == 4){
                                    echo 'Password and confirm password does not match';
                                } elseif($_GET['error'] == 5){
                                    echo 'An error occured';
                                } elseif($_GET['error'] == 6){
                                    echo 'An error occured';
                                }
                            }
                            ?>
                        </b></span></center>
                        <br>
                        <span class="login100-form-title p-b-43">
                            Sign Up to Quizzard
                        </span>
                        <br />
                        <p class="text-center text-white-50 mb-5">Please enter below details!</p>
                        <div class="wrap-input100 validate-input" data-validate="First Name is required">
                            <input class="input100" type="text" name="fname" />
                            <span class="focus-input100"></span>
                            <span class="label-input100">First Name</span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="Last Name is required">
                            <input class="input100" type="text" name="lname" />
                            <span class="focus-input100"></span>
                            <span class="label-input100">Last Name</span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="User Name is required">
                            <input class="input100" type="text" name="username" />
                            <span class="focus-input100"></span>
                            <span class="label-input100">User Name</span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="Password is required">
                            <input class="input100" type="password" name="pass" />
                            <span class="focus-input100"></span>
                            <span class="label-input100">Password</span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="Password is required">
                            <input class="input100" type="password" name="passRepeat" />
                            <span class="focus-input100"></span>
                            <span class="label-input100">Repeat Password</span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                            <input class="input100" type="text" name="email" />
                            <span class="focus-input100"></span>
                            <span class="label-input100">Email</span>
                        </div>
                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn" type="submit" name="submit_signup">Sign Up</button>
                        </div>
                        <br />
                        <div class="text-center">
                            <p class="mb-0">
                                Have an account? <a href="index.php"><b>Log in</b></a>
                            </p>
                        </div>
                    </form>
                    <div class="login100-more"></div>
                </div>
            </div>
        </div>
        <!--===============================================================================================-->
        <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/animsition/js/animsition.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/bootstrap/js/popper.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/daterangepicker/moment.min.js"></script>
        <script src="vendor/daterangepicker/daterangepicker.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/countdowntime/countdowntime.js"></script>
        <!--===============================================================================================-->
        <script src="js/main.js"></script>
    </body>
</html>
