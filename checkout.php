<?php
require_once 'header.php';
?>




<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <link href="common/assets/libs/css/cart.css" rel="stylesheet" type="text/css"/>
        <link href="common/assets/libs/js/cart.css" rel="stylesheet" type="text/css"/>


    </head>
    <body>

        <div class="page-content p-5" id="content">
<
            <div class="col-10">
                <?php
                if (isset($_SESSION["products"]) && count($_SESSION["products"]) > 0) {
                    ?> 


                    <?php
                    $cart_box = '<ul class="cart-products-loaded">';
                    $total = 0;
                    foreach ($_SESSION["products"] as $product) {
                        $product_name = $product["title"];
                        $product_price = $product["price"];
//                $product_code = $product["code"];
                        $product_qty = $product["book_qty"];
                        $subtotal = ($product_price * $product_qty);
                        $total = ($total + $subtotal);
                        ?>
                        <div class="basket">
                            <div class="basket-labels">
                                <ul>
                                    <li class="item item-heading">Заглавие</li>
                                    <li class="price">Цена</li>
                                    <li class="quantity">Количество</li>
                                    <li class="subtotal">Крайна цена</li>
                                </ul>
                            </div>
                            <div class="basket-product">
                                <div class="item">
                                    <div class="product-image">
                                        <img src="http://placehold.it/120x166" alt="Placholder Image 2" class="product-frame">
                                    </div>
                                    <div class="product-details">
                                        <h1><strong><span class="item-quantity"> <?php echo $product_qty ?> </span> x Автор </strong> <?php
                                            echo $product_name;
                                            ?></h1>
                                        <p>ISBN 213832234y32</p>
                                    </div>
                                </div>
                                <div class="price"><?php echo $product_price; ?></div>
                                <div class="quantity">
                                    <input type="number" value="<?php echo $product_qty ?>" min="$product_qty" class="quantity-field">
                                </div>
                                <div class="subtotal"><?php echo $subtotal ?></div>
                                <div class="remove">
                                    <button>Remove</button>
                                </div>
                            </div>

                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="2">
                    <div class="final">
                        <div class="summary-total-items"><span class="total-items"></span> Продукти във вашата количка</div>
                        <div class="summary-subtotal">
                            <div class="subtotal-title">Крайна цена</div>
                            <div class="subtotal-value final-value" id="basket-subtotal"><?php echo $total ?></div>
                        </div>
                        <div class="summary-delivery">

                        </div>
                        <div class="summary-total">
                            <div class="total-title">Total</div>
                            <div class="total-value final-value" id="basket-total"><?php echo $total ?></div>
                        </div>
                        <div class="summary-checkout">
                            <button class="checkout-cta">Направи поръчка</button>
                        </div>
                    </div>
                </div>











            </div>
        </body>

    </html>
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script><script  src="../common/assets/libs/js/cart.js" type="text/javascript"></script>

    </body>
    </html>
    <?php
}
?>

<script>

    /* Set values + misc */

    var fadeTime = 300;

    /* Assign actions */
    $('.quantity input').change(function () {
        updateQuantity(this);
    });

    $('.remove button').click(function () {
        removeItem(this);
    });

    $(document).ready(function () {
        updateSumItems();
    });

    /* Recalculate cart */
    function recalculateCart(onlyTotal) {
        var subtotal = 0;

        /* Sum up row totals */
        $('.basket-product').each(function () {
            subtotal += parseFloat($(this).children('.subtotal').text());
        });

        /* Calculate totals */
        var total = subtotal;

        //If there is a valid promoCode, and subtotal < 10 subtract from total
        var promoPrice = parseFloat($('.promo-value').text());
        if (promoPrice) {
            if (subtotal >= 10) {
                total -= promoPrice;
            } else {
                alert('Order must be more than £10 for Promo code to apply.');
                $('.summary-promo').addClass('hide');
            }
        }

        /*If switch for update only total, update only total display*/
        if (onlyTotal) {
            /* Update total display */
            $('.total-value').fadeOut(fadeTime, function () {
                $('#basket-total').html(total.toFixed(2));
                $('.total-value').fadeIn(fadeTime);
            });
        } else {
            /* Update summary display. */
            $('.final-value').fadeOut(fadeTime, function () {
                $('#basket-subtotal').html(subtotal.toFixed(2));
                $('#basket-total').html(total.toFixed(2));
                if (total == 0) {
                    $('.checkout-cta').fadeOut(fadeTime);
                } else {
                    $('.checkout-cta').fadeIn(fadeTime);
                }
                $('.final-value').fadeIn(fadeTime);
            });
        }
    }

    /* Update quantity */
    function updateQuantity(quantityInput) {
        /* Calculate line price */
        var productRow = $(quantityInput).parent().parent();
        var price = parseFloat(productRow.children('.price').text());
        var quantity = $(quantityInput).val();
        var linePrice = price * quantity;

        /* Update line price display and recalc cart totals */
        productRow.children('.subtotal').each(function () {
            $(this).fadeOut(fadeTime, function () {
                $(this).text(linePrice.toFixed(2));
                recalculateCart();
                $(this).fadeIn(fadeTime);
            });
        });

        productRow.find('.item-quantity').text(quantity);
        updateSumItems();
    }

    function updateSumItems() {
        var sumItems = 0;
        $('.quantity input').each(function () {
            sumItems += parseInt($(this).val());
        });
        $('.total-items').text(sumItems);
    }

    /* Remove item from cart */
    function removeItem(removeButton) {
        /* Remove row from DOM and recalc cart total */
        var productRow = $(removeButton).parent().parent();
        productRow.slideUp(fadeTime, function () {
            productRow.remove();
            recalculateCart();
            updateSumItems();
        });
    }








</script>