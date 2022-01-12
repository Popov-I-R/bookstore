<?php
require_once '../common/includes/dbconnect.php';
require_once 'header.php'; 
//require_once 'includes/check.php';
// define ('URLBASE', 'http://localhost/bookstore/') ;

 
?>
<head>
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
</head>
 <body>
    

<main>

<div class="page-content p-5" id="content">
    
    <h1>Категории</h1>
    
    
    <div class="categories">
        <img src="<?php echo URLBASE; ?>/backend/uploadsimages.jpg"  alt="harryP" width="250" height="300" onclick="location.href = '<?php echo URLBASE; ?>/backend/books-page.php';" style="cursor: pointer;">
        <div class="link"><a href="page-link">Фантастика</a></div>
    </div>
    
 </div>




</main>
     
     
     
     

<!--<footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
  </div>
</footer>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>-->

      
  </body>
</html>