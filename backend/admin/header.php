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
                    <a href="<?php echo URLBASE; ?>/backend/admin/index.php" class="nav-link text-dark font-italic bg-light">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00b341" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <polyline points="5 12 3 12 12 3 21 12 19 12" />
  <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
  <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
</svg>
                        Начало
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo URLBASE; ?>/backend/admin/add-book.php" class="nav-link text-dark font-italic">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00b341" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <line x1="12" y1="5" x2="12" y2="19" />
  <line x1="5" y1="12" x2="19" y2="12" />
</svg>
                        Добави книга
                    </a>
                </li>
<!--                <li class="nav-item">
                    <a href="<?php echo URLBASE; ?>/backend/admin/update-books.php" class="nav-link text-dark font-italic">
                        <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
                        Редактирай книга
                    </a>
                </li>-->
                <li class="nav-item">
                    <a href="<?php echo URLBASE; ?>/backend/admin/all-books.php" class="nav-link text-dark font-italic">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-book" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00b341" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0" />
  <path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0" />
  <line x1="3" y1="6" x2="3" y2="19" />
  <line x1="12" y1="6" x2="12" y2="19" />
  <line x1="21" y1="6" x2="21" y2="19" />
</svg>
                        Всички книги
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo URLBASE; ?>/backend/admin/all-authors.php" class="nav-link text-dark font-italic">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00b341" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <circle cx="9" cy="7" r="4" />
  <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
  <path d="M16 3.13a4 4 0 0 1 0 7.75" />
  <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
</svg>
                        Всички автори
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo URLBASE; ?>/backend/admin/all-categories.php" class="nav-link text-dark font-italic">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-list" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00b341" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <line x1="9" y1="6" x2="20" y2="6" />
  <line x1="9" y1="12" x2="20" y2="12" />
  <line x1="9" y1="18" x2="20" y2="18" />
  <line x1="5" y1="6" x2="5" y2="6.01" />
  <line x1="5" y1="12" x2="5" y2="12.01" />
  <line x1="5" y1="18" x2="5" y2="18.01" />
</svg>
                        Всички категории
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo URLBASE; ?>/backend/admin/all-users.php" class="nav-link text-dark font-italic">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alien" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00b341" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <path d="M11 17a2.5 2.5 0 0 0 2 0" />
  <path d="M12 3c-4.664 0 -7.396 2.331 -7.862 5.595a11.816 11.816 0 0 0 2 8.592a10.777 10.777 0 0 0 3.199 3.064c1.666 1 3.664 1 5.33 0a10.777 10.777 0 0 0 3.199 -3.064a11.89 11.89 0 0 0 2 -8.592c-.466 -3.265 -3.198 -5.595 -7.862 -5.595z" />
  <line x1="8" y1="11" x2="10" y2="13" />
  <line x1="16" y1="11" x2="14" y2="13" />
</svg>
                        Всички потребители
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo URLBASE; ?>/backend/admin/all-orders.php" class="nav-link text-dark font-italic">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-truck-delivery" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00b341" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <circle cx="7" cy="17" r="2" />
  <circle cx="17" cy="17" r="2" />
  <path d="M5 17h-2v-4m-1 -8h11v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5" />
  <line x1="3" y1="9" x2="7" y2="9" />
</svg>
                        Всички поръчки
                    </a>
                </li>
            </ul>



        </div>
        <!-- End vertical navbar -->





        <!-- ГОРЕН ЧЕРЕН НАВБАР КРАЙ-->


    </body>