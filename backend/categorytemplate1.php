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
    
    <div class="card" style="width: 18rem;">
  <img src="<?php echo URLBASE; ?>/backend/uploadsimages.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
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