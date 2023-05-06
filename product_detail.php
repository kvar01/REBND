<?php
session_start();
$_SESSION["url"] =  $_SERVER['REQUEST_URI'];
if (!isset($_SESSION['cart'])) 
{
}
?>
<!DOCTYPE html>
<html lang="en">
<style>
    .dropdown-content 
    {
        display: none;
        position: absolute;
        top: 0;
        background-color: white;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        margin-top: 60px;
        align-items: center;
        justify-content: center;
   }
</style>
<head>
<?php
  include('ClientHeaderTitle.php');
?>
  <script>
        function AddCart(item) {
            var ajax = new XMLHttpRequest();
            ajax.open("GET", "additem_list.php?item=" + item, true);
            ajax.onreadystatechange = function() {
                document.getElementById("item_list_display").innerHTML = ajax.responseText;
            }
            ajax.send();
            alert('Added in cart List');
            location.reload();
        }
        function clicked() {
            var e = document.getElementById("itemsize");
            var _selectedValue = e.options[e.selectedIndex].value;
            if (_selectedValue.toString() == 'Size') {
                alert("please select a size")
                event.preventDefault();
            }
        }
    </script>
</head>

<body style="background-color:white">
    <header class="header-part" style="background-color:white">
        <div class="container">
            <div class="header-left" style="margin-left:-0px;">
                <div class="header-icon-group" style="background-color: white;">
                    <button class="icon-nav"><i class="icofont-align-left"></i></button>
                    <a class="header-logo" href="./index.php">
                        <img src="images/log2.png" alt="logo" style="" />
                    </a>
                    <button class="icon-cross"><i class="icofont-close"></i></button>
                </div>
            </div>
            <div class="header-right" style="background-color:white; text-align:center; margin-left:300px">
                <div class="header-icon-group" style="margin-right:0px;">
                    <a href="index.php" style="color:black">Home</a>
                </div>
                <div class="header-icon-group" style="overflow: hidden; float: left;">
                    <a href="product.php" style="color:black">Products</a>
                    <div class="dropdown-content">
                        <a href="./tops.php">Tops</a>
                        <a href="./bottoms.php">Bottoms</a>
                        <a href="./footwear.php">Footwear</a>
                        <a href="./accessories.php">Accessories</a>
                    </div>
                </div>
                <div class="header-icon-group" style="margin-right:0px ;">
                    <a href="Contact.php" style="color:black">Contact</a>
                </div>
                <div class="header-icon-group" style="margin-right:0px;">
                <?php
                if (isset($_SESSION['customer'])) 
                {
                            echo '<span style="color:black; margin-left:5px; font-weight:bold"><a href="dashboard/signout.php">Signout</a>';
                ?></span>
                            <?php
                } else {
                ?>
                            <a href="dashboard/login.php"> <span class="text" style="color:black;  font-weight:normal">Account</span></a>
                            <?php
                } ?>
                        </div>
                        <div class="header-icon-group" style="background-color:white; margin-left:300px">
                            <button class="icon-check">
                                <i class="icofont-shopping-cart"></i>

                    <?php
                    if (isset($_SESSION['cart'])) {
                    $item_list = $_SESSION['cart'];
                    $total_amount = 0;
                    foreach ($item_list as $obj) {
                        $data = explode(',', $obj);
                        $total_amount += ($data[3] * $data[4]);
                    }
                    } 
                    ?>
                    </span><sup style="color:white; background-color:black">
                    <?php
                    if (isset($_SESSION['cart'])) {
                        $item_list_arr = $_SESSION['cart'];
                        echo count($item_list_arr);
                    } else {
                        echo '0';
                    }
                    ?>
                    </sup>
                    </button>
                    </div>
                </div>
            </div>
            </header>

    <div class="container" style="margin-top:100px">
        <?php
    $shop_id = 0;
    if (isset($_GET['q'])) {
      $cell = preg_split('/\,/', $_GET['q']);
      $shop_id = $cell[0];
      $item_id = $cell[0] . ',' . $cell[1] . ',' . $cell[2] . ',' . $cell[3] . ',1,' . $cell[5] . ',' . $cell[6]. ',' . $cell[7];
      $_SESSION['item'] = $item_id;

      //Tops
      if ($cell[1] == 1) 
      {
        echo '  <form action="addcartitem.php" method="post">
        	<div class="row">
               <div class="col-4">
                    <img style="width:100%; height:400px;padding:10px;  border-radius:5px" src="dashboard/item/' . $cell[5] . '" alt="product"/>
                </div>
                <div class="col-8" style="border:0px solid gray">
                    <!-- Product Name -->
                    <h1 style="margin-left:-10px">' . $cell[2] . '</h1>
                   
                    <h5 style="margin-top:15px; margin-bottom:15px;" >$' . $cell[3] . '</h5>
        
                    <!-- Specific Product Details -->
                    <div class="section">
                        <div>
                            <div class="attr" style="width:100px;background:#5a5a5a;"></div>
                            <div class="attr" style="width:100px;background:white;"></div>
                        </div>
                    </div>
                    <div class="section" style="padding-bottom:20px;">
                        <h6 class="title-attr"><small>Qty</small></h6>                    
                        <div>
                            <div class="btn-minus"><span class="glyphicon glyphicon-minus"></span></div>
                            <input type="number" name="qty" value="1" style="border:solid 1px lightgray; width:400px; padding:5px; border-radius:5px; margin-bottom:10px; margin-top:10px" />
                            <div class="btn-plus"><span class="glyphicon glyphicon-plus"></span></div>
                        </div>
                        <div>
                        <select id="itemsize" name="itemsize" style="width:400px; padding:5px; border-radius:5px; border:solid  1px lightgray; margin-bottom:10px">
                        <option>Size</option>
                        <option value="XS">XS</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                      </select>
                        </div>
                    </div>                
        
                    <!-- Add to Cart -->
                    <div class="section" style="padding-bottom:20px;">
                        <input type="hidden" name="pid" value="' . $cell[0] . '">
                        <input type="hidden" name="cid" value="' . $cell[1] . '">
                        <input type="hidden" name="pname" value="' . $cell[2] . '">
                        <input type="hidden" name="price" value="' . $cell[3] . '">
                        <input type="hidden" name="pic" value="' . $cell[5] . '">
                        <input type="hidden" name="shopid" value="' . $cell[6] . '">
                        <input type="hidden" name="shopid_desc" value="' . $cell[7] . '">
                        <input type="submit" value="Add to Cart" style="padding:5px; width:55%; border-radius:5px; background-color:black; color:white" onclick="clicked();"><span style="margin-right:20px" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                    </div>     
                    <div>
                    <p>'.str_replace('_',',',$cell[7]).'</p>
                    </div>                       
                </div>   
                                          
            </div>  </form>';
        
        //Bottoms
      } else if ($cell[1] == 2) 
      {
        echo '  <form action="addcartitem.php" method="post">
        	<div class="row">
               <div class="col-4">
                    <img style="width:100%; height:400px;padding:10px;  border-radius:5px" src="dashboard/item/' . $cell[5] . '" alt="product"/>
                </div>
                <div class="col-8" style="border:0px solid gray">
                    <!-- Product Name -->
                    <h1 style="margin-left:-10px">' . $cell[2] . '</h1>
                 
                    <h5 style="margin-top:15px; margin-bottom:15px;" >$' . $cell[3] . '</h5>
        
                    <!-- Specific Product Details -->
                    <div class="section">
                        <div>
                            <div class="attr" style="width:100px;background:#5a5a5a;"></div>
                            <div class="attr" style="width:100px;background:white;"></div>
                        </div>
                    </div>
                    <div class="section" style="padding-bottom:20px;">
                        <h6 class="title-attr"><small>Qty</small></h6>                    
                        <div>
                            <div class="btn-minus"><span class="glyphicon glyphicon-minus"></span></div>
                            <input type="number" name="qty" value="1" style="border:solid 1px lightgray; width:400px; padding:5px; border-radius:5px; margin-bottom:10px; margin-top:10px" />
                            <div class="btn-plus"><span class="glyphicon glyphicon-plus"></span></div>
                        </div>
                        <div>
                        <select name="itemsize" style="width:400px; padding:5px; border-radius:5px; border:solid  1px lightgray; margin-bottom:10px" id="itemsize">
                        <option>Size</option>
                        <option value="Small">Small</option>
                        <option value="Medium">Medium</option>
                        <option value="Large">Large</option>
                        <option value="X-Large">X-Large</option>
                        <option value="XX-Large">XX-Large</option>
                      </select>
                        </div>
                    </div>                
        
                    <!-- Add to Cart -->
                    <div class="section" style="padding-bottom:20px;">
                        <input type="hidden" name="pid" value="' . $cell[0] . '">
                        <input type="hidden" name="cid" value="' . $cell[1] . '">
                        <input type="hidden" name="pname" value="' . $cell[2] . '">
                        <input type="hidden" name="price" value="' . $cell[3] . '">
                        <input type="hidden" name="pic" value="' . $cell[5] . '">
                        <input type="hidden" name="shopid" value="' . $cell[6] . '">
                        <input type="hidden" name="shopid_desc" value="' . $cell[7] . '">
                        <input type="submit" value="Add to Cart" style="padding:5px; width:55%; border-radius:5px; background-color:black; color:white" onclick="clicked();"><span style="margin-right:20px" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                    </div>     
                    <div >
                    <p>'.str_replace('_',',',$cell[7]).'</p>
                    </div>                             
                </div>    
                        
            </div> 
                            
            </form>';

        //Footwear
      } else if ($cell[1] == 3) {
        echo '  <form action="addcartitem.php" method="post">
        
        	<div class="row">
               <div class="col-4">
                    <img style="width:100%; height:400px;padding:10px;  border-radius:5px" src="dashboard/item/' . $cell[5] . '" alt="product"/>
                </div>
                <div class="col-8" style="border:0px solid gray">
                    <!-- Product Name -->
                    <h1 style="margin-left:-10px">' . $cell[2] . '</h1>
                  
                    <h5 style="margin-top:15px; margin-bottom:15px;" >$' . $cell[3] . '</h5>
        
                    <!-- Specific Product Details -->
                    <div class="section">
                        <div>
                            <div class="attr" style="width:100px;background:#5a5a5a;"></div>
                            <div class="attr" style="width:100px;background:white;"></div>
                        </div>
                    </div>
                    <div class="section" style="padding-bottom:20px;">
                        <h6 class="title-attr"><small>Qty</small></h6>                    
                        <div>
                            <div class="btn-minus"><span class="glyphicon glyphicon-minus"></span></div>
                            <input type="number" name="qty" value="1" style="border:solid 1px lightgray; width:400px; padding:5px; border-radius:5px; margin-bottom:10px; margin-top:10px" />
                            <div class="btn-plus"><span class="glyphicon glyphicon-plus"></span></div>
                        </div>
                        <div>
                        <select name="itemsize" style="width:400px; padding:5px; border-radius:5px; border:solid  1px lightgray; margin-bottom:10px" id="itemsize">
                        <option>Size</option>
                        <option value="7">7</option>
                        <option value="7.5">7.5</option>
                        <option value="8">8</option>
                        <option value="8.5">8.5</option>
                        <option value="9">9</option>
                        <option value="9.5">9.5</option>
                        <option value="10">10</option>
                        <option value="10.5">10.5</option>
                        <option value="11">11</option>
                        <option value="11.5">11.5</option>
                        <option value="12">12</option>
                        <option value="12.5">12.5</option>
                        <option value="13">13</option>
                      </select>
                        </div>
                    </div>                
        
                    <!-- Add to Cart -->
                    <div class="section" style="padding-bottom:20px;">
                        <input type="hidden" name="pid" value="' . $cell[0] . '">
                        <input type="hidden" name="cid" value="' . $cell[1] . '">
                        <input type="hidden" name="pname" value="' . $cell[2] . '">
                        <input type="hidden" name="price" value="' . $cell[3] . '">
                        <input type="hidden" name="pic" value="' . $cell[5] . '">
                        <input type="hidden" name="shopid" value="' . $cell[6] . '">
                        <input type="hidden" name="shopid_desc" value="' . $cell[7] . '">
                        <input type="submit" value="Add to Cart" style="padding:5px; width:55%; border-radius:5px; background-color:black; color:white" onclick="clicked();"><span style="margin-right:20px" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                    </div>     
                    <div>
                    <p>'.str_replace('_',',',$cell[7]).'</p>
                    </div>                           
                </div>   
                                           
            </div>               </form>';
    //Accessories
      } else if ($cell[1] == 4) {
        echo '  <form action="addcartitem.php" method="post">
        
        	<div class="row">
               <div class="col-4">
                    <img style="width:100%; height:400px;padding:10px;  border-radius:5px" src="dashboard/item/' . $cell[5] . '" alt="product"/>
                </div>
                <div class="col-8" style="border:0px solid gray">
                    <!-- Product Name -->
                    <h1 style="margin-left:-10px">' . $cell[2] . '</h1>
                   
                    <h5 style="margin-top:15px; margin-bottom:15px;" >$' . $cell[3] . '</h5>
        
                    <!-- Specific Product Details -->
                    <div class="section">
                        <div>
                            <div class="attr" style="width:100px;background:#5a5a5a;"></div>
                            <div class="attr" style="width:100px;background:white;"></div>
                        </div>
                    </div>
                    <div class="section" style="padding-bottom:20px;">
                        <h6 class="title-attr"><small>Qty</small></h6>                    
                        <div>
                            <div class="btn-minus"><span class="glyphicon glyphicon-minus"></span></div>
                            <input type="number" name="qty" value="1" style="border:solid 1px lightgray; width:400px; padding:5px; border-radius:5px; margin-bottom:10px; margin-top:10px" />
                            <div class="btn-plus"><span class="glyphicon glyphicon-plus"></span></div>
                        </div>
                        <div>
                        <select name="itemsize" style="width:400px; padding:5px; border-radius:5px; border:solid  1px lightgray; margin-bottom:10px" id="itemsize">
                        <option>Size</option>
                        <option value="One Size Fits All">One Size Fits All</option>
                      </select>
                        </div>
                    </div>                
        
                    <!-- Add to cart -->
                    <div class="section" style="padding-bottom:20px;">
                        <input type="hidden" name="pid" value="' . $cell[0] . '">
                        <input type="hidden" name="cid" value="' . $cell[1] . '">
                        <input type="hidden" name="pname" value="' . $cell[2] . '">
                        <input type="hidden" name="price" value="' . $cell[3] . '">
                        <input type="hidden" name="pic" value="' . $cell[5] . '">
                        <input type="hidden" name="shopid" value="' . $cell[6] . '">
                        <input type="hidden" name="shopid_desc" value="' . $cell[7] . '">
                        
                        <input type="submit" value="Add to Cart" style="padding:5px; width:55%; border-radius:5px; background-color:black; color:white;" onclick="clicked();"><span style="margin-right:20px" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                    </div>  
                    <div>
                    <p>'.str_replace('_',',',$cell[7]).'</p>
                    </div>                  
                                           
                </div>    
                                    
            </div>  
              </form>';
      }
    }
    ?>
   </div>
   </section>
<?php
  include('webfooter.php');
?>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/vendor/popper.min.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/custom/header-part.js "></script>
    <script src="js/custom/product-part.js "></script>
    <script src="js/custom/product-view.js "></script>
    <script src="js/custom/select-option.js"></script>
    <script src="js/custom/dropdown.js"></script>
    <script src="js/vendor/slick.min.js"></script>
    <script src="js/custom/slick.js"></script>
    <script src="js/custom/main.js"></script>
</body>
</html>
