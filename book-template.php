<?php
require_once 'header.php';
require_once 'common/includes/dbconnect.php';

$book_id = $_GET['id'];

$sql = "SELECT books. *, book_author.author_id, book_category.category_id, publishers.title AS pub_title FROM books INNER JOIN book_author ON books.id = book_author.book_id INNER JOIN authors ON authors.id = book_author.author_id "
        . "INNER JOIN book_category ON books.id = book_category.book_id "
        . "INNER JOIN categories ON categories.id = book_category.category_id "
        . "INNER JOIN publishers ON publishers.id = books.publisher_id WHERE books.id=$book_id ";

$result = $conn->query($sql);

if (!$result)
    die("Fatal error");

$query_slide2 = "SELECT * FROM `books` WHERE id = 90; ";
$result_slide2 = $conn->query($query_slide2);

$query_slide3 = "SELECT * FROM `books` WHERE id = 76 ; ";
$result_slide3 = $conn->query($query_slide3);

$query_slide4 = "SELECT * FROM `books` WHERE id = 80; ";
$result_slide4 = $conn->query($query_slide4);





?>
<!doctype html>

<html> 

    <head>
        <style>

            .product-add-cart {
                text-decoration: none;
            }
            
            h3 {
                text-align: center;
            }
            
            .related_books {
                margin-top:5%;
                margin-bottom: 5%;
            }
            .col-lg-12 {
                margin-bottom: 3%;
            }
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
                                <form class="product-form">
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
                                                    <span class="productdata-info"> <?php echo $row_author['name']; ?></span>
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
                                    
                                    <input type="hidden" value="1" name="book_qty">
                                    <input type="hidden" value="<?php echo $row['id']; ?>" name="book_id">
                                    <div class="product-favourites-cart">
                                        <button type="submit"  class="mt-3 btn btn-outline-success add-cart">
                                            Добави в количката
                                        </button>
                                    </div> 
                                    <?php
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="related_books">
                    <div class="col-lg-12">
                        <h3>Подобни книги</h3>
                    </div>
                    <section class="hero-area hero-slider-4">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-10 offset-lg-1 ">
                                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-indicators">
                                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"  aria-label="Slide 2"></button>
                                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"  aria-label="Slide 3"></button>
                                        </div>
                                        <div class="carousel-inner">
                                           <div class="carousel-item active" data-bs-interval="4500">
                                                <?php
                                                if ($result_slide4->num_rows > 0) {
                                                    while ($row = $result_slide4->fetch_assoc()) {
                                                        ?>
                                                        <form class="product-form">
                                                            <div class="col d-flex align-items-start book-item">
                                                                <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                                                                    <img width="150" src="<?php echo URLBASE . '/backend/uploads/' . $row['image'] ?>">
                                                                </div>
                                                                <div>
                                                                    <h2> 
                                                                        <a href="<?php echo URLBASE ?>/book-template.php?id=<?php echo $row['id']; ?>">
                                                                            <?php echo htmlspecialchars($row['title']) ?></a>
                                                                    </h2>
                                                                    <?php $des = htmlspecialchars($row['description']) ?>
                                                                    <p><?php echo (strlen($des) > 200) ? substr($des, 0, 200) . '...' : $des ?></p>
                                                                    <h3><?php echo htmlspecialchars($row['price']) ?></h3>
                                                                    <input type="hidden" value="1" name="book_qty">
                                                                    <input type="hidden" value="<?php echo $row['id']; ?>" name="book_id">
                                                                    <button type="submit" class="mt-3 btn btn-primary add-cart">
                                                                        Добави в количката
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                            <div class="carousel-item" data-bs-interval="4500">
                                                <?php
                                                if ($result_slide3->num_rows > 0) {
                                                    while ($row = $result_slide3->fetch_assoc()) {
                                                        ?>
                                                        <form class="product-form">
                                                            <div class="col d-flex align-items-start book-item">
                                                                <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                                                                    <img width="150" src="<?php echo URLBASE . '/backend/uploads/' . $row['image'] ?>">
                                                                </div>
                                                                <div>
                                                                    <h2> 
                                                                        <a href="<?php echo URLBASE ?>/book-template.php?id=<?php echo $row['id']; ?>">
                                                                            <?php echo htmlspecialchars($row['title']) ?></a>
                                                                    </h2>
                                                                    <?php $des = htmlspecialchars($row['description']) ?>
                                                                    <p><?php echo (strlen($des) > 200) ? substr($des, 0, 200) . '...' : $des ?></p>
                                                                    <h3><?php echo htmlspecialchars($row['price']) ?></h3>
                                                                    <input type="hidden" value="1" name="book_qty">
                                                                    <input type="hidden" value="<?php echo $row['id']; ?>" name="book_id">
                                                                    <button type="submit" class="mt-3 btn btn-primary add-cart">
                                                                        Добави в количката
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                            <div class="carousel-item" data-bs-interval="4500">
                                                <?php
                                                if ($result_slide2->num_rows > 0) {
                                                    while ($row = $result_slide2->fetch_assoc()) {
                                                        ?>
                                                        <form class="product-form">
                                                            <div class="col d-flex align-items-start book-item">
                                                                <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                                                                    <img width="150" src="<?php echo URLBASE . '/backend/uploads/' . $row['image'] ?>">
                                                                </div>
                                                                <div>
                                                                    <h2> 
                                                                        <a href="<?php echo URLBASE ?>/book-template.php?id=<?php echo $row['id']; ?>">
                                                                            <?php echo htmlspecialchars($row['title']) ?></a>
                                                                    </h2>
                                                                    <?php $des = htmlspecialchars($row['description']) ?>
                                                                    <p><?php echo (strlen($des) > 200) ? substr($des, 0, 200) . '...' : $des ?></p>
                                                                    <h3><?php echo htmlspecialchars($row['price']) ?></h3>
                                                                    <input type="hidden" value="1" name="book_qty">
                                                                    <input type="hidden" value="<?php echo $row['id']; ?>" name="book_id">
                                                                    <button type="submit" class="mt-3 btn btn-primary add-cart">
                                                                        Добави в количката
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                            

                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <script>
  $(document).ready(function () {
        // update product quantity in cart
        $(".quantity").change(function () {
            var element = this;
            setTimeout(function () {
                update_quantity.call(element)
            }, 2000);
        });
        function update_quantity() {
            var pcode = $(this).attr("data-code");
            var quantity = $(this).val();
            $(this).parent().parent().fadeOut();
            $.getJSON("manage_cart.php", {"update_quantity": pcode, "quantity": quantity}, function (data) {
                window.location.reload();
            });
        }

        $(".product-form").submit(function (e) {
            var form_data = $(this).serialize();
            var button_content = $(this).find('button[type=submit]');
            button_content.html('Добави отново');

            $.ajax({
                url: "common/includes/manage-cart.php",
                type: "POST",
//            dataType: "json",
                data: form_data,
            }).done(function (data) {
                var data = JSON.parse(data);
                console.log(data);
                $("#cart-count").html(data.products);
                button_content.html('Добавено в количката');
            })
            e.preventDefault();
        });

        //Remove items from cart
        $("#shopping-cart-results").on('click', 'a.remove-item', function (e) {
            e.preventDefault();
            var pcode = $(this).attr("data-code");
            $(this).parent().parent().fadeOut();
            $.getJSON("manage_cart.php", {"remove_code": pcode}, function (data) {
                $("#cart-container").html(data.products);
                window.location.reload();
            });
        });
    });
        </script>
    </body>