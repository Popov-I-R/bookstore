<?php
require_once '../common/includes/dbconnect.php';
//require_once 'includes/check.php';
// define ('URLBASE', 'http://localhost/bookstore/') ;
 require_once 'header.php';
 
 
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
        <style>.nav-link {
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
        
        
        
        
        
        
        </style>
    </head>


<body>


<!-- ГОРЕН ЧЕРЕН НАВБАР СТАРТ-->
 <header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>
          <li><a href="#" class="nav-link px-2 text-white">Начална страница</a></li>
            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-currency-pound"></i> Всички категории 
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item" href="#"><i class="bi bi-currency-euro"></i> Fantasy</a></li>
                              <li><hr class="dropdown-divider"></li>
                              <li><a class="dropdown-item" href="#"> <i class="bi bi-currency-pound"> </i>Historical</a></li>
                              <li><hr class="dropdown-divider"></li>
                              <li><a class="dropdown-item" href="#"><i class="bi bi-currency-dollar"></i> Bestseller</a></li>
                            </ul>
            </li>
          <li><a href="#" class="nav-link px-2 text-white">Промоции</a></li>
          <li><a href="#" class="nav-link px-2 text-white">За нас</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Контакти</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control form-control-dark" placeholder="Търси книга..." aria-label="Search">
        </form>


        <div class="profile">
          <a class="btn btn-warning" href="<?php echo URLBASE; ?>/backend/.php" role="button">Профил</a>
          <a class="btn btn-warning" href="<?php echo URLBASE; ?>/backend/logout.php" role="button">Изход</a>
        </div>
          
          
          
          
         
<!--         <div class="profile"
          <a class="btn btn-warning" href="http://localhost/bookstore//backend/account.php#" role="button">Профил</a> 
        </div>    
        
        <div class="login">
          <a class="btn btn-warning" href="http://localhost/bookstore//backend/registration.php#" role="button">Изход</a>
        </div>-->
          

      </div>
    </div>
     
     
  </header>
  
<!-- ГОРЕН ЧЕРЕН НАВБАР КРАЙ-->

    
</body>