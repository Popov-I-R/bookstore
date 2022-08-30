<?php
require_once 'header.php';
require_once 'common/includes/dbconnect.php';
?>


<?php include('common/includes/container.php'); ?>
<head>
    <style>
        #purchase {
            text-align: right;
        }

        #tableprice {
            text-align: center;
        }

    </style>

</head>

<div class="page-content p-1" id="content">
    <div class='row-g-4'>
        <div class='col-md-12' >
            <div class="container">	
                <h3 style="text-align:left">Преглед</h3>
                <?php
                if (isset($_SESSION["products"]) && count($_SESSION["products"]) > 0) {
                    $total = 0;
                    $list_tax = '';
                    ?>	
                    <div style="overflow-x:auto;">
                        <table class="table" id="shopping-cart-results">
                            <thead>
                                <tr>
                                    <th>Продукт</th>
                                    <th>Единична цена</th>
                                    <th>Количество</th>
                                    <th>Крайна цена</th>	
                                    <th>&nbsp;</th>				
                                </tr>
                            </thead>
                            <tbody>				
                                <?php
                                $cart_box = '';
                                foreach ($_SESSION["products"] as $product) {
                                    $product_name = $product["title"];
                                    $product_qty = $product["book_qty"];
                                    $product_price = $product["price"];
                                    $product_code = $product["book_id"];
                                    $item_price = sprintf("%01.2f", ($product_price * $product_qty));
                                    $currency = 'лв. ';
                                    ?>
                                    <tr>
                                        <td><?php echo $product_name; /* echo "&mdash;"; */ ?></td>
                                        <td><?php echo $product_price; ?></td>
                                        <td><?php echo $product_qty; ?></td>
                                        <td><?php echo sprintf("%01.2f", ($product_price * $product_qty)) ?> <?php echo $currency; ?></td>
                                        <td>&nbsp;</td>
                                    </tr>				
                                    <?php
                                    $subtotal = ($product_price * $product_qty);
                                    $total = ($total + $subtotal);
                                }
                                $grand_total = $total;

                                $cart_box .= "<span>  $list_tax <hr>Дължима сума : " . sprintf("%01.2f", $grand_total) . " $currency </span>";
                                ?>
                            <tfoot>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td class="text-center view-cart-total"  id="tableprice" ><strong><?php echo $cart_box; ?></strong></td>	                        
                                </tr>
                            </tfoot>	
                            <?php
                        } else {
                            echo "Вашата количка е празна";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class='col-12' >

        </div>
    </div>
    <form class="row g-3 needs-validation" novalidate>
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">Име и фамилия</label>
            <input type="text" class="form-control" id="validationCustom01" value="" required>
            <div class="valid-feedback">
                Всичко е наред!
            </div>
            <div class="invalid-feedback">
                <!--                        Моля въведете име и фамилия-->
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">E-mail</label>
            <input type="text" class="form-control" id="validationCustom02" value="" required>
            <div class="valid-feedback">
                Всичко е наред!
            </div>
            <div class="invalid-feedback">
                <!--                        Моля въведете е-mail-->
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustomUsername" class="form-label">Потребителско име</label>
            <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend">@</span>
                <input type="text" class="form-control" id="validationCustomUsername" placeholder="Изключено" aria-describedby="inputGroupPrepend" value="" disabled>
                <div class="invalid-feedback">
                    Моля въведете потребителско име
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <label for="validationCustom03" class="form-label">Адрес</label>
            <input type="text" class="form-control" id="validationCustom03" required>
            <div class="invalid-feedback">
                Моля въведете вашият адрес
            </div>
        </div>
        <div class="col-md-3">
            <label for="validationCustom04" class="form-label">Град</label>
            <select class="form-select" id="validationCustom04" required>
                <option selected disabled value="">Избери...</option>
                <option>София</option>
                <option>Враца</option>
                <option>Бургас</option>
                <option>Пловдив</option>
            </select>
            <div class="invalid-feedback">
                Моля въведете вашият град
            </div>
        </div>
        <div class="col-md-3">
            <label for="validationCustom05" class="form-label">Номер за връзка</label>
            <input type="text" class="form-control" id="validationCustom05" placeholder="+359" value="" required>
            <div class="invalid-feedback">
                Моля въведете вашият номер
            </div>
        </div>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                <label class="form-check-label" for="invalidCheck">
                    Съгласявам се с условията на сайта.
                </label>
                <div class="invalid-feedback">
                    Трябва да се съгласите с условията на сайта преди да продължите.
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6" id="back">
                <a href="<?php echo URLBASE; ?>/categories-template.php?id=1"  class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Продължи пазаруването</a>
            </div>
            <div class="col-6" id="purchase">
                <button class="btn btn-success" type="submit">Направи поръчка</button>
            </div>

        </div>
        <?php
        ?>
    </form>
</div>



<?php /* include footer */ ?>

<script>

// Example starter JavaScript for disabling form submissions if there are invalid fields
    // wait for page to load then run the code inside 
    window.onload = () => {
        // Select the form we want to validate
        let form = document.querySelector('form');
        // listen for submit event
        form.onsubmit = (event) => {
            // prevent the form from posting so the page won't refresh
            event.preventDefault();
            // debugging log statememnet  (not needed)
            console.log('Form submitted')
            // checking for form validation
            if (form.checkValidity() === false) {
                // if we're inside this if statement, the form is invalid
                // we add the boostrap class to handle styling
                form.classList.add('was-validated');
                // debugging log statememnet  (not needed)
                console.log('Form not valid')
            } else {
                // if we're inside this if statement, the form is valid and ready for further actions
                // debugging log statememnet  (not needed)
                console.log('Form valid')
                // redirect to the target page
                location.href = "<?php echo URLBASE; ?>/success.php"
            }
        }
    };
</script>
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
            button_content.html('Adding...');

            $.ajax({
                url: "common/includes/manage-cart.php",
                type: "POST",
                data: form_data,
            }).done(function (data) {
                var data = JSON.parse(data);
                console.log(data);
                $("#cart-count").html(data.products);
                button_content.html('Add to Cart');
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