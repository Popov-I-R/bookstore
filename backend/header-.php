<?php
require_once '../common/includes/dbconnect.php';
//require_once 'includes/check.php';
 define ('URLBASE', 'http://localhost/bookstore/') ;
 
 $sql_categories = "SELECT id, title FROM categories";
$result_categories = $conn->query($sql_categories);
 
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
.text-white:hover{        
color:#1ea3d7 !important
}
.btn-warning:hover{       
font-size:1.1rem
}
        
.category:hover{display:block !important;}        

        
        
        </style>
    </head>


<body>
    <div class="vertical-nav bg-white" id="sidebar">
  <div class="py-4 px-3 mb-4 bg-light">
    <div class="media d-flex align-items-center"><img src="https://bootstrapious.com/i/snippets/sn-v-nav/avatar.png" alt="..." width="65" class="mr-3 rounded-circle img-thumbnail shadow-sm">
      <div class="media-body">
        <h4 class="m-0">Username</h4>
        <p class="font-weight-light text-muted mb-0">User</p>
      </div>
    </div>
  </div>

  <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Main</p>

  <ul class="nav flex-column bg-white mb-0">
    <li class="nav-item">
      <a href="<?php echo URLBASE; ?>/backend" class="nav-link text-dark font-italic bg-light">
                <i class="fa fa-th-large mr-3 text-primary fa-fw"></i>
                Home
            </a>
    </li>
        <li class="nav-item">
      <a href="<?php echo URLBASE; ?>/backend/add-book.php" class="nav-link text-dark font-italic">
                <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
                Добави книга
            </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo URLBASE; ?>/backend/all-books.php" class="nav-link text-dark font-italic">
                <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
                Всички книги
            </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo URLBASE; ?>/backend/all-authors.php" class="nav-link text-dark font-italic">
                <i class="fa fa-cubes mr-3 text-primary fa-fw"></i>
                Всички автори
            </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo URLBASE; ?>/backend/all-categories.php" class="nav-link text-dark font-italic">
                <i class="fa fa-picture-o mr-3 text-primary fa-fw"></i>
                Всички категории
            </a>
    </li>
  </ul>



</div>
<!-- End vertical navbar -->

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
                                 Всички категории 
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                        <select class="form-control" id="category" name="categories[]">
                            <?php
                            if($result_categories->num_rows>0){
                                while($row = $result_categories->fetch_assoc()){
                                  ?> 
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['title'];?></option>
                                <?php
                                }
                            }
                            ?>
                        </select>

                            </ul>
            </li>
          <li><a href="#" class="nav-link px-2 text-white">Промоции</a></li>
          <li><a href="#" class="nav-link px-2 text-white">За нас</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Контакти</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control form-control-dark" placeholder="Търси книга..." aria-label="Search">
        </form>
          

<!---------------------------------------Проба за сесия login--------------->
          

          
        <div class="text-end">
          <a class="btn btn-warning" href="http://localhost/bookstore//backend/login.php#" role="button">Вход</a>
          <a class="btn btn-warning" href="http://localhost/bookstore//backend/registration.php#" role="button">Регистрация</a>
        </div>
      </div>
    </div>
     
     
  </header>
  
<!-- ГОРЕН ЧЕРЕН НАВБАР КРАЙ-->

    
</body>