<?php
require_once '../../common/includes/dbconnect.php';
require_once '../includes/check.php';
define('URLBASE', 'http://localhost/bookstore');

$sql_categories = "SELECT id, title FROM categories";
$result_categories = $conn->query($sql_categories);
?>
<!doctype html>

<html> 

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--bootstrap css-->

        <link href="../../common/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <!--font awesome-->
        <link href="../../common/assets/vendor/font-awesome/css/all.min.css" rel="stylesheet" type="text/css"/>
        <!--theme css-->
        <link href="../../common/assets/libs/css/style-vertical-nav.css" rel="stylesheet" type="text/css"/>
        <!--bootstrap bundle-->
        <script src="../../common/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
        <!--jquery 3.6.0-->
        <script src="../../common/assets/vendor/jquery/jquery-3.6.0.min.js" type="text/javascript"></script>
        <!--theme js-->
        <script src="../../common/assets/libs/js/javascript.js" type="text/javascript"></script>
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


    <body>
        <div class="vertical-nav bg-white" id="sidebar">
            <div class="py-4 px-3 mb-4 bg-light">
                <div class="media d-flex align-items-center"><img src="https://bootstrapious.com/i/snippets/sn-v-nav/avatar.png" alt="..." width="65" class="mr-3 rounded-circle img-thumbnail shadow-sm">
                    <div class="media-body">
                        <h4 class="m-0">ADMIN-PANEL</h4>
                        
                    </div>
                </div>
            </div>

            <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Main</p>

            <ul class="nav flex-column bg-white mb-0">
                <li class="nav-item">
                    <a href="#" class="nav-link text-dark font-italic bg-light">
                        <i class="fa fa-th-large mr-3 text-primary fa-fw"></i>
                        Начало
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo URLBASE; ?>/backend/admin/add-book.php" class="nav-link text-dark font-italic">
                        <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
                        Добави книга
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo URLBASE; ?>/backend/admin/update-books.php" class="nav-link text-dark font-italic">
                        <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
                        Редактирай книга
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo URLBASE; ?>/backend/admin/all-books.php" class="nav-link text-dark font-italic">
                        <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
                        Всички книги
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo URLBASE; ?>/backend/admin/all-authors.php" class="nav-link text-dark font-italic">
                        <i class="fa fa-cubes mr-3 text-primary fa-fw"></i>
                        Всички автори
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo URLBASE; ?>/backend/admin/all-categories.php" class="nav-link text-dark font-italic">
                        <i class="fa fa-picture-o mr-3 text-primary fa-fw"></i>
                        Всички категории
                    </a>
                </li>
                        <div>
          <ul>
             <?php
                                    
                if ($result_categories->num_rows > 0) {
                    while ($row = $result_categories->fetch_assoc()) {
                        ?> 
                    <li><a href="<?php echo URLBASE; ?>/backend/admin/categories-template.php?id=<?php echo $row['id']?> "><?php echo $row['title']; ?></a></li>
                            <?php
                            }
                        }
                    ?> 
          </ul>
        </div>
            </ul>



        </div>
        <!-- End vertical navbar -->

        

       

        <!-- ГОРЕН ЧЕРЕН НАВБАР КРАЙ-->


    </body>