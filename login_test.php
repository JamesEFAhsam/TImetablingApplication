<?php
/*** begin the session ***/
session_start();
if(!isset($_SESSION['user_id']))
{
    $message = 'You must be logged in to access this page';
	header("Location: /login.php");
}
else
{
    try
    {
        /*** connect to database ***/
        /*** mysql hostname ***/
        $mysql_hostname = 'ebarker.uk.mysql';
        /*** mysql username ***/
        $mysql_username = 'ebarker_uk';
        /*** mysql password ***/
        $mysql_password = 'DCEc8USZjKpaUKdibfmanDwt';
        /*** database name ***/
        $mysql_dbname = 'ebarker_uk';
        /*** select the users name from the database ***/
        $dbh = new PDO("mysql:host=$mysql_hostname;dbname=$mysql_dbname", $mysql_username, $mysql_password);
        /*** $message = a message saying we have connected ***/
        /*** set the error mode to excptions ***/
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        /*** prepare the insert ***/
        $stmt = $dbh->prepare("SELECT username FROM users 
        WHERE user_id = :user_id");
        /*** bind the parameters ***/
        $stmt->bindParam(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
        /*** execute the prepared statement ***/
        $stmt->execute();
        /*** check for a result ***/
        $username = $stmt->fetchColumn();
        /*** if we have no something is wrong ***/
        if($username == false)
        {
            $message = 'Access Error';
        }
        else
        {
            $message = 'Welcome To SmartRota Website! '.$username;
        }
    }
    catch (Exception $e)
    {
        /*** if we are here, something is wrong in the database ***/
        $message = 'We are unable to process your request. Please try again later"';
    }
}
?>