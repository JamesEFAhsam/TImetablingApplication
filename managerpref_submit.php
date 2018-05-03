<?php
/*** begin our session ***/
session_start();
if(!empty($_POST['mday']) && !empty($_POST['seniorNum']) && !empty($_POST['juniorNum']))
{
$preferred_day_off = $_POST['mday'];
$seniorNum = $_POST['seniorNum'];
$juniorNum = $_POST['juniorNum'];
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
    $stmt1 = $dbh->prepare("INSERT INTO manager_preferences (number_senior_staff, number_junior_staff) VALUES(:seniorNum, :juniorNum)");
    $stmt2 = $dbh->prepare("INSERT INTO user_preferences (preferred_day_off, user_id) VALUES(:preferred_day_off, :user_id)");
    /*** bind the parameters ***/
    $stmt2->bindParam(':preferred_day_off', $preferred_day_off);
    $stmt1->bindParam(':seniorNum', $seniorNum);
    $stmt1->bindParam(':juniorNum', $juniorNum);
    $stmt2->bindParam(':user_id', $user_id);
    /*** execute the prepared statement ***/
    $stmt1->execute();
    $stmt2->execute();
    /*** check for a result ***/
	$message = 'Preferences submitted';
}
catch(Exception $e)
{
    /*** if we are here, something has gone wrong with the database ***/
    $message = 'We are unable to process your request. Please try again later"';
}
}else{
	$message = 'Please enter all the information';
}
?>

<p><?php echo $message; ?>