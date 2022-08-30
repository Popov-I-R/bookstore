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
            h2{
                text-align: center;
            }
            
            .btn-success {
                margin-top: 2%;
                
            }
            
        </style>
    </head>
    <body>
        <main>
            <div class="page-content p-5" id="content">

                <div class="row">
                    <div class="col-12">
                        <h2>Моят профил</h2>
                    </div>
                </div>              
                <form class="row g-3 needs-validation" novalidate>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <div class="col-md-4">
                                <label for="validationCustom02" class="form-label">E-mail</label>
                                <input type="text" class="form-control" id="validationCustom02" value="<?php echo $row['email']; ?>" required>
                                <div class="valid-feedback">
                                    Всичко е наред!
                                </div>
                                <div class="invalid-feedback">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustomUsername" class="form-label">Потребителско име</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                    <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" value="<?php echo $row['username']; ?>" required>
                                    <div class="invalid-feedback">
                                        Моля въведете потребителско име
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom03" class="form-label">Създанен на</label>
                                <input type="text" class="form-control disabled" id="validationCustom03" value="<?php echo $row['created_at']; ?>" disabled>
                                <div class="invalid-feedback">
                                    Моля въведете вашият адрес
                                </div>
                             </div>
                            <div class="row">
                                <div class="col-6" id="myorders">
                                    <a href="<?php echo URLBASE; ?>/myorders.php"  class="btn btn-success"><i class="glyphicon glyphicon-menu-center"></i> Моите поръчки</a>
                                </div>
                               

                            </div>
                            <?php
                        }
                    }
                    ?>
                </form>
            </div>
        </main>
    </body>
