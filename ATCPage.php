<?php
    include_once 'header.php';
?>

<?php
session_start();
require_once('includes/dbh.inc.php');
?>

<?php
if(isset($_GET['product_id'])){
    $stmt = prepare('SELECT * FROM products WHERE product_id = ?');
    $stmt->execute([$_GET['product_id']]);
    
    $product = mysql_fetch_assoc($stmt);
    if (!$product) {
        // Simple error to display if the id for the product doesn't exists (array is empty)
        exit('Product does not exist!');
    }
} else {
    // Simple error to display if the id wasn't specified
    exit('Product does not exist!');
}
?>
 
<div class="container">
 
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
