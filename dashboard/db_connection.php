<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$con = mysqli_connect('localhost', 'root', '', 'rebnd_db');
function NewInvoice()
{
	global $con;
	$query = mysqli_query($con,'select max(invoice) from tbl_order');
	$rows  = mysqli_fetch_array($query);
	if($rows[0]>0)
	{
		$updated = $rows[0] + 1;
		return $updated;
	}         
	else
	{
		return 1001;
	}    
}
function InsertQuery($query)
{
	
	global $con;
	
		$row = mysqli_query($con, $query);
		if($row==1)
		{
			return true;
		}
		else
		{
			return mysqli_error();
		}
	
              
}
function DeleteQuery($query)
{
	global $con;
	$row = mysqli_query($con, $query);
	$IsSuccess = $row == 1 ? true : false;
	return $IsSuccess;
}
function UpdateQuery($query)
{
	global $con;
	$row = mysqli_query($con, $query);
	$IsSuccess = $row == 1 ? true : false;
	return $IsSuccess;
}
function LoginQuery($username, $password)
{
	global $con;
	$query =  "SELECT
	tbl_role.rid,
	tbl_role.name,
	tbl_users.uid,
	tbl_users.name,
	tbl_users.email,
	tbl_users.contact,
	tbl_users.username,
	tbl_users.picture,
	tbl_users.status,
	tbl_users.createddate,
	tbl_users.address
	from tbl_role
	INNER JOIN tbl_users on tbl_users.role_id = tbl_role.rid
	where tbl_users.username = '$username' and tbl_users.password = '$password' and tbl_users.status = 'active'";

	$IsRow = mysqli_query($con, $query);
	$Chk   = mysqli_num_rows($IsRow);
	if ($Chk > 0) {
		$Obj = mysqli_fetch_array($IsRow);
		return $Obj;
	} else {
		return "Invalid Username or Password";
	}
}
function ExecuteQuery($query)
{
	global $con;
	$Isrow = mysqli_query($con,$query);
	return $Isrow;
}
function TotalCustomers()
{
	global $con;
	$query1 =  "SELECT count(uid) FROM `tbl_users` WHERE role_id=2";
	$IsRow1 = mysqli_query($con, $query1);
	if(mysqli_num_rows($IsRow1)>0)
	{
		$TotalCus = mysqli_fetch_array($IsRow1);
		return $TotalCus[0];
	}
	else
	{
		return 0;
	}
}
function TotalVendors()
{
	global $con;
	$query1 =  "SELECT count(uid) FROM `tbl_users` WHERE role_id=3";
	$IsRow1 = mysqli_query($con, $query1);
	if(mysqli_num_rows($IsRow1)>0)
	{
		$TotalVendors = mysqli_fetch_array($IsRow1);
		return $TotalVendors[0];
	}
	else
	{
		return 0;
	}
}
function TotalItemategories()
{
	global $con;
	$query1 =  "SELECT COUNT(id) FROM tbl_category";
	$IsRow1 = mysqli_query($con, $query1);
	if(mysqli_num_rows($IsRow1)>0)
	{
		$TotalItemategories = mysqli_fetch_array($IsRow1);
		return $TotalItemategories[0];
	}
	else
	{
		return 0;
	}
}
function TotalProducts()
{
	global $con;
	$query1 =  "SELECT COUNT(id) FROM tbl_items";
	$IsRow1 = mysqli_query($con, $query1);
	if(mysqli_num_rows($IsRow1)>0)
	{
		$TotalProducts = mysqli_fetch_array($IsRow1);
		return $TotalProducts[0];
	}
	else
	{
		return 0;
	}
}

function TotalOrders()
{
	global $con;
	$query1 =  "SELECT COUNT(orderitemid) FROM `tbl_orderitems`";
	$IsRow1 = mysqli_query($con, $query1);
	if(mysqli_num_rows($IsRow1)>0)
	{
		$TotalOrders = mysqli_fetch_array($IsRow1);
		return $TotalOrders[0];
	}
	else
	{
		return 0;
	}
}
function TotalDelivered()
{
	global $con;
	$query1 ="SELECT COUNT(Id) FROM `tbl_orderstatus` WHERE OrderStatus='delivered'";

	$IsRow1 = mysqli_query($con, $query1);
	if(mysqli_num_rows($IsRow1)>0)
	{
		$TotalOrders = mysqli_fetch_array($IsRow1);
		return $TotalOrders[0];
	}
	else
	{
		return 0;
	}
}
function TotalPending()
{
	global $con;
	//$query1 =  "SELECT COUNT(invoice) as 'TotalOrders' FROM tbl_order where invoice IN(select invoice from tbl_orderitems where status='Ordered') and status='Ordered'";
	$query1 = "SELECT COUNT(Id) FROM `tbl_orderstatus` WHERE OrderStatus='Accepted'";
	$IsRow1 = mysqli_query($con, $query1);
	if(mysqli_num_rows($IsRow1)>0)
	{
		$TotalPending = mysqli_fetch_array($IsRow1);
		return $TotalPending[0];
	}
	else
	{
		return 0;
	}
}
function TotalRecieved()
{
	global $con;
	//$query1 =  "SELECT COUNT(invoice) as 'TotalOrders' FROM tbl_order where invoice IN(select invoice from tbl_orderitems) and status='Recieved'";
	$query1 = "SELECT COUNT(Id) FROM `tbl_orderstatus` WHERE OrderStatus='recieved'";
	$IsRow1 = mysqli_query($con, $query1);
	if(mysqli_num_rows($IsRow1)>0)
	{
		$TotalRecieved = mysqli_fetch_array($IsRow1);
		return $TotalRecieved[0];
	}
	else
	{
		return 0;
	}
}
?>