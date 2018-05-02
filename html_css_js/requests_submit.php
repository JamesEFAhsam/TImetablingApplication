<?php
/*** begin our session ***/
session_start();

$holiday_start_date = $_POST['startDate'];
$holiday_end_date = $_POST['endDate'];
$cover_date = $_POST['coverDate'];
$cover_time = $_POST['coverTime'];
$user_id = $_SESSION['user_id'];

print_r($_POST);
print_r($_SESSION);

echo "<script>";
echo "console.log(".json_encode($_POST['startDate']).")";
echo "</script>";

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
	if(!empty($_POST['submitHol'])){
    $dbh = new PDO("mysql:host=$mysql_hostname;dbname=$mysql_dbname", $mysql_username, $mysql_password);
    /*** $message = a message saying we have connected ***/
    /*** set the error mode to excptions ***/
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    /*** prepare the select statement ***/
    $stmt = $dbh->prepare("INSERT INTO shift_cover_request (holiday_start_date, holiday_end_date, cover_date, cover_time) VALUES(:holiday_start_date, :holiday_end_date, :cover_date, :cover_time)");
    /*** bind the parameters ***/
    $stmt->bindParam(':holiday_start_date', $holiday_start_date);
	$stmt->bindParam(':holiday_end_date', $holiday_end_date);
	$stmt->bindParam(':cover_date', $cover_date);
    $stmt->bindParam(':cover_time', $cover_time);
    /*** execute the prepared statement ***/
    $stmt->execute();
    /*** check for a result ***/
	}
}
catch(Exception $e)
{
    /*** if we are here, something has gone wrong with the database ***/
   echo 'We are unable to process your request. Please try again later';
   echo 'Message: ' .$e->getMessage();
} 
?>