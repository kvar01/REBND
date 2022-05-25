<!-----------Header------------->
<?php
    include_once 'header.php';
?>
<?php

if(isset($_POST['add_product']))
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "rebnd";
    
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $price = $_POST['price'];
    $size = $_POST['size'];
    $image = $_POST['img'];
    $cat_id = $_POST['category_id'];
    
    $connect = mysqli_connect($servername, $username, $password, $database);
    $query = "INSERT INTO `products`(`title`, `description`, `price`, `size`, `img`, `category_id`) VALUES ('$title','$desc','$price','$size','$image','$cat_id')";
    $result = mysqli_query($connect, $query);
    
    if($result)
    {
        echo 'Product Successfully Added';
    }else{
        echo 'Product Could Not Be Added';
    }
    
    mysqli_free_result($result);
    mysqli_close($connect);
}
?>


<html>
<div class="addProduct">

    <head>
        <title>Add Product</title>
        <meta charset="utf-8">
        <meta name="manage" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <form action="Manage_Product.php" method="post">
            <input type="text" name="title" required placeholder="Product Title" style="width: 300px;"><br><br>
            <input type="text" name="description" required placeholder="Description" style="width: 400px; height:200px;"><br><br>
            <input type="int" name="price" required placeholder="Price" style="width: 50px;"><br><br>
            <input type="text" name="size" required placeholder="Size" style="width: 50px;"><br><br>
            <input type="text" name="img" required placeholder="Image URL" style="width: 200px;"><br><br>
            <input type="number" name="category_id" required placeholder="Category ID Number" min="2" max="5" style="width: 175px;"><br><br>
            <input type="submit" name="add_product" value="Add Product" class="btn">
            <style>
                .btn {
                    font-size: 16px;
                    font-family: arial;
                }
                input{
                    text-align: center;
                }
            </style>
        </form>
    </body>
</div>

</html>
<!-----------Footer------------->
<?php
    include_once 'footer.php';
?>
