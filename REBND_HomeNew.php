<?php
    include_once 'home_header.php';
?>
<?php 
session_start();
require_once('includes/dbh.inc.php');
?>
 
<div class="container">
 
	<div class="row">
	  <div class="col-sm-6 col-md-3">
	    <div class="thumbnail">
	      <img src="image.png" alt="image title">
	      <div class="caption">
	        <h3>Product Name</h3>
	        <p>Product Description</p>
	        <p>$100</p>
	        <p><a href="addtocart.php" class="btn btn-primary" role="button">Add to Cart</a></p>
	      </div>
	    </div>
	  </div>
	</div>
 
</div>

<?php
    include_once 'footer.php';
?>
