<?php
	   session_start();
       $arr = $_POST['pid'].','.$_POST['cid'].','.$_POST['pname'].','.$_POST['price'].','.$_POST['qty'].','.$_POST['pic'].','.$_POST['shopid'].','.$_POST['itemsize'].','.$_POST['shopid_desc'];
	   echo $arr;
	   if(isset($_SESSION['cart']))
	   {
	 	$item_list = $_SESSION['cart'];
	 	if(in_array($arr,$item_list))
	 	{
        }
	 	else
	 	{
	 		array_push($item_list,$arr);
	 	}
	 		$total_amount = 0;
	 		$_SESSION['cart'] = $item_list;
	 		foreach($item_list as $obj)
	 		{
	 			$data = explode(',',$obj);
	 			$total_amount+= $data[3];
	 		}
	 		$_SESSION['total'] = $total_amount;
            header('location:product-single.php?shop='.$_SESSION["xshop"]);
	   }	
	   else
	   {
	 	$_SESSION['cart'] = array($arr);
         header('location:product-single.php?shop='.$_SESSION["xshop"]);
    }
?>