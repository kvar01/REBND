<?php
// Check to make sure the id parameter is specified in the URL
if (isset($_GET['product_id'])) {
    // Prepare statement and execute, prevents SQL injection
    $sql = $pdo->prepare('SELECT * FROM products WHERE product_id = ?');
    $sql->execute([$_GET['product_id']]);
    // Fetch the product from the database and return the result as an Array
    $r = $sql->fetch(PDO::FETCH_ASSOC);
    // Check if the product exists (array is not empty)
    if (!$r) {
        // Simple error to display if the id for the product doesn't exists (array is empty)
        exit('Product does not exist!');
    }
} else {
    // Simple error to display if the id wasn't specified
    exit('Product does not exist!');
}
?>


<?=template_header('Product')?>

<div class="product content-wrapper">
    <img src="<?=$r['img']?>" width="500" height="500" alt="<?=$r['title']?>">
    <div>
        <h1 class="title"><?=$r['title']?></h1>
        <span class="price">
            &dollar;<?=$r['price']?>
        </span>
        <form action="index.php?page=cart" method="post">
            <input type="number" name="quantity" value="1" min="1" max="<?=$r['quantity']?>" placeholder="Quantity" required>
            <input type="hidden" name="product_id" value="<?=$r['product_id']?>">
            <input type="submit" value="Add To Cart">
        </form>
        <div class="description">
            <?=$r['description']?>
        </div>
    </div>
</div>

<?=template_footer('Product_Detail')?>