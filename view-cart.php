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
            <div style="overflow-x:auto;">
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
                            $product_code = $product["book_id"];
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
                                    echo sprintf("%01.2f", ($product_price * $product_qty));
                                    echo $currency = ' лв.';
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
                        <td><a href="<?php echo URLBASE; ?>/categories-template.php?id=1" 
                               class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> 
                                Продължи пазаруването</a></td>
                        <td colspan="2"></td>
                        <?php
                        if (isset($total)) {
                            ?>	
                            <td class="text-center cart-products-total"><strong>Общо <?php echo sprintf("%01.2f", $total); ?> <?php echo $currency ?> </strong></td>
                            <?php if (isset($_SESSION['login_user'])) { ?>
                                <td><a href="checkout.php" 
                                       class="btn btn-success btn-block">Продължи (като потребител)<i 
                                            class="glyphicon glyphicon-menu-right"></i></a></td>
                                <?php } else { ?>
                                <td><a href="checkout_guest.php" 
                                       class="btn btn-success btn-block">Продължи (като гост) <i 
                                            class="glyphicon glyphicon-menu-right"></i></a></td>
                                <?php
                            }
                            ?>

                        <?php } ?>
                    </tr>
                    </tfoot>			
                    <?php
                } else {
                    echo "Вашата количка е празна";
                    ?>
                    <tfoot>
                    <br>
                    <br>
                    <tr>
                        <td><a href="index.php" 
                               class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> 
                                Продължете пазаруването</a></td>
                        <td colspan="2"></td>
                    </tr>
                    </tfoot>
                <?php } ?>				
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(".quantity").change(function () {
        var element = this;
        console.log(element);
        setTimeout(function () {
            update_quantity.call(element)
        }, 500);
    });
    function update_quantity() {
        var pcode = $(this).attr("data-code");
        var quantity = $(this).val();
        if (quantity == 0) {
            $(this).parent().parent().fadeOut();
        }

        $.ajax({
            url: "common/includes/manage-cart.php",
            type: "POST",
            data: {
                type: "update",
                update_quantity: pcode,
                quantity: quantity,
            },
            cache: false,
            success: function (dataresult) {
                window.location.reload();
            }
        });

    $("#shopping-cart-results").on('click', 'a.remove-item', function (e) {
        e.preventDefault();
        var pcode = $(this).attr("data-code");
        $(this).parent().parent().fadeOut();
        $.ajax({
            url: "common/includes/manage-cart.php",
            type: "POST",
            data: {
                type: "remove",
                remove_code: pcode

            },
            cache: false,
            success: function (dataresult) {
            }
        });
    });
</script>
