<?php

//connect to database
$servername="localhost";
$username="root";
$password="";
$database="rebnd";

try
{
    $db=new PDO("myql:host=$servername;dbname=$database",$username,$password);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo "Connected Successfully";
}
catch(PDOEXCEPTION $e)
{
    echo "Connection Failed: " . $e->getMessage();
}


