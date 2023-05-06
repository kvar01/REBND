<?php
    session_start();
    include('db_connection.php');

    $name   = $_POST['iname'];
    $image  = $_FILES['iimage']['name'];
    $temp   = $_FILES['iimage']['tmp_name'];
    $qty    = $_POST['qname'];
    $price  = $_POST['pname'];
    $status = $_POST['status'];
    $cid    = $_POST['cid']; 
    $vid    = $_POST['vid_add'];
    $idesc  = $_POST['i_desc'];


    $obUser    = $_SESSION['user'];
    $createdby = $obUser[2];
    $createddate = date('Y-m-d');
    //echo $createddate;
    $query = "insert into tbl_items values(null,'$cid','$name','$price','$qty','$image',$vid,'$createddate','$status','$idesc')";
    $row = InsertQuery($query);
    if ($row == 1) {
        // upload image in folder 
        move_uploaded_file($temp, "item/" . $image);
        // echo 'success';
        $rows =  ExecuteQuery("SELECT 
                                tbl_items.id,
                                tbl_items.category_id,
                                tbl_items.itemname,
                                tbl_items.price,
                                tbl_items.qty,
                                tbl_items.picture,
                               tbl_items.createdby,
                                tbl_items.createddate,
                               tbl_items.status
                               from tbl_items
                               ");
            while ($cell = mysqli_fetch_array($rows))
            {
               $cat = $cell[0].','.$cell[1].','.$cell[2].','.$cell[3].','.$cell[4].','.$cell[5].','.$cell[8];
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
                            <button type="button" onClick="Update(this.title)" id="btnUpdateClick" title="'.$cat.'" class="btn btn-add btn-xs"><i class="fa fa-pencil"></i></button>
                           <button type="button" id="btnDeleteClick" title="'.$cell[0].'" onClick="Delete(this.title)" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> </button>
                          </td>
                       </tr>';
            }
    
} else {
    echo 'There is an issue';
}
