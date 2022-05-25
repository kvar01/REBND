<?php
    include_once 'header.php';
?>
<?php
session_start();
require_once('includes/dbh.inc.php');
?>

<?php
$sql = "SELECT * FROM products ORDER BY price ASC";
$res = mysqli_query($connect, $sql);
?>
<div class="small-container">
    <div class="row row-allProducts">
        <h2 class="featured">ALL PRODUCTS</h2>
        <select onchange="location=this.value;">
            <option value="Featured.php">Featured</option>
            <option value="Low_High.php">Lowest Price</option>
            <option value="High_Low.php">Highest Price</option>
            <option value ="A_Z.php">Alphabetically, A-Z</option>
            <option value ="Z_A.php">Alphabetically, Z-A</option>
        </select>
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
    <?php
    include_once 'footer.php';
?>
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