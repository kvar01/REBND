<?php
	session_start();
	if(isset($_GET['item']))
	{
	  $arr = preg_split('/\,/',$_GET['item']);
	  if(isset($_SESSION['cart']))
	  {
		$item_list = $_SESSION['cart'];
		if(in_array($_GET['item'],$item_list))
		{}
		else
		{
			array_push($item_list,$_GET['item']);
		}
			$total_amount = 0;
			$_SESSION['cart'] = $item_list;
			echo '<div class="check-header">
			          		<button class="check-close"><i class="icofont-close"></i></button>
        			  	<div class="cart-total">
            				<i class="icofont-basket"></i>
            				<h5><span>total item</span><span>('.count($item_list).')</span></h5>
          				</div>
        			      </div>
        				<ul class="cart-list">';
			foreach($item_list as $obj)
			{
				$data = explode(',',$obj);
			        //0 productId 1-cat_id 2-itename 3-price 4-quantity 5-picture 6-createdby
				$total_amount+= $data[3];
				echo '<li class="cart-item alert fade show">
			          
        			    <div class="cart-image">
              				<a href="#"><img src="dashboard/item/'.$data[5].'" alt="product"/></a>
            			    </div>
 			            <div class="cart-info">
        			      <h5><a href="product-single.html">'.$data[2].'</a></h5>
              				<span>PKR - '.$data[3]. ' X 1<small>/ '.$data[3].' </small></span>
              				<h6>'.$data[3].'</h6>
              				<div class="product-action">
                				<button class="action-minus" title="Quantity Minus">
                				  <i class="icofont-minus"></i></button>
		  				  <input class="action-input" title="Quantity Number" type="text" name="quantity" value="1"/>
						  <button class="action-plus" title="Quantity Plus">
                  				  <i class="icofont-plus"></i>
                				  </button>
              				</div>
            			    </div>
			            <button class="cart-delete" data-dismiss="alert"><i class="icofont-bin"></i></button>
			           </li>';
			}
				echo '</ul> 
					<div class="check-footer">
					<a href="checkout.php" class="check-btn"
						><span class="check-title">checkout</span
						><span class="check-price">'.$total_amount.'</span></a
					>
					</div>
				</div>';
				$_SESSION['total'] = $total_amount;
	  }	
	  else
	  {
		$item_list = array($_GET['item']);
		$_SESSION['cart'] = $item_list;
		$data = explode(',',$_GET['item']);
			echo '<div class="check-header">
				<button class="check-close"><i class="icofont-close"></i></button>
				<div class="cart-total">
					<i class="icofont-basket"></i>
					<h5><span>total item</span><span>(1)</span></h5>
				</div>
				</div>
				<ul class="cart-list">
				<li class="cart-item alert fade show">
					<div class="cart-image">
					<a href="#">
				<img src="dashboard/item/'.$data[5].'" alt="product"/>
				</a>
					</div>
					<div class="cart-info">
					<h5><a href="product-single.html">'.$data[2].'</a></h5>
					<span>PKR - '.$data[3]. ' X 1<small>/ '.$data[3].' </small></span>
					<h6>'.$data[3].'</h6>
					<div class="product-action">
						<button class="action-minus" title="Quantity Minus">
						<i class="icofont-minus"></i></button>
				<input
						class="action-input"
						title="Quantity Number"
						type="text"
						name="quantity"
						value="1"
						/><button class="action-plus" title="Quantity Plus">
						<i class="icofont-plus"></i>
						</button>
					</div>
					</div>
					<button class="cart-delete" data-dismiss="alert">
					<i class="icofont-bin"></i>
					</button>
				</li>
			<div class="check-footer">
				
				<a href="checkout.php" class="check-btn"
					><span class="check-title">checkout</span
					><span class="check-price">'.$data[3].'</span></a
				>
				</div>
					</div>
				';
          }
	}
?>