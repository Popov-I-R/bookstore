<?php
require_once 'header.php';
?>

<div class="page-content p-1" id="content">


    <main>
        <div class="container px-4 py-5" id="hanging-icons">
            <h2 class="pb-2 border-bottom">Количка</h2>
        </div>
    </main>

    <?php
    if (isset($_SESSION["products"]) && count($_SESSION["products"]) > 0) {
        ?>
    <div class="col-lg-12">
        <table class="table" id="shopping-cart-results">
            <thead>
                <tr>
                    <th>Продукт</th>
                    <th>Единична цена</th>
                    <th>Количество</th>
                    <th>Крайна цена</th>
                    <th> </th>
                </tr>
            </thead>
            <tbody>
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
                    <tr>
                        <td><?php
                            echo $product_name;
                            ?></td>
                        <td><?php echo $product_price; ?></td>
                        <td><input type="number" 
                                   data-code="<?php echo $product_code; ?>" 
                                   class="form-control text-center quantity" value="<?php echo $product_qty; ?>"></td>
                        <td><?php
                            echo $currency = 'BGN ';
                            echo sprintf("%01.2f", ($product_price * $product_qty));
                            ?></td>
                        <td>				
                            <a href="#" class="btn btn-danger remove-item" 
                               data-code="<?php echo $product_code; ?>"><i 
                                    class="glyphicon glyphicon-trash"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            <tfoot>
            <br>
            <br>
            <tr>
                <td><a href="index.php" 
                       class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> 
                        Continue Shopping</a></td>
                <td colspan="2"></td>
                <?php
                if (isset($total)) {
                    ?>	
                    <td class="text-center cart-products-total"><strong>Total <?php echo sprintf("%01.2f", $total); ?> <?php echo $currency ?> </strong></td>
                    <td><a href="checkout.php" 
                           class="btn btn-success btn-block">Checkout <i 
                                class="glyphicon glyphicon-menu-right"></i></a></td>
                    <?php } ?>
            </tr>
            </tfoot>			
            <?php
        } else {
            echo "Your Cart is empty";
            ?>
            <tfoot>
            <br>
            <br>
            <tr>
                <td><a href="index.php" 
                       class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> 
                        Continue Shopping</a></td>
                <td colspan="2"></td>
            </tr>
            </tfoot>
        <?php } ?>				
        </tbody>
    </table>
        </div>
</div>


<script>

</script>