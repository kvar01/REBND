<?php
    session_start();
    include('db_connection.php');

    print_r($_POST);
    $image_key = $_POST['img_key'];
    $obUser    = $_SESSION['user'];
    $createdby = $obUser[2];
    if($image_key=="yes")
    {

        $item_id = $_POST['item_id'];
        $item_name = $_POST['item_name'];
        $item_price = $_POST['item_price'];
        $item_qty = $_POST['item_qty'];
        $item_cid = $_POST['item_cid'];
        $item_status = $_POST['item_status'];
        $image = $_FILES['cimage']['name'];
        $temp = $_FILES['cimage']['tmp_name'];
        $vid    =$_POST['vid_add'];
        $desc    =$_POST["item_desc_"];
        
        $createddate = date('Y-m-d');
        $query = "update tbl_items set category_id='$item_cid',itemname='$item_name', price='$item_price',
        qty='$item_qty', status='$item_status', picture='$image', description='$desc' where id='$item_id' and createdby='1'";
        if($image!='')
        {
            $row = InsertQuery($query);
            if ($row == 1)
            {
                // upload image in folder
                move_uploaded_file($temp, "item/".$image);
                echo "Successfully Updated";
                $rows =  ExecuteQuery(" SELECT
                tbl_items.id,
                tbl_items.category_id,
                tbl_items.itemname,
                tbl_items.price,
                tbl_items.qty,
                tbl_items.picture,
                tbl_items.createdby,
                tbl_items.createddate,
                tbl_items.status
                from tbl_items");
                while ($cell = mysqli_fetch_array($rows))
                {
                //$cat = $cell[0].','.$cell[1].','.$cell[2].','.$cell[3].','.$cell[4].','.$cell[5].','.$cell[8];
                $cat = $cell[0].','.$cell[1].','.$cell[2].','.$cell[3].','.$cell[4].','.$cell[5].','.$cell[6].','.$cell[8];

                echo '<tr>
                    <td>' . $cell[0] . '</td>
                    <td>' . $cell[1] . '</td>
                    <td>' . $cell[2] . '</td>
                    <td>' . $cell[3] . '</td>
                    <td>' . $cell[4] . '</td>
                    <td><img src="item/'.$cell[5].'" class="img-circle" width="50" height="50" data-toggle="modal" data-target="#update_pre" id="btnimage" title="item/'.$cell[5].'" onClick="CallImagePreview(this.title)"></td>
                    <td>' . $cell[6] . '</td>
                    <td>' . $cell[7] . '</td>
                    <td>' . $cell[8] . '</td>

                    <td>
                        <button type="button" onClick="Update(this.title)" id="btnUpdateClick" title="'.$cat.'" data-toggle="modal" data-target="#update" class="btn btn-add btn-xs"> <i class="fa fa-pencil"></i></button>

                        <button type="button" id="btnDeleteClick" title="'.$cell[0].'" onClick="Delete(this.title)" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delt"><i class="fa fa-trash-o"></i> </button>
                    </td>
                </tr>';
                }
            }
            else
            {
            echo "1 Not Added";
            }
        }
    }
    else
    {
        $item_id = $_POST['item_id'];
        $item_name = $_POST['item_name'];
        $item_price = $_POST['item_price'];
        $item_qty = $_POST['item_qty'];
        $item_cid = $_POST['item_cid'];
        $item_status = $_POST['item_status'];
        $vid    =$_POST['vid_add'];
        $desc   =$_POST["item_desc_"];
        $createdby = 2;
        $createddate = date('Y-m-d');
        print_r($_POST);
        $query = "update tbl_items set category_id='$item_cid',itemname='$item_name', price='$item_price', qty='$item_qty', status='$item_status', description='$desc'  where id='$item_id' and createdby='1' ";
        $row = InsertQuery($query);
        if ($row == 1)
        {
        $rows =  ExecuteQuery(" SELECT
        tbl_items.id,
        tbl_items.category_id,
        tbl_items.itemname,
        tbl_items.price,
        tbl_items.qty,
        tbl_items.picture,
        tbl_items.createdby,
        tbl_items.createddate,
        tbl_items.status
        from tbl_items");
        while ($cell = mysqli_fetch_array($rows))
        {
        //$cat = $cell[0].','.$cell[1].','.$cell[2].','.$cell[3].','.$cell[4].','.$cell[5].','.$cell[8];
        $cat = $cell[0].','.$cell[1].','.$cell[2].','.$cell[3].','.$cell[4].','.$cell[5].','.$cell[6].','.$cell[8];

        echo '<tr>
            <td>' . $cell[0] . '</td>
            <td>' . $cell[1] . '</td>
            <td>' . $cell[2] . '</td>
            <td>' . $cell[3] . '</td>
            <td>' . $cell[4] . '</td>
            <td><img src="item/'.$cell[5].'" class="img-circle" width="50" height="50" data-toggle="modal" data-target="#update_pre" id="btnimage" title="item/'.$cell[5].'" onClick="CallImagePreview(this.title)"></td>
            <td>' . $cell[6] . '</td>
            <td>' . $cell[7] . '</td>
            <td>' . $cell[8] . '</td>

            <td>
                <button type="button" onClick="Update(this.title)" id="btnUpdateClick" title="'.$cat.'" data-toggle="modal" data-target="#update" class="btn btn-add btn-xs"> <i class="fa fa-pencil"></i></button>

                <button type="button" id="btnDeleteClick" title="'.$cell[0].'" onClick="Delete(this.title)" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delt"><i class="fa fa-trash-o"></i> </button>
            </td>
        </tr>';
        }

        }
        else
        {
        echo "Unable to Add Item";
        }
    }
?>