<?php
/*** begin our session ***/
session_start();
/*** check if the users is already logged in ***/


if(isset( $_SESSION['user_id'] ))
{
    $message = 'User is already logged in';
}
/*** check that both the username, password have been submitted ***/
if((empty($_POST['username']) || empty($_POST['password'])))
{
    $message = 'Please enter a valid username and password';
}
/*** check the username is the correct length ***/
elseif (strlen( $_POST['username']) > 50 || strlen( $_POST['username']) < 1)
{
    $message = 'Incorrect Length for Username';
}
/*** check the password is the correct length ***/
elseif (strlen( $_POST['password']) > 40 || strlen( $_POST['password']) < 1)
{
    $message = 'Incorrect Length for Password';
}
/*** check the username has only alpha numeric characters ***/
elseif (ctype_alnum($_POST['username']) != true)
{
    /*** if there is no match ***/
    $message = "Username must be alpha numeric";
}
/*** check the password has only alpha numeric characters ***/
elseif (ctype_alnum($_POST['password']) != true)
{
        /*** if there is no match ***/
        $message = "Password must be alpha numeric";
}
else
{
    /*** if we are here the data is valid and we can insert it into database ***/
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    /*** now we can encrypt the password ***/
    $password = sha1( $password );
    
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
        $stmt = $dbh->prepare("SELECT user_id, username, password, is_manager FROM users 
                    WHERE username = :username AND password = :password");
        /*** bind the parameters ***/
        $stmt->bindParam(':username', $username, PDO::PARAM_STR, 50);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR, 40);
        /*** execute the prepared statement ***/
        $stmt->execute();
        /*** check for a result ***/
        $userInfo = $stmt->fetch();
        $user_id = $userInfo[0];
        $is_manager = $userInfo[3];
        /*** if we have no result then fail boat ***/
        if($user_id == false)
        {
                $message = 'Login Failed';
        }
        /*** if we do have a result, all is well ***/
        else
        {
                $_SESSION['user_id'] = $user_id;
                $_SESSION['is_manager'] = $is_manager;
				//$sql = "SELECT is_manager FROM users WHERE username=:username";
				//$results = $dbh->query($sql);
				//if ($results == 1){
					//header("Location: /managerhome.php");
				//}
				if($_SESSION['is_manager'] == 1){
				    header("Location: /managerhome.php");
				} else {
				    header("Location: /home.php");
				}
        }
    }
    catch(Exception $e)
    {
        /*** if we are here, something has gone wrong with the database ***/
        $message = 'We are unable to process your request. Please try again later"';
    }
    
}
?>

<p><?php echo $message; ?>