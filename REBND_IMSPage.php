<!-----------Header------------->
<?php 

require_once('Includes/dbh.inc.php'); 

?>
<?php
    include_once 'header.php';
?>
<!------------Body-------------->
<div class = "container">
    <div class = "InventoryManagement">
        <h1> INVENTORY </h1>
<?php
if(isset($_GET[`id`]))
{
    $id = htmlentities($_GET[`id`]);
    
    $query = "SELECT * FROM products WHERE category_id = 2";
}
else
{
    $query = "SELECT * FROM products ORDER BY product_id";
}
if($result = $connect->query($query)){
    if($result->num_rows > 0){
        while ($row = $result->fetch_object())
        {
            echo "<h1>" . $row->title . "</h1>";
            echo "<p>" . $row->description . "</p>";
            echo "$" . "<p3>" . $row->price . "</p3>";
            echo "<img style='width: 250; height: 250' src=" . $row->img . ">";
            
        }
    }
    else
    {
        echo "Nothing to show...";
    }
}
else
{
    echo "There's a problem with the query.";
}
$connect->close();
?>
        
    </div>
</div>
<!-----------Footer------------->
<?php
    include_once 'footer.php';
?>