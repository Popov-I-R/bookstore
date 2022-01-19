<?php
require_once '../common/includes/dbconnect.php';
//require_once 'header.php'; 
require_once 'includes/check.php';
 define ('URLBASE', 'http://localhost/bookstore/') ; 
?>
<!doctype html>

<html> 

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--bootstrap css-->

        <link href="../common/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <!--font awesome-->
        <link href="../common/assets/vendor/font-awesome/css/all.min.css" rel="stylesheet" type="text/css"/>
        <!--theme css-->
        <link href="../common/assets/libs/css/style.css" rel="stylesheet" type="text/css"/>
        <!--bootstrap bundle-->
        <script src="../common/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
        <!--jquery 3.6.0-->
        <script src="../common/assets/vendor/jquery/jquery-3.6.0.min.js" type="text/javascript"></script>
        <!--theme js-->
        <script src="../common/assets/libs/js/javascript.js" type="text/javascript"></script>
        <style>
            .nav-link {
                color:white
            }
            .nav-link:hover{
                color:#1ea3d7

            }
            .dropdown:hover>.dropdown-menu {
                display: block;
            }
            .dropdown-item:hover{
                color:#1ea3d7
            }
            .text-white:hover{
                color:#1ea3d7 !important
            }
            .btn-warning:hover{
                font-size:1.1rem
            }

            .category:hover{
                display:block !important;
            }



        </style>
    </head>
    <div class="page-content p-5" id="content">

        <section class="vh-100">
            <div class="container-fluid h-custom">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                        <form>
                            <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                                <p class="lead fw-normal mb-0 me-3">Sign in with</p>
                                <button type="button" class="btn btn-primary btn-floating mx-1">
                                    <i class="fab fa-facebook-f"></i>
                                </button>

                                <button type="button" class="btn btn-primary btn-floating mx-1">
                                    <i class="fab fa-twitter"></i>
                                </button>

                                <button type="button" class="btn btn-primary btn-floating mx-1">
                                    <i class="fab fa-linkedin-in"></i>
                                </button>
                            </div>

                            <div class="divider d-flex align-items-center my-4">
                                <p class="text-center fw-bold mx-3 mb-0">Register</p>
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example3">Email address</label>
                                <input type="email" id="email" class="form-control form-control-lg"
                                       placeholder="Enter a valid email address" />

                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="username">Username</label>
                                <input type="username" id="username" class="form-control form-control-lg"
                                       placeholder="Enter username" />

                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-3">
                                <label class="form-label" for="form3Example4">Password</label>
                                <input type="password" id="password" class="form-control form-control-lg"
                                       placeholder="Enter password" />

                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <!-- Checkbox -->
                                <div class="form-check mb-0">
                                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                                    <label class="form-check-label" for="form2Example3">
                                        Remember me
                                    </label>
                                </div>
                                <a href="#!" class="text-body">Forgot password?</a>
                            </div>
                            <p id="success" style="color:green; display:none"></p>
                            <p id="error" style="color:red; display:none"></p>
                            <div class="text-center text-lg-start mt-4 pt-2">
                                <button type="button" id="btn-register" class="btn btn-primary btn-lg"
                                        style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>
                                <p class="small fw-bold mt-2 pt-1 mb-0">Have an account? <a href="<?php echo URLBASE; ?>/backend/login.php"
                                                                                            class="link-danger">Login</a></p>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </section>

    </div>  

    <script>
        $('#btn-register').unbind().bind('click', function (e) {
            e.preventDefault();
            var username = $('#username').val(); //Взима стойността на формата по ID
            var email = $('#email').val();
            var password = $('#password').val();
            console.log(username);
            if (username != "" && email != "" && password != "") {
                $.ajax({
                    url: "includes/user/create.php",
                    type: "POST",
                    data: {
                        username: username,
                        email: email,
                        password: password,
                    },
                    cache: false,
                    success: function (dataResult) {
    //                  console.log(dataResult);
                        var dataResult = JSON.parse(dataResult);
    //                  console.log(dataResult);
                        if (dataResult.statusCode == 200) {
                            $('#success').show();
                            $('#success').html('Успешна регистрация');
                        } else if (dataResult.statusCode == 201) {
                            $('#error').show();
                            $('#error').html('Имейлът, който използвате вече съществува');
                        } else if (dataResult.statusCode == 202) {
                            alert("Error");
                        }
                    }
                });

            } else {
                alert('Попълнете задължителните полета!');
            }
        });
    </script>