<?php

function emptyInputCreateAccount($fname, $lname, $email, $pwd, $passwordrepeat) {
    $result;
    if (empty($fname) || empty($lname) || empty($email) || empty($pwd) || empty($passwordrepeat)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}
function invalidfname($fname) {
    $result;
    if (!preg_match("/^[a-zA-Z]*$/", $fname)) {
        $result = true;
        
    }
    else {
        $result = false;
    }
    return $result;
}
function invalidlname($lname) {
    $result;
    if (!preg_match("/^[a-zA-Z]*$/", $lname)) {
        $result = true;
        
    }
    else {
        $result = false;
    }
    return $result;
}
function invalidemail($email){
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
        
    }
    else {
        $result = false;
    }
    return $result;
}
function passwordmatch($pwd, $passwordrepeat) {
    $result;
    if ($pwd !== $passwordrepeat) {
        $result = true;
        
    }
    else {
        $result = false;
    }
    return $result;
}
function emailExists($connect, $email) {
    $sql = "SELECT * FROM users WHERE usersEmail = ?;";
    $stmt = mysqli_stmt_init($connect);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../createaccount.php?error=statementfailed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    
    $resultData = mysqli_stmt_get_result($stmt);
    
    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
    
    mysqli_stmt_close($stmt);
        
}
function createaccount($connect, $fname, $lname, $email, $pwd) {
    $sql = "INSERT INTO users (usersFname, usersLname, usersEmail, usersPassword) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($connect);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../createaccount.php?error=statementfailed");
        exit();
    }
    
    $passwordHash = password_hash($pwd, PASSWORD_DEFAULT);
    
    mysqli_stmt_bind_param($stmt, "ssss", $fname, $lname, $email, $passwordHash);
    mysqli_stmt_execute($stmt);    
    mysqli_stmt_close($stmt);
    header("location: ../createaccount.php?error=none");
    exit();    
}

function emptyInputLogin($email, $pwd) {
    $result;
    if ( empty($email) || empty($pwd)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function userLogin($connect, $email, $pwd){
    $emailExists = emailExists($connect, $email);
    
    if($emailExists === false){
        header("location: ../login.php?error=loginincorrect");
        exit();
    }
    
    $hashedPwd = $emailExists["usersPassword"];
    $checkPwd = password_verify($pwd, $hashedPwd);
    
    if($checkPwd === false) {
        header("location: ../login.php?error=loginincorrect");
        exit();
    }
    else if($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $emailExists["usersId"];
        $_SESSION["useremail"] = $emailExists["usersEmail"];
        header("location: ../REBND_Home.php");
        exit();
    }
}
function adminEmailExists($connect, $adminEmail) {
    $sql2 = "SELECT * FROM admin WHERE adminEmail = ?;";
    $stmt2 = mysqli_stmt_init($connect);
    if(!mysqli_stmt_prepare($stmt2, $sql2)){
        header("location: ../createaccount.php?error=statementfailed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt2, "s", $adminEmail);
    mysqli_stmt_execute($stmt2);
    
    $resultData2 = mysqli_stmt_get_result($stmt2);
    
    if($row2 = mysqli_fetch_assoc($resultData2)){
        return $row2;
    }
    else{
        $result2 = false;
        return $result2;
    }
    
    mysqli_stmt_close($stmt2);
}
    
function emptyAdminInputLogin($adminEmail, $adminPwd) {
    $result;
    if ( empty($adminEmail) || empty($adminPwd)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}
function adminLogin($connect, $adminEmail, $adminPwd){
    $adminEmailExists = adminEmailExists($connect, $adminEmail);
    
    if($adminEmailExists === false){
        header("location: ../REBND_AdminLogin.php?adminerror=loginincorrect");
        exit();
    }  
    
    $adminPwdHash = password_hash('admin12345', PASSWORD_DEFAULT);
    $dbPwd = $adminEmailExists["adminPassword"];
    $checkAdminPwd = password_verify($dbPwd, $adminPwdHash);
    
    if($checkAdminPwd === false) {
        header("location: ../REBND_Adminlogin.php?adminerror=pwincorrect");
        exit();
    }
    else if($checkAdminPwd === true) {
        session_start();
        $_SESSION["adminid"] = $adminEmailExists["adminId"];
        $_SESSION["adminemail"] = $adminEmailExists["adminEmail"];
        header("location: ../EmployeeIndexPage.php");
        exit();
    }
}
function get_single_product($products){
    global $db;
    $ret = array();
    $sql = "SELECT * FROM product";
    $res = mysqli_query($db, $sql);
    
    while($ar = mysqli_fetch_assoc($res))
    {
        $ret[] = $ar;
    }
    return $ret;
}