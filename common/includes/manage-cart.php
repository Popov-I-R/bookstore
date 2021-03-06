<?php

//path common/includes/manage-cart.php

require_once 'dbconnect.php';
var_dump($_POST);
if (isset($_POST["book_id"])) {
    foreach ($_POST as $key => $value) {
        $product[$key] = filter_var($value, FILTER_SANITIZE_STRING);
    }
    $statement = $conn->prepare("SELECT title, price FROM books WHERE id=? LIMIT 1");
    $statement->bind_param('i', $product['book_id']);
    $statement->execute();
    $statement->bind_result($title, $price);

    while ($statement->fetch()) {
        $product["title"] = $title;
        $product["price"] = $price;
        session_start();
        if (isset($_SESSION["products"])) {
            if (isset($_SESSION["products"][$product['book_id']])) {
                $_SESSION["products"][$product['book_id']]["book_qty"] = $_SESSION["products"][$product['book_id']]["book_qty"] + $_POST["book_qty"];
            } else {
                $_SESSION["products"][$product['book_id']] = $product;
            }
        } else {
            $_SESSION["products"][$product['book_id']] = $product;
        }
    }
    $total_product = count($_SESSION["products"]);
    echo json_encode(array('products' => $total_product));
}

# Remove products from cart
if(isset($_POST["remove_code"]) ) {
      session_start();
    if (isset($_SESSION["products"])) {

	$product_code  = filter_var($_POST["remove_code"], FILTER_SANITIZE_STRING);
	if(isset($_SESSION["products"][$product_code]))	{
		unset($_SESSION["products"][$product_code]);
	}	
 	$total_product = count($_SESSION["products"]);
	die(json_encode(array('products'=>$total_product)));
}
}
# Update cart product quantity

if (($_POST["type"] == "update") ) {
    session_start();
    if (isset($_SESSION["products"])) {
        if (isset($_POST["quantity"]) && $_POST["quantity"] > 0) {
            $_SESSION["products"][$_POST["update_quantity"]]["book_qty"] = $_POST["quantity"];
        } else if (isset($_POST["quantity"])  && $_POST["quantity"] == 0) {
            unset($_SESSION["products"][$_POST["update_quantity"]]);
            
        }
        $total_product = count($_SESSION["products"]);
        echo json_encode(array('products' => $total_product));
    }
}