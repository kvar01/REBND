<?php
    include_once 'header.php';
?>
<?php
session_start();
require_once('includes/dbh.inc.php');
?>

<?php
$sql = "SELECT * FROM products WHERE category_id = 4";
$res = mysqli_query($connect, $sql);
?>
<body>
<div class="small-container">
    <div class="row row-allProducts">
        <h2 class="featured">Bottoms</h2>
    </div>
    
    <div class="row">
        <?php while($r = mysqli_fetch_assoc($res)){ ?>
        <div class="col-3">
            <div class="thumbnail">
                <img src="<?php echo $r['img']; ?>" alt="<?php echo $r['title'] ?>">
                <div class="caption">
                    <h3><?php echo $r['title'] ?></h3>
                    <p><?php echo "$" . $r['price'] ?></p>
                    <p><a href="ATC.php?id=<?php echo $r['product_id']; ?>" class="btn btn-primary" role="button">Add to Cart</a></p>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<?php
    include_once 'footer.php';
?>
</body>