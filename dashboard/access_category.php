<?php
    include('db_connection.php');
    $vid = $_REQUEST['search'];
    $query ="SELECT * FROM tbl_category where createdby='$vid'";
    $rows =  ExecuteQuery($query);
     
    $HTML_Data  = '<label class="control-label">Category</label>';
    $HTML_Data .= '<select class="form-control" id="cid" name="cid">';
    $option='';
             while ($cell = mysqli_fetch_array($rows))
             {
                $cat = $cell[0].','.$cell[1];
             
                $option.='<option value="'.$cell[0].'">'.$cell[1].'</option>';
             }
    $HTML_Data .= $option;       
    $HTML_Data .= '</select>';
    echo  $HTML_Data;
?>
        