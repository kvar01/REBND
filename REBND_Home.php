
<?=template_header('REBND')?>

<body>
    <!----- Featured/Latest Products ------>
    <div class="small-container">
       <div class="row">
            <img src="Images/Store.png">
        </div>
        <!--------- Featured Products --------->
        <h2 class="featured">FEATURED PRODUCTS</h2>
        <?php
            $sql = $pdo->prepare("SELECT * FROM products ORDER BY rand() LIMIT 3");
            $sql -> execute();
            $featured_products = $sql->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <div class="container">
            <div class="row">
                <?php foreach($featured_products as $r): ?>
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
        <!--------- Newest Releases --------->
        <h2 class="featured">NEWEST RELEASES</h2>
        <?php
            $sql = $pdo->prepare("SELECT * FROM products ORDER BY date_created DESC LIMIT 3");
            $sql -> execute();
            $recently_added_products = $sql->fetchAll(PDO::FETCH_ASSOC);
            ?>

        <div class="container">
            <div class="row">
                 <?php foreach($recently_added_products as $r): ?>
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
    </div>
    <!------------- Brands -------------->
    <div class="brands">
        <div class="small-container">
            <div class="row">
                <div class="col-10">
                    <a href="BBC.php">
                        <img src="Images/Brands/BBC.png">
                    </a>
                </div>
                <div class="col-10">
                    <a href="BornXRaised.php">
                        <img src="Images/Brands/BxR.png">
                    </a>
                </div>
                <div class="col-10">
                    <a href="Champion.php">
                        <img src="Images/Brands/Champion.png">
                    </a>
                </div>
                <div class="col-10">
                    <a href="Clarks.php">
                        <img src="Images/Brands/Clarks.png">
                    </a>
                </div>
                <div class="col-10">
                    <a href="Fact.php">
                        <img src="Images/Brands/Fact..jpg">
                    </a>
                </div>
                <div class="col-10">
                    <a href="Homage.php">
                        <img src="Images/Brands/Homage.png">
                    </a>
                </div>
                <div class="col-10">
                    <a href="Kappa.php">
                        <img src="Images/Brands/Kappa.png">
                    </a>
                </div>
                <div class="col-10">
                    <a href="Karhu.php">
                        <img src="Images/Brands/Karhu.png">
                    </a>
                </div>
                <div class="col-10">
                    <a href="PaperPlanes.php">
                        <img src="Images/Brands/PaperPlanes.png">
                    </a>
                </div>
                <div class="col-10">
                    <a href="Saucony.php">
                        <img src="Images/Brands/Saucony.png">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!------------- Footer ------------->
    <?=template_footer()?>
    <!--------- JS for Toggle Menu ------->
    <script>
        var MenuItems = document.getElementById("MenuItems");

        MenuItems.style.maxHeight = "0px";

        function menutoggle() {
            if (MenuItems.style.maxHeight == "0px") {
                MenuItems.style.maxHeight = "200px";
            } else {
                MenuItems.style.maxHeight = "0px";
            }
        }

    </script>

</body>
