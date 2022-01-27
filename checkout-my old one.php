<?php
require_once 'header.php';
?>




<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <link href="../common/assets/libs/css/cart.css" rel="stylesheet" type="text/css"/>


    </head>
    <body>

        <div class="page-content p-5" id="content">
            <main>
                <row>
                <div class="basket">
                    <div class="basket-labels">
                        <ul>
                            <li class="item item-heading">Продукт</li>
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
                                <h1><strong><span class="item-quantity">4</span> x Автор </strong> Име на книга</h1>
                                <p>ISBN 213832234y32</p>
                            </div>
                        </div>
                        <div class="price">26.00</div>
                        <div class="quantity">
                            <input type="number" value="4" min="1" class="quantity-field">
                        </div>
                        <div class="subtotal">104.00</div>
                        <div class="remove">
                            <button>Remove</button>
                        </div>
                    </div>

                </div>
                <aside>
                    <div class="summary">
                        <div class="summary-total-items"><span class="total-items"></span> Продукти във вашата количка</div>
                        <div class="summary-subtotal">
                            <div class="subtotal-title">Крайна цена</div>
                            <div class="subtotal-value final-value" id="basket-subtotal">130.00</div>
                        </div>
                        <div class="summary-delivery">

                        </div>
                        <div class="summary-total">
                            <div class="total-title">Total</div>
                            <div class="total-value final-value" id="basket-total">130.00</div>
                        </div>
                        <div class="summary-checkout">
                            <button class="checkout-cta">Направи поръчка</button>
                        </div>
                    </div>
                </aside>
                    </row>
                <row>
                    <div class="col-12">
                        
                    </div>
                        
                </row>
            </main>
        </div>
    </body>

</html>
<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script><script  src="../common/assets/libs/js/cart.js" type="text/javascript"></script>

</body>
</html>
