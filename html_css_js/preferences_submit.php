<?php
/*** begin our session ***/
session_start();

if(isset($_POST['day']))
{
$preferred_day_off = $_POST['day'];
$user_id = $_SESSION['user_id'];
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
    /*** prepare the select statement ***/
    $stmt = $dbh->prepare("INSERT INTO user_preferences (preferred_day_off, user_id) VALUES(:preferred_day_off, :user_id)");
    /*** bind the parameters ***/
    $stmt->bindParam(':preferred_day_off', $preferred_day_off);
    $stmt->bindParam(':user_id', $user_id);
    /*** execute the prepared statement ***/
    $stmt->execute();
    /*** check for a result ***/
	$message = 'Preferences submitted';
}
catch(Exception $e)
{
    /*** if we are here, something has gone wrong with the database ***/
    $message = 'We are unable to process your request. Please try again later"';
}
}else{
	$message = 'Please select a day';
}
?>

<p><?php echo $message; ?>