<?php 
include 'login_test.php';
    /*** connect to database ***/
/*** mysql hostname ***/
$mysql_hostname = 'ebarker.uk.mysql';
/*** mysql username ***/
$mysql_username = 'ebarker_uk';
/*** mysql password ***/
$mysql_password = 'DCEc8USZjKpaUKdibfmanDwt';
/*** database name ***/
$mysql_dbname = 'ebarker_uk';
try
{
    $dbh = new PDO("mysql:host=$mysql_hostname;dbname=$mysql_dbname", $mysql_username, $mysql_password);
    /*** $message = a message saying we have connected ***/
    /*** set the error mode to excptions ***/
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $dbh->prepare("SELECT users.first_name, users.last_name 
FROM users 
INNER JOIN assigned_shift_user 
ON users.user_id = assigned_shift_user.user_id 
AND assigned_shift_user.day_id = '1'
INNER JOIN shift
ON assigned_shift_user.shift_id = shift.shift_id
AND shift.time = '9am-4pm'");
    $stmt->execute();
    $moM = $stmt->fetchAll();
    
    $stmt = $dbh->prepare("SELECT users.first_name, users.last_name 
FROM users 
INNER JOIN assigned_shift_user
ON users.user_id = assigned_shift_user.user_id
AND assigned_shift_user.day_id = '1'
INNER JOIN shift
ON assigned_shift_user.shift_id = shift.shift_id
AND shift.time = '4pm-11pm'");
    $stmt->execute();
    $moE = $stmt->fetchAll();
    
    $stmt = $dbh->prepare("SELECT users.first_name, users.last_name 
FROM users 
INNER JOIN assigned_shift_user
ON users.user_id = assigned_shift_user.user_id
AND assigned_shift_user.day_id = '2'
INNER JOIN shift
ON assigned_shift_user.shift_id = shift.shift_id
AND shift.time = '9am-4pm'");
    $stmt->execute();
    $tuM = $stmt->fetchAll();
    
    $stmt = $dbh->prepare("SELECT users.first_name, users.last_name 
FROM users 
INNER JOIN assigned_shift_user
ON users.user_id = assigned_shift_user.user_id
AND assigned_shift_user.day_id = '2'
INNER JOIN shift
ON assigned_shift_user.shift_id = shift.shift_id
AND shift.time = '4pm-11pm'");
    $stmt->execute();
    $tuE = $stmt->fetchAll();
    
    $stmt = $dbh->prepare("SELECT users.first_name, users.last_name 
FROM users 
INNER JOIN assigned_shift_user
ON users.user_id = assigned_shift_user.user_id
AND assigned_shift_user.day_id = '3'
INNER JOIN shift
ON assigned_shift_user.shift_id = shift.shift_id
AND shift.time = '9am-4pm'");
    $stmt->execute();
    $weM = $stmt->fetchAll();
    
    $stmt = $dbh->prepare("SELECT users.first_name, users.last_name 
FROM users 
INNER JOIN assigned_shift_user
ON users.user_id = assigned_shift_user.user_id
AND assigned_shift_user.day_id = '3'
INNER JOIN shift
ON assigned_shift_user.shift_id = shift.shift_id
AND shift.time = '4pm-11pm'");
    $stmt->execute();
    $weE = $stmt->fetchAll();
    
    $stmt = $dbh->prepare("SELECT users.first_name, users.last_name 
FROM users 
INNER JOIN assigned_shift_user
ON users.user_id = assigned_shift_user.user_id
AND assigned_shift_user.day_id = '4'
INNER JOIN shift
ON assigned_shift_user.shift_id = shift.shift_id
AND shift.time = '9am-4pm'");
    $stmt->execute();
    $thM = $stmt->fetchAll();
    
    $stmt = $dbh->prepare("SELECT users.first_name, users.last_name 
FROM users 
INNER JOIN assigned_shift_user
ON users.user_id = assigned_shift_user.user_id
AND assigned_shift_user.day_id = '4'
INNER JOIN shift
ON assigned_shift_user.shift_id = shift.shift_id
AND shift.time = '4pm-11pm'");
    $stmt->execute();
    $thE = $stmt->fetchAll();
    
    $stmt = $dbh->prepare("SELECT users.first_name, users.last_name 
FROM users 
INNER JOIN assigned_shift_user
ON users.user_id = assigned_shift_user.user_id
AND assigned_shift_user.day_id = '5'
INNER JOIN shift
ON assigned_shift_user.shift_id = shift.shift_id
AND shift.time = '9am-4pm' ");
    $stmt->execute();
    $frM = $stmt->fetchAll();
    
    $stmt = $dbh->prepare("SELECT users.first_name, users.last_name 
FROM users 
INNER JOIN assigned_shift_user
ON users.user_id = assigned_shift_user.user_id
AND assigned_shift_user.day_id = '5'
INNER JOIN shift
ON assigned_shift_user.shift_id = shift.shift_id
AND shift.time = '4pm-11pm'");
    $stmt->execute();
    $frE = $stmt->fetchAll();
    
    $stmt = $dbh->prepare("SELECT users.first_name, users.last_name 
FROM users 
INNER JOIN assigned_shift_user
ON users.user_id = assigned_shift_user.user_id
AND assigned_shift_user.day_id = '6'
INNER JOIN shift
ON assigned_shift_user.shift_id = shift.shift_id
AND shift.time = '9am-4pm'");
    $stmt->execute();
    $saM = $stmt->fetchAll();
    
    $stmt = $dbh->prepare("SELECT users.first_name, users.last_name 
FROM users 
INNER JOIN assigned_shift_user
ON users.user_id = assigned_shift_user.user_id
AND assigned_shift_user.day_id = '6'
INNER JOIN shift
ON assigned_shift_user.shift_id = shift.shift_id
AND shift.time = '4pm-11pm'");
    $stmt->execute();
    $saE = $stmt->fetchAll();
    
    $stmt = $dbh->prepare("SELECT users.first_name, users.last_name 
FROM users 
INNER JOIN assigned_shift_user
ON users.user_id = assigned_shift_user.user_id
AND assigned_shift_user.day_id = '7'
INNER JOIN shift
ON assigned_shift_user.shift_id = shift.shift_id
AND shift.time = '9am-4pm'");
    $stmt->execute();
    $suM = $stmt->fetchAll();
    
    $stmt = $dbh->prepare("SELECT users.first_name, users.last_name 
FROM users 
INNER JOIN assigned_shift_user
ON users.user_id = assigned_shift_user.user_id
AND assigned_shift_user.day_id = '7'
INNER JOIN shift
ON assigned_shift_user.shift_id = shift.shift_id
AND shift.time = '4pm-11pm'");
    $stmt->execute();
    $suE = $stmt->fetchAll();
    
    $arr = array();
    array_push($arr,$moM);
    array_push($arr,$moE);
    array_push($arr,$tuM);
    array_push($arr,$tuE);
    array_push($arr,$weM);
    array_push($arr,$weE);
    array_push($arr,$thM);
    array_push($arr,$thE);
    array_push($arr,$frM);
    array_push($arr,$frE);
    array_push($arr,$saM);
    array_push($arr,$saE);
    array_push($arr,$suM);
    array_push($arr,$suE);
    
    echo json_encode($arr);
    
}catch(PDOException $e){
    $message = 'We are unable to process your request. Please try again later"';
}    
?>