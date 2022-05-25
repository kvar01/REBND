<?=template_header('Products')?>

<?php
    $current_page = isset($_GET['p']) && file_exists($_GET['p'] . '.php') ? $_GET['p'] : 'REBND_ProductPage';

    $sql = $pdo->prepare("SELECT * FROM products");
    $sql -> execute();
    $all_products = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<body>
    <div class="small-container">
       
        <div class="row row-allProducts">
            <h2 class="featured">ALL PRODUCTS</h2>
            <select onchange="location=this.value;" style="float:right;" >
                <option value="Featured.php">Featured</option>
                <option value="low_high.php">Lowest Price</option>
                <option value="high_low.php">Highest Price</option>
                <option value="A_Z.php">Alphabetically, A-Z</option>
                <option value="Z_A.php">Alphabetically, Z-A</option>
            </select>
        </div>

        <div class="row">
            <?php foreach($all_products as $r): ?>
            <div class="col-3">
                <div class="thumbnail">
                    <div class="caption">
                            <a href="index.php?page=product&id=<?=$r['product_id']?>" class="product">
                                <img src="<?=$r['img']?>" width="200" height="200" alt="<?=$r['title']?>">
                                <span class="title"><h3><?=$r['title']?></h3></span>
                                <span class="price">
                                    &dollar;<?=$r['price']?>
                                </span>
                            </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        
    </div>
    <?=template_footer()?>
</body>
