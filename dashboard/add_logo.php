<?php
    session_start();
    include('db_connection.php');

    $image = $_FILES['cimage']['name'];
    $temp = $_FILES['cimage']['tmp_name'];
    $createddate = date('Y-m-d');
    //echo $createddate;
    if($image!='')
    {
        $obUser = $_SESSION['user'];
        $createdby = $obUser[2];
        $query = "update tbl_users set logo='$image' where uid='$createdby'";
        $row = UpdateQuery($query);
        if ($row == 1) 
        {
            // upload image in folder 
            move_uploaded_file($temp, "shop_logo/" . $image);
            $rows =  ExecuteQuery("SELECT * FROM tbl_users where uid='$createdby'");
            while ($cell = mysqli_fetch_array($rows))
            {
                $cat = $cell[0].','.$cell[1];
                echo '<tr>
                        <td><img src="shop_logo/'.$cell[9].'" class="img-circle" width="250" height="250" data-toggle="modal" data-target="#update_pre" id="btnimage" title="category/'.$cell[2].'" onClick="CallImagePreview(this.title)"></td>
                     </tr>';
            }
        } 
        else 
        {
            echo "Not Added";
        }
    }
    else
    {
            echo "Please Upload Image";
    }
?>
