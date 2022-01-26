<?php

require_once 'header.php';

if(isset($_POST["product_code"])) {
	foreach($_POST as $key => $value){
		$product[$key] = filter_var($value, FILTER_SANITIZE_STRING);
	}	
	$statement = $conn->prepare("SELECT title, price FROM books WHERE id=? LIMIT 1");
	$statement->bind_param('s', $product['id']);
	$statement->execute();
	$statement->bind_result($title, $price);
	while($statement->fetch()){ 
		$product["title"] = $title;
		$product["price"] = $price;		
		if(isset($_SESSION["products"])){ 
			if(isset($_SESSION["products"][$product['product_code']])) {				
				$_SESSION["products"][$product['product_code']]["product_qty"] 
= $_SESSION["products"][$product['product_code']]["product_qty"] + $_POST["product_qty"];				
			} else {
				$_SESSION["products"][$product['product_code']] = $product;
			}			
		} else {
			$_SESSION["products"][$product['product_code']] = $product;
		}	
	}	
 	$total_product = count($_SESSION["products"]);
	die(json_encode(array('products'=>$total_product)));
}