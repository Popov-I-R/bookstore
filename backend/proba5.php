<?php

require_once 'header.php'; 

$query = "SELECT books.*, authors.name FROM books INNER JOIN book_author ON books.id = book_author.book_id INNER JOIN authors ON authors.id = book_author.author_id";
$result = $conn->query($query);

if(!$result)
    die("Fatal error");
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
 

<div class="page-content p-5" id="content">
<div class="box-container">
    <div class="box">
        <img src="<?php echo URLBASE; ?>/backend/uploadsimages.jpg" alt="harryp"> 
    </div>
    
    <div class="info">
         <div class="subInfo">
            <div class="price"> 
                Име променлива
            </div>
        </div>
        <div class="subInfo">
            <div class="price"> 
                Цена променлива
            </div>
        </div>
    </div>
    
</div>

</div>


</body>