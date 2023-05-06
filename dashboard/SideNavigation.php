<ul class="sidebar-menu">
    <?php
    $obj = $_SESSION['user'];
    if ($obj[1] == "admin" || $obj[1] == "Admin") {
    ?>
        <li class="active">
            <a href="index.php"><i class="fa fa-desktop"></i><span>Dashboard</span>
                <span class="pull-right-container">
                </span>
            </a>
        </li>
        <li>
            <a href="A_Role.php">
                <i class="fa fa-user-plus"></i> <span>Role Type</span>
                <span class="pull-right-container">
                </span>
            </a>
        </li>
        <li>
            <a href="B_Vendor.php">
                <i class="fa fa-user"></i> <span>Vendor</span>
                <span class="pull-right-container">
                </span>
            </a>
        </li>
        <li>
            <a href="E_category.php">
                <i class="fa fa-list-ul"></i> <span>Product Categories</span>
                <span class="pull-right-container">
                </span>
            </a>
        </li>
        <li>
            <a href="F_item.php">
                <i class="fa fa-plus-circle"></i> <span>Products</span>
                <span class="pull-right-container">
                </span>
            </a>
        </li>

        <li>
            <a href="C_customer.php">
                <i class="fa fa-user"></i> <span>Customer</span>
                <span class="pull-right-container">
                </span>
            </a>
        </li>
        <li>
            <a href="G_order.php">
                <i class="fa fa-shopping-cart"></i> <span>Orders</span>
                <span class="pull-right-container">
                </span>
            </a>
        </li>
        <li>
            <a href="H_Orderinvoice.php">
                <i class="fa fa-list"></i> <span>Order History</span>
                <span class="pull-right-container">
                </span>
            </a>
        </li>
</ul>
<?php
    } else
    {
        header("location:login.php");
    }
?>