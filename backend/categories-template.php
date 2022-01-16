<?php
require_once '../common/includes/dbconnect.php';
require_once 'header.php'; 

$category_id=$_GET['id'];
$query = "SELECT books.* "
        . "FROM books INNER JOIN book_category ON books.id = book_category.book_id "
        . "WHERE book_category.category_id = $category_id";

$result = $conn->query($query);


 
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
    
    
<h1>
    <?php 
    if ($category_id === "1") {
  echo "Фантастика";
}  elseif ($category_id === "2") {
  echo "История";
}  elseif ($category_id === "3") {
echo "Хазарт";
}  elseif ($category_id === "4") {
echo "Най-продавани";
}  elseif ($category_id === "5") {
echo "Трилър";
}  elseif ($category_id === "6") {
echo "Финанси";
}  elseif ($category_id === "7") {
echo "Медицина";
}  elseif ($category_id === "8") {
echo "Българска литература";
}  elseif ($category_id === "9") {
echo "Хумор/Смях";
}  elseif ($category_id === "10") {
echo "Хорър/Ужаси";
}  elseif ($category_id === "11") {
echo "Всичко друго";
}

else {
  echo "hell nah!";
}?>  
</h1> 
 

     
    
    <span>Категории</span>
    
    
    <div class="categories">
        <div class="row">
            <?php
            if($result->num_rows >0){
                while($row = $result->fetch_assoc()) { 
                    ?>
            <div class="col-4">
                <img src="<?php echo URLBASE. "/backend/uploads/" .$row['image']?>"  alt="harryP" width="250" height="300">
                <div class="link"><a href="page-link">Фантастика</a></div>
            </div>
            <?php }
            
                }
            ?>
            
        </div>
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