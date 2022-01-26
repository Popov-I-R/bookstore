<?php

require_once 'header.php';
require_once 'backend/includes/check.php';


$user_id = $_SESSION['login_user'];
$query = "SELECT * FROM users WHERE id=$user_id";
$result = $conn->query($query);


?>
<!doctype html>

<html> 

    <head>

        <style>

        </style>
    </head>



    <body>
        <main>
            <div class="page-content p-5" id="content">


                <!-- Page content -->
                <div class="container-fluid mt--7">
                    <div class="row">

                        <div class="col-xl-12 order-xl-1">
                            <div class="card bg-secondary shadow">
                                <div class="card-header bg-white border-2">
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <h3 class="mb-1">Моят профил</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <h6 class="heading-small text-muted mb-4">User information</h6>
                                        <div class="pl-lg-4">
                                             <?php
            if($result->num_rows >0){
                while($row = $result->fetch_assoc()) { 
                    ?>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group focused">
                                                        <label class="form-control-label" for="input-username">Потребителско име</label>
                                                        <input type="text" id="input-username" class="form-control form-control-alternative" placeholder="Потребителско име" value="<?php echo $row['username']; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="input-email">Имейл адрес</label>
                                                        <input type="email" id="input-email" class="form-control form-control-alternative" placeholder="Имейл адрес" value="<?php echo $row['email']; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group focused">
                                                        <label class="form-control-label" for="input-first-name">Първо име</label>
                                                        <input type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="Първо име" value="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group focused">
                                                        <label class="form-control-label" for="input-number">Номер за връзка</label>
                                                        <input type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Number " value="+359 ">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group focused">
                                                        <label class="form-control-label" for="input-city">Град</label>
                                                        <input type="text" id="input-city" class="form-control form-control-alternative" placeholder="Град" value="">
                                                    </div>
                                                </div>
                                            </div>
                                                                <?php
                }     
            }
            ?>
                                        </div>
                                        <hr class="my-4">
                                        <!-- Address -->
                                        

                                        <hr class="my-4">
                                        <!-- Description -->
                                        
                                        <div class="pl-lg-4">
                                            <div class="form-group focused">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <a href="<?php echo URLBASE; ?>/myorders.php" class="btn btn-sm btn-primary">Моите поръчки</a>
                                                    </div>
                                                    <div class="col-6">
                                                        <a href="#!" class="btn btn-sm btn-primary">Запази</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>





            </div>










        </div>
    </main>
</body>