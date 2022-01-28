<?php

require_once 'header.php';

$query = "SELECT books.* FROM books LIMIT 3";
$result = $conn->query($query);


?>

<html>
    <head>

        <style>

           
            
            
            
            
            .carousel-caption {
                position: absolute;
                bottom: 44%;
                left: -42%;
                font-size: 30px;
                color: #cc00ff
            }

            .carousel-caption1 {
                position: absolute;
                bottom: 34%;
                left: -2%;
                font-size: 21%;
                font-style: italic;
                color: #00ffe7;
                text-shadow: 0 9px 7px rgb(0 0 0 / 60%);
                margin-right: 37rem;
                margin-left: 4.9rem;
                line-height: 0 !important;
            }

            .slider-btn a{
                position: absolute;
                color: #00fdf1;
                border-color: #ce00ff;
                text-decoration: none;
                left: 35%;
                bottom: 25%;
                border-style: solid;
                padding-left: 15px;
                padding-right: 15px;
                padding-top: 1px;
                padding-bottom: 1px;
                border-radius: 0.35rem;
                font-size: 23px;
            }
            

            .slider-btn a:hover{
                background-color: #1cb94e;
                color: black;

                padding-left: 19px;
                padding-right: 17px;
                padding-top: 2px;
                padding-bottom: 2px;
                border-radius: 0.45rem;

            }

            .carousel-captionslide2 {
    position: absolute;
    bottom: 42%;
    left: 13%;
    /* font-size: 22%; */
    font-family: serif;
    font-style: italic;
    color: #ffffff;
            }
            .carousel-captionslide2> p {
                font-size: 65px;
                text-shadow: 0 7px 4px rgb(0 0 0 / 60%);
            }

            .carousel-caption1slide2 {
    position: absolute;
    bottom: 32%;
    left: -16%;
    font-size: 12px;
    font-family: serif;
    font-style: italic;
    color: white;
    text-shadow: 0 8px 25px rgb(0 0 0 / 60%);
    margin-left: 34%;
    margin-right: 48%;
            }

            .slider-btnslide2 a{
    position: absolute;
    color: rgb(253 253 253);
    /* background-color: yellow; */
    border-color: #7ca503;
    border-style: solid;
    width: 15;
    text-decoration: none;
    left: 34%;
    bottom: 26%;
    padding-left: 20px;
    padding-right: 20px;
    padding-top: 2px;
    padding-bottom: 2px;
    border-radius: 0.35rem;
    font-size: 97%;
            }

            .slider-btnslide2 a:hover{
                border-color: yellow;
                background-color: #ffffff;
                color: black;
                padding-left: 25px;
                padding-right: 23px;
                padding-top: 3px;
                padding-bottom: 3px;
                border-radius: 0.55rem;

            }
            
            .carousel-captionslide3 {
    position: absolute;
    bottom: 68%;
    left: 15%;
    /* font-size: 22%; */
    font-family: serif;
    font-style: italic;
    color: #000000;
            }
            .carousel-captionslide3> h2 {
font-size: 284%;
    text-shadow: 0 17px 4px rgb(103 5 33 / 81%);
            }

            .carousel-caption1slide3 {
position: absolute;
    bottom: 48%;
    left: -20%;
    font-size: 12px;
    font-family: serif;
    font-style: italic;
    color: white;
    text-shadow: 4 33px 45px rgb(0 22 41 / 63%);
    margin-left: 34%;
    margin-right: 48%;
            }

            .slider-btnslide3 a{
position: absolute;
    color: rgb(255 254 254);
    /* background-color: yellow; */
    border-color: #a50303;
    border-style: solid;
    width: 15;
    text-decoration: none;
    left: 38%;
    bottom: 22%;
    padding-left: 20px;
    padding-right: 20px;
    padding-top: 2px;
    padding-bottom: 2px;
    border-radius: 0.35rem;
    font-size: 95%;
            }

            .slider-btnslide3 a:hover{
                border-color: yellow;
                background-color: #ffffff;
                color: black;
                padding-left: 25px;
                padding-right: 23px;
                padding-top: 3px;
                padding-bottom: 3px;
                border-radius: 0.55rem;

            }
            
            .shop-image {
                margin-right: 15px;
            }

            .carousel-inner {
                height: 543px;
            }
            
            
            
        </style>
    </head>
    <body>

        <!-- Page content holder -->
        <div class="page-content p-1" id="content">

            <!--  <div class="separator"></div>-->

            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
<!--                    <form class="product-form">
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
                                    Add to cart
                                </button>
                            </div>
                        </div>
                    </form>-->
                    <?php
                }
            }
            ?>
            
            
            
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
                                   
                                    <div class="carousel-item active" data-bs-interval="1333000">
                                         
                                        <img src="<?php echo URLBASE; ?>/backend/uploads/fantasy1.jpg" class="d-block w-100" alt="reading1">
                                        <div class="carousel-caption">
                                            <h2>Фантастика</h2>
                                        </div>
                                        <div class="carousel-caption1">
                                            <p>За всички имащи въображение</p>
                                        </div>
                                        <div class="slider-btn">
                                            <a href="<?php echo URLBASE; ?>/categories-template.php?id=1">Пазарувай сега</a>
                                        </div>

                                    </div>
                                    <div class="carousel-item" data-bs-interval="111113000">
                                        <img src="<?php echo URLBASE; ?>/backend/uploads/history1.jpg" class="d-block w-100" alt="reading2">
                                        <div class="carousel-captionslide2">
                                            <h2>История</p></h2>
                                        </div>
                                        <div class="carousel-caption1slide2">
                                            <p>Защото не трябва да забравяме от къде сме тръгнали...</p>
                                        </div>
                                        <div class="slider-btnslide2">
                                            <a href="<?php echo URLBASE; ?>/categories-template.php?id=2">Пазарувай сега</a>
                                        </div>
                                    </div>
                                    <div class="carousel-item" data-bs-interval="111113000">
                                        <img src="<?php echo URLBASE; ?>/backend/uploads/horror.jpg" class="d-block w-100" alt="reading3">
                                        <div class="carousel-captionslide3">
                                            <h2>Ужаси</h2>
                                        </div>
                                        <div class="carousel-caption1slide3">
                                            <p>На неподходящото място... <br> в неподходящият момент...</p>
                                        </div>
                                        <div class="slider-btnslide3">
                                            <a href="<?php echo URLBASE; ?>/categories-template.php?id=10">Пазарувай сега</a>
                                        </div>
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

        <!--END-->

    </body>

</html>



<?php
include_once 'footer.php';



?>
<script>
   
</script>