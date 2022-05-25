<?php
	session_start();
 
	if(isset($_GET['product_id']) & !empty($_GET['product_id'])){
		if(isset($_SESSION['cart']) & !empty($_SESSION['cart'])){
 
			$items = $_SESSION['cart'];
			$cartitems = explode(",", $items);
			if(in_array($_GET['product_id'], $cartitems)){
				header('location: ATCPage.php?status=incart');
			}else{
				$items .= "," . $_GET['product_id'];
				$_SESSION['cart'] = $items;
				header('location: ATCPage.php?status=success');
				
			}
 
		}else{
			$items = $_GET['product_id'];
			$_SESSION['cart'] = $items;
			header('location: ATCPage.php?status=success');
		}
		
	}else{
		header('location: ATCPage.php?status=failed');
	}
?>