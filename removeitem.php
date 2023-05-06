<?php
session_start();
$arr = $_GET['pname'];
$item_list = $_SESSION['cart'];

if(count($item_list)==1)
{
    unset($_SESSION['cart']);
    header('location:product.php');
}
else
{
    if (!empty($item_list)) 
    {
        foreach ($item_list as $key => $val) 
        {
            $data = explode(",", $val);
            print_r($data);
            if (trim($data[2]) == $arr) 
            {
                unset($_SESSION['cart'][$key]);
                // echo '<h1>' . $data[2] . '</h1>';
                header('location:product-single.php');
            }
            else
            {
                echo strlen(trim($data[2])).' : '.$data[2].'<br>';
                echo strlen($arr).' : '.$arr.'<br>';
            }
        }
    }
}


