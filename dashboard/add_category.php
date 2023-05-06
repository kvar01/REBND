<?php
    session_start();
    include('db_connection.php');
    $cname = $_POST['cname'];
    $image = $_FILES['cimage']['name'];
    $temp  = $_FILES['cimage']['tmp_name'];
    $vid   = $_POST['vid'];

    $createddate = date('Y-m-d');
    //echo $createddate;


    if($image!='')
    {
        $obUser = $_SESSION['user'];
        $createdby = $obUser[2];
        $query = "insert into tbl_category values(null,'$cname','$image',$vid,'$createddate')";
        $row = InsertQuery($query);
        if ($row == 1) 
        {
            // upload image in folder 
            move_uploaded_file($temp, "category/" . $image);


                                            $rows =  ExecuteQuery("SELECT * FROM tbl_category");
                                            while ($cell = mysqli_fetch_array($rows)) 
                                            {
                                                $cat = $cell[0].','.$cell[1];
                                                echo '<tr>
                                                        <td>' . $cell[0] . '</td>
                                                        <td>' . $cell[1] . '</td>
                                                        <td><img src="category/'.$cell[2].'" class="img-circle" width="50" height="50" data-toggle="modal" data-target="#update_pre" id="btnimage" title="category/'.$cell[2].'" onClick="CallImagePreview(this.title)"></td>
                                                        <td>' . $cell[4] . '</td>
                                                        
                                                        <td>
                                                            <button type="button" onClick="Update(this.title)" id="btnUpdateClick" title="'.$cat.'" class="btn btn-add btn-xs"><i class="fa fa-pencil"></i></button> 

                                                            <button type="button" id="btnDeleteClick" title="'.$cell[0].'" onClick="Delete(this.title)" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delt"><i class="fa fa-trash-o"></i> </button>
                                                        </td>
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
