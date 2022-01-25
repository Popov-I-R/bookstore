<?php
require_once '../common/includes/dbconnect.php';
//require_once 'includes/check.php';
define('URLBASE', 'http://localhost/bookstore');

$sql_categories = "SELECT id, title FROM categories";
$result_categories = $conn->query($sql_categories);
?>
<!doctype html>

<html> 

    <head>
        <title>Онлайн магазин</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--bootstrap css-->

        <link href="../common/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <!--font awesome-->
        <link href="../common/assets/vendor/font-awesome/css/all.min.css" rel="stylesheet" type="text/css"/>
        <!--theme css-->
        <link href="../common/assets/libs/css/vertical-categories.css" rel="stylesheet" type="text/css"/>
        <link href="../common/assets/libs/css/style-vertical-nav.css" rel="stylesheet" type="text/css"/>
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



    <body>
        <div class="col-md">
            <div class="vertical-nav bg-white" id="sidebar">
                <div class="py-4 px-3 mb-4 bg-light">
                    <div class="media d-flex align-items-center"><img src="<?php echo URLBASE; ?>/backend/uploads/profile-picture.png" alt="..." width="65" class="mr-3 rounded-circle img-thumbnail shadow-sm">
                        <div class="media-body">
                            <h4 class="m-0">Потребител</h4>
                            <p class="font-weight-light text-muted mb-0">Добре дошли</p>
                        </div>
                    </div>
                </div>

                <nav class="vertical">
                    <ul>
                        <li>
                            <a href="#">Категории</a>
                            <div>
                                <ul>
                                    <?php
                                    if ($result_categories->num_rows > 0) {
                                        while ($row = $result_categories->fetch_assoc()) {
                                            ?> 
                                            <li><a href="<?php echo URLBASE; ?>/backend/categories-template.php?id=<?php echo $row['id'] ?> "><?php echo $row['title']; ?></a></li>
                                            <?php
                                        }
                                    }
                                    ?> 
                                </ul>
                            </div>
                        </li>
                    </ul>
                </nav>


            </div>
        </div>
        <!-- КРАЙ НА ВЕРТИКАЛЕН НАВБАР -->


        <!-- ГОРЕН ЧЕРЕН НАВБАР СТАРТ-->
        <div class="site-header">
            <div class="header-top">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <div class="container-md">
                        <a class="navbar-brand" href="#"></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item">
                                    <a class="nav-link active" href="<?php echo URLBASE; ?>/backend/index.php"><i class="bi bi-shuffle"></i>  Начало</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src=""/> Книги
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                                        <?php
                                        if ($result_categories->num_rows > 0) {
                                            while ($row = $result_categories->fetch_assoc()) {
                                                ?> 
                                                <li><a href="<?php echo URLBASE; ?>/backend/categories-template.php?id=<?php echo $row['id'] ?> "><?php echo $row['title']; ?></a></li>
                                                <?php
                                            }
                                        }
                                        ?>   




                                        <!--                                        
                                                                                
                                                                                <li><a class="dropdown-item" href="#">Категория </a></li>
                                                                                <li><hr class="dropdown-divider"></li>-->

                                    </ul>
                                </li>


                            </ul>
                            <!-- NAVBAR RIGHT with command navbar-nav ms-auto-->
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#"><i class="bi bi-shuffle"></i>  За нас</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="<?php echo URLBASE; ?>/backend/contact.php""><i class="bi bi-heart-fill"></i>  Контакти</a>
                                </li>
                                <?php if (isset($_SESSION['login_user'])) { ?>
                                    <div class="profile">
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-person-fill"></i> Профил    <!--След логин се превръща в "Профил"-->
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <li><a class="dropdown-item" href="<?php echo URLBASE; ?>/backend/account.php">Моят профил</a></li> 
                                                <li><hr class="dropdown-divider"></li>
                                                <li><a class="dropdown-item" href="<?php echo URLBASE; ?>/backend/logout.php">Изход</a></li> 
                                                <li><hr class="dropdown-divider"></li>
                                            </ul>
                                        </li>
                                    </div>
                                <?php } else { ?>

                                    <div class="login">
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-person-fill"></i> Вход / Регистрация    <!--След логин се превръща в "Профил"-->
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <li><a class="dropdown-item" href="<?php echo URLBASE; ?>/backend/login.php">Вход</a></li>  <!-- След логин се превръща в "моят профил" -->
                                                <li><hr class="dropdown-divider"></li>
                                                <li><a class="dropdown-item" href="<?php echo URLBASE; ?>/backend/registration.php">Регистрация</a></li>  <!-- След логин се превръща в "Изход"-->
                                                <li><hr class="dropdown-divider"></li>
                                            </ul>
                                        </li>
                                    </div>

                                    <?php
                                }
                                
                                ?>


                            </ul>



                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="page-content p-1" id="content">
            <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-menu-2" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00b341" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <line x1="4" y1="6" x2="20" y2="6" />
                <line x1="4" y1="12" x2="20" y2="12" />
                <line x1="4" y1="18" x2="20" y2="18" />
                </svg></button> <br>
            <button id="cart" type="button" onclick="location.href = '<?php echo URLBASE; ?>/backend/checkout.php';" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00b341" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <circle cx="6" cy="19" r="2" />
                <circle cx="17" cy="19" r="2" />
                <path d="M17 17h-11v-14h-2" />
                <path d="M6 5l14 1l-1 7h-13" />
                </svg><span class="text-number">1</span></button>
        </div>


    </body>