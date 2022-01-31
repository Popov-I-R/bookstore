<?php
require_once 'header.php';
require_once 'common/includes/dbconnect.php';
?>

<?php
require_once 'header.php';
require_once 'backend/includes/check.php';

$user_id = $_SESSION['login_user'];
$query = "SELECT * FROM users WHERE id=$user_id";
$result = $conn->query($query);
?>
<title> </title>

<!--<script type="text/javascript" src="script/cart.js"></script>-->
<?php include('common/includes/container.php'); ?>


<div class="page-content p-1" id="content">
    <div class='row' >
        <div class='col-12' >
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-2">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <h3 class="mb-1">Моят профил</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form>
                        <h6 class="heading-small text-muted mb-4">User information</h6>
                        <div class="pl-lg-4">
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-username">Потребителско име</label>
                                                <input type="text" id="input-username" class="form-control form-control-alternative" placeholder="Потребителско име" value="<?php echo $row['username']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-first-name">Име и Фамилия</label>
                                                <input type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="Име и фамилия" value="">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">


                                       
                                            <div class="col-lg-8">
                                                <div class="form-group focused">
                                                    <label class="form-control-label" for="address">Адрес</label>
                                                    <input type="text" id="input-city" class="form-control form-control-alternative" placeholder="Моля, въведете вашият адрес" value="">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group focused">
                                                    <label class="form-control-label" for="input-city">Град</label>
                                                    <input type="text" id="input-city" class="form-control form-control-alternative" placeholder="Град" value="">
                                                </div>
                                            </div>
                                       
                                    </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-email">Имейл адрес</label>
                                                    <input type="email" id="input-email" class="form-control form-control-alternative" placeholder="Имейл адрес" value="<?php echo $row['email']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group focused">
                                                    <label class="form-control-label" for="input-number">Номер за връзка</label>
                                                    <input type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Number " value="+359 ">
                                                </div>
                                            </div>

                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class='row'>
        <div class='col-12' >
            <div class="container">	
                <h3 style="text-align:left">Review Your Cart Before Buying</h3>
                <?php
                if (isset($_SESSION["products"]) && count($_SESSION["products"]) > 0) {
                    $total = 0;
                    $list_tax = '';
                    ?>	

                    <table class="table" id="shopping-cart-results">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>		
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
//	foreach($taxes as $key => $value){
//			$tax_amount = round($total * ($value / 100));
//			$tax_item[$key] = $tax_amount;
//			$grand_total = $grand_total + $tax_amount; 
//	}	
//	foreach($tax_item as $key => $value){
//		$list_tax .= $key. ' : '. $currency. sprintf("%01.2f", $value).'<br />';
//	}	

                            $cart_box .= "<span>  $list_tax <hr>Payable Amount : " . sprintf("%01.2f", $grand_total) . " $currency </span>";
                            ?>
                        <tfoot>
                            <tr>
                                <td><br><br><br><br><br><br><a href="<?php echo URLBASE; ?>/categories-template.php?id=1<?php echo $row['id=1'] ?>"  class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Continue Shopping</a></td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td class="text-center view-cart-total"><strong><?php echo $cart_box; ?></strong></td>	
                                <td><br><br><br><br><br><br><a href="success.php" class="btn btn-success btn-block">Place Order <i class="glyphicon glyphicon-menu-right"></i></a></td>
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
        <div class='col-12' >

        </div>
    </div>
</div>


<?php /* include footer */ ?>

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
//            dataType: "json",
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