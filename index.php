<?php
require_once 'header.php';

$query = "SELECT * FROM `books` WHERE id BETWEEN 101 AND 102 ; ";
$result = $conn->query($query);

$query_slide = "SELECT * FROM `books` WHERE id BETWEEN 90 AND 91 ; ";
$result_slide = $conn->query($query_slide);

$query_slide3 = "SELECT * FROM `books` WHERE id BETWEEN 95 AND 96 ; ";
$result_slide3 = $conn->query($query_slide3);

$query_slide4 = "SELECT * FROM `books` WHERE id BETWEEN 116 AND 117; ";
$result_slide4 = $conn->query($query_slide4);
?>

<html>
    <head>
        <style>
            /*START CAROUSEL BOOKS*/

            h1 {
                text-align: center;
            }
            
            .actual_books {
                margin-top:5%;
                margin-bottom: 10%;
            }
            .col-lg-12 {
                margin-bottom: 3%;
                padding-bottom:3%;
                border-bottom: 1px solid #dee2e6 !important;
            }

            a {
                text-decoration: none;
            }

                /*END CAROUSEL BOOKS*/

                /*START LOGO*/

                #canvas-container-1{
                    margin-left:50%;
                    max-height: 255px;
                    max-width: 255px;
                    background: black;
                }

                #canvas-1{
                    display: block;
                    position: relative;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    width:255px;
                    height:255px;
                }

                .canvas-stats {
                    display:none;
                }

            </style>
        </head>
        <body>

            <!-- Page content holder -->
            <div class="page-content p-1" id="content">
                <div class="row">
                    <div class="actual books">
                        <div class="col-lg-12">
                            <h1>Актуални книги</h1>
                        </div>

                        <section class="hero-area hero-slider-4">
                            <div class="container">
                                <div class="row ">
                                    <div class="col-lg-12">
                                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-indicators">
                                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"  aria-label="Slide 2"></button>
                                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"  aria-label="Slide 3"></button>
                                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"  aria-label="Slide 4"></button>
                                            </div>
                                            <div class="carousel-inner">

                                                <div class="carousel-item active" data-bs-interval="4500">
                                                    <?php
                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
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
                                                                        <h3><?php echo htmlspecialchars($row['price']) . ' лв.' ?></h3>
                                                                        <input type="hidden" value="1" name="book_qty">
                                                                        <input type="hidden" value="<?php echo $row['id']; ?>" name="book_id">
                                                                        <button type="submit" class="mt-3 btn btn-outline-success add-cart">
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
                                                    if ($result_slide->num_rows > 0) {
                                                        while ($row = $result_slide->fetch_assoc()) {
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
                                                                        <h3><?php echo htmlspecialchars($row['price']) .  ' лв.' ?></h3>
                                                                        <input type="hidden" value="1" name="book_qty">
                                                                        <input type="hidden" value="<?php echo $row['id']; ?>" name="book_id">
                                                                        <button type="submit" class="mt-3 btn btn-outline-success add-cart">
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
                                                                        <h3><?php echo htmlspecialchars($row['price']).  ' лв.' ?></h3>
                                                                        <input type="hidden" value="1" name="book_qty">
                                                                        <input type="hidden" value="<?php echo $row['id']; ?>" name="book_id">
                                                                        <button type="submit" class="mt-3 btn btn-outline-success add-cart">
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
                                                                        <h3><?php echo htmlspecialchars($row['price']).  ' лв.' ?></h3>
                                                                        <input type="hidden" value="1" name="book_qty">
                                                                        <input type="hidden" value="<?php echo $row['id']; ?>" name="book_id">
                                                                        <button type="submit" class="mt-3 btn btn-outline-success add-cart">
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

            <!--END-->

        </body>

    </html>

    <?php
    include_once 'footer.php';
    ?>
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
  
