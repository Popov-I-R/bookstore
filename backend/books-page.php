<?php
require_once '../common/includes/dbconnect.php';
require_once 'header.php'; 
//require_once 'includes/check.php';
// define ('URLBASE', 'http://localhost/bookstore/') ;

 
?>
<head>
    <style>

    </style>
</head>
 <body>
    
<header>
</header>

<main>

<div class="page-content p-5" id="content">
    
    <div class="col-sm-12 col-xxl-12 col-xl-12 col-lg-12 col-sm-12">
        <div class="category-name">
            <h1>Съответна Категория</h1>
        </div>
    </div>

    <div class="card" style="width: 18rem;">
  <img src="<?php echo URLBASE; ?>/backend/uploadsimages.jpg"  alt="harryP" width="250" height="300" onclick="location.href = '<?php echo URLBASE; ?>/backend/book_template.php';" style="cursor: pointer;">
  <div class="card-body">
    <h5 class="card-title">Заглавие книга</h5>
        <div class="product-details-price-block">
            <span class="product-price">Цена: 13 BGN</span>
        </div>
    <a href="#" class="btn btn-primary">Купи</a>
    <a href="#" class="btn btn-primary">Добави в любими</a>
  </div>
    </div>
    
 </div>

</main>

<footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
  </div>
</footer>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>