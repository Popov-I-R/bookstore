<?php
require_once 'header.php';

//$query = "SELECT books.*, authors.name FROM books INNER JOIN book_author ON books.id = book_author.book_id INNER JOIN authors ON authors.id = book_author.author_id";
//$result = $conn->query($query);
//$query_info ="SELECT books.id, books.title, books.image. books.price, categories.name FROM books INNER JOIN book_category";
//$result_info = $conn->query($query);

$book_id = $_GET['id'];

$sql = "SELECT books. *, book_author.author_id, book_category.category_id, publishers.title AS pub_title FROM books INNER JOIN book_author ON books.id = book_author.book_id INNER JOIN authors ON authors.id = book_author.author_id "
        . "INNER JOIN book_category ON books.id = book_category.book_id "
        . "INNER JOIN categories ON categories.id = book_category.category_id "
        . "INNER JOIN publishers ON publishers.id = books.publisher_id WHERE books.id=$book_id ";

$result = $conn->query($sql);

if (!$result)
    die("Fatal error");
?>
<!doctype html>

<html> 

    <head>
        <!--        <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                bootstrap css
        
                <link href="../common/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
                font awesome
                <link href="../common/assets/vendor/font-awesome/css/all.min.css" rel="stylesheet" type="text/css"/>
                theme css
                <link href="../common/assets/libs/css/vertical-categories.css" rel="stylesheet" type="text/css"/>
                <link href="../common/assets/libs/css/style-vertical-nav.css" rel="stylesheet" type="text/css"/>
                bootstrap bundle
                <script src="../common/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
                jquery 3.6.0
                <script src="../common/assets/vendor/jquery/jquery-3.6.0.min.js" type="text/javascript"></script>
                theme js
                <script src="../common/assets/libs/js/javascript.js" type="text/javascript"></script>-->
        <style>
            /*            .nav-link {
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
                    
            .category:hover{display:block !important;}        */



        </style>
    </head>


    <body>

        <div class="page-content p-1" id="content">


            <div class="container">
                <div class="row">
                    <?php
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        ?>
                        <div class="col-sm-5 col-xxl-5 col-xl-5 col-lg-5 col-sm-4">
                            <div class="product-details-image">
                                <section class="regular slider">
                                    <div>
                                        <img class="product-details-slider-img" src="<?php echo URLBASE . "/backend/uploads/" . $row['image'] ?>" alt="Cover image">
                                    </div>
                                </section>
                            </div>

                        </div>

                        <div class="col-sm-7 col-xxl-7 col-xl-7 col-lg-7 col-sm-7">
                            <div class="product-details-info">

                                <div class="row">
                                    <h3 class="product-title"><?php echo $row['title'] ?> </h3>
                                </div>
                                <?php
                                $author_id = $row['author_id'];

                                $sql_authors = "SELECT name FROM authors WHERE id=$author_id";
                                $result_authors = $conn->query($sql_authors);
                                ?>
                                <ul class="product-data-info">
                                    <li class="product-datainfo">Автор:
                                    <?php
                                    if ($result_authors->num_rows > 0) {
                                        while ($row_author = $result_authors->fetch_assoc()) {
                                            ?>
                                        <span class="productdata-info"> <?php echo $row_author['name'] ;?></span>
                                            <?php
                                        }
                                    }
                                    ?>
                                            </li>
                                    <li class="product-datainfo">ISBN: <span class="productdata-info"> <?php echo $row['isbn'] ?></span></li>
                                    <li class="product-datainfo">Издател:

                                        <span class="productdata-info"> <?php echo $row['pub_title'] ?></span></li>

                                    <li class="product-datainfo">Година на издаване: <span class="productdata-info"><?php echo $row['year'] ?></span></li>
                                </ul>
                                <div class="product-details-price-block">
                                    <span class="product-price"> Цена: <?php echo $row['price'] ?> лв.</span>
                                </div>

                                <div class="product-details-data-info">
                                    <h4 class="sr-only">Product Summary</h4>
                                    <p><?php echo $row['description'] ?></p>
                                </div>
                                <div class="col-sm-6 col-xxl-6 col-xl-6 col-lg-6">
                                    <div class="product-add-to-cart">
                                        <div class="product-addtocart">
                                            <span class="product-add-quantity">Количество:</span>
                                            <input type="number" class="form-control text-center" value="1">
                                        </div>
                                        <!--                                <div class="product-add-to-cart-add-cart-btn">
                                                                            <a href="#" class="btn btn-outlined--primary"><span class="product-add-plus">+</span>Add to
                                                                                Cart</a>
                                                                        </div>-->
                                    </div>    
                                </div>
                                <div class="product-favourites-cart">
                                    <a href="" class="product-add-cart"><i class=""></i>Добави в количката</a>
                                    <a href="" class="product-add-favourites"><i class=""></i>Добави в любими</a>
                                </div> 
    <?php
}
?>
                        </div>
                    </div>


                </div>

            </div>

        </div>

    </body>