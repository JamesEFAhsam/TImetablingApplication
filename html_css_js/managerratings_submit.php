<?php
/*** begin our session ***/
session_start();

$MondayRating = $_POST['MondayRating'];
$TuesdayRating = $_POST['TuesdayRating'];
$WednesdayRating = $_POST['WednesdayRating'];
$ThursdayRating = $_POST['ThursdayRating'];
$FridayRating = $_POST['FridayRating'];
$SaturdayRating = $_POST['SaturdayRating'];
$SundayRating = $_POST['SundayRating'];
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
    $stmt = $dbh->prepare("INSERT INTO shift (ratings, user_id) VALUES(:ratings, :user_id)");
    /*** bind the parameters ***/
    $stmt->bindParam(':ratings', $ratings);
    $stmt->bindParam(':user_id', $user_id);
    /*** execute the prepared statement ***/
    $stmt->execute();
    /*** check for a result ***/
}
catch(Exception $e)
{
    /*** if we are here, something has gone wrong with the database ***/
    $message = 'We are unable to process your request. Please try again later"';
}

}
?>

<p><?php echo $message; ?>