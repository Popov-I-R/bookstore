<?php
//
require_once 'common/includes/dbconnect.php';
require_once 'header.php';

$category_id = $_GET['id'];
$query = "SELECT books.* "
        . "FROM books INNER JOIN book_category ON books.id = book_category.book_id "
        . "WHERE book_category.category_id = $category_id";
$result = $conn->query($query);

?>
<head>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900');

       

        h3.h3 {
            text-align: center;
            margin-bottom: 5rem;
            margin-top: 1rem;
            text-transform: capitalize;
            font-size: 5vw;
            color:black;
            font-style: oblique;
            font-size: -webkit-xxx-large;
            font-weight: bold;  
        }
        
        .product-content {
            min-height: 140px;
        }

        .product-grid6,
        .product-grid6 .product-image6 {
            overflow: hidden
        }

        .product-grid6 {
            font-family: 'Open Sans', sans-serif;
            text-align: center;
            position: relative;
            transition: all .5s ease 0s;
        }

        .product-grid6:hover {
            box-shadow: 0 0 20px rgba(0, 0, 0, .3)
        }

        .product-grid6 .product-image6 a {
            display: block
        }

        .product-grid6 .product-image6 img {
            width: 100%;
            height: auto;
            transition: all .5s ease 0s
        }

        .product-grid6:hover .product-image6 img {
            transform: scale(1.1)
        }

        .product-grid6 .product-content {
            padding: 12px 12px 15px;
            transition: all .5s ease 0s;
            background-color: #347e952b
        }

        .product-grid6:hover .product-content {
            opacity: 0
        }

        .product-grid6 .title {
            font-size: 20px;
            font-weight: 600;
            text-transform: capitalize;
            margin: 0 0 10px;
            transition: all .3s ease 0s
        }

        .product-grid6 .title a {
            color: #000;
            text-decoration: none;

        }

        .product-grid6 .title a:hover {
            color: #2e86de
        }

        .product-grid6 .price {
            font-size: 18px;
            font-weight: 600;
            color: black
        }

        .product-grid6 .social {
            background-color: transparent;
            width: 100%;
            padding: 0;
            margin: 0;
            list-style: none;
            opacity: 0;
            transform: translateX(-50%);
            position: absolute;
            bottom: -50%;
            left: 50%;
            z-index: 1;
            transition: all .5s ease 0s
        }

        .product-grid6:hover .social {
            opacity: 10;
            bottom: 20px
        }

        .product-grid6 .social li {
            display: inline-block
        }

        .product-grid6 .social li a {
            color: white;
            font-size: 16px;
            line-height: 45px;
            text-align: center;
            height: 45px;
            width: 45px;
            margin: 0 7px;
            border: 1px solid white;
            border-radius: 50px;
            display: block;
            position: relative;
            transition: all .3s ease-in-out
        }

        .product-grid6 .social li a:hover {
            color: #fff;
            background-color: #2e86de;
            width: 80px
        }

        .product-grid6 .social li a:after,
        .product-grid6 .social li a:before {
            content: attr(data-tip);
            color: #fff;
            background-color: #2e86de;
            font-size: 12px;
            letter-spacing: 1px;
            line-height: 20px;
            padding: 1px 5px;
            border-radius: 5px;
            white-space: nowrap;
            opacity: 0;
            transform: translateX(-50%);
            position: absolute;
            left: 50%;
            top: -30px
        }

        .product-grid6 .social li a:after {
            content: '';
            height: 15px;
            width: 15px;
            border-radius: 0;
            transform: translateX(-50%) rotate(45deg);
            top: -20px;
            z-index: -1
        }

        .product-grid6 .social li a:hover:after,
        .product-grid6 .social li a:hover:before {
            opacity: 1
        }

        @media only screen and (max-width:990px) {
            .product-grid6 {
                margin-bottom: 30px
            }
            #categoryname {
                max-width: 550px;

            }
        }
        
    </style>


</head>
<body>
    <main>
        <div class="page-content p-1" id="content">
            <div class="container" style="margin-bottom: 2%;">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="h3" id="categoryname">
                            <?php
                            if ($category_id === "1") {
                                echo "Фантастика";
                            } elseif ($category_id === "2") {
                                echo "История";
                            } elseif ($category_id === "3") {
                                echo "Компютри/Програмиране";
                            } elseif ($category_id === "4") {
                                echo "Психология";
                            } elseif ($category_id === "5") {
                                echo "Трилър";
                            } elseif ($category_id === "6") {
                                echo "Икономика и бизнес";
                            } elseif ($category_id === "7") {
                                echo "Медицина";
                            } elseif ($category_id === "8") {
                                echo "Българска литература";
                            } elseif ($category_id === "9") {
                                echo "Хумор/Смях";
                            } elseif ($category_id === "10") {
                                echo "Хорър/Ужаси";
                            } elseif ($category_id === "11") {
                                echo "Всичко друго";
                            } else {
                                echo "hell nah!";
                            }
                            ?>   </h3>
                    </div>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <div class="col-md-3 col-sm-6" style="margin-bottom:1.5%;">
                                <div class="product-grid6">
                                    <form class="product-form">
                                        <div class="product-image6">
                                            <a href="<?php echo URLBASE; ?>/book-template.php?id=<?php echo $row['id'] ?>">
                                                <img class="pic-1" src="<?php echo URLBASE . "/backend/uploads/" . $row['image'] ?>"  alt="harryP" width="335" height="500">
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <h3 class="title"><a href="#"><?php echo $row['title'] ?></a></h3>
                                            <div class="price">
                                                <span><?php echo $row['price'] . ' лв.'; ?> </span>
                                            </div>
                                            <input type="hidden" value="1" name="book_qty">
                                            <input type="hidden" value="<?php echo $row['id']; ?>" name="book_id">

                                        </div>

                                        <ul class="social">
                                            <button type="submit"  class="mt-3 btn btn-outline-success add-cart">
                                                Добави в количката
                                            </button>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
</main>




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
</html>
