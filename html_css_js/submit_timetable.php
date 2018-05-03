<?php
//echo $_POST['data'] . '<br />';


$data = json_decode($_POST['data']);
//var_dump($data);

$rota_id = 0;

//todo create shifts in the db;

$mysql_hostname = 'ebarker.uk.mysql';
$mysql_username = 'ebarker_uk';
$mysql_password = 'DCEc8USZjKpaUKdibfmanDwt';
$mysql_dbname = 'ebarker_uk';
$opt = array(
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES => false
);

try{
  $pdo = new PDO("mysql:host=$mysql_hostname;dbname=$mysql_dbname", $mysql_username, $mysql_password,$opt);
}catch (PDOException $e){
  exit("PDO Error: ".$e->getMessage());
}

foreach ($data as $shift) {
  echo "Shift "  . $shift->day . "/" . $shift->time . "<br/>";

  foreach ($shift->assignment as $personinshift) {
    try{
      $stmt = $pdo->query("INSERT INTO assigned_shift_user (shift_id,user_id,day_id,rota_id)
      VALUES ((SELECT shift_id FROM shift WHERE time_id = " . $shift->time . " AND day_id = " . $shift->day . ")," . $personinshift->id . "," . $shift->day . "," . $rota_id . ");");
    catch (PDOException $e){
      exit("PDO Error: ".$e->getMessage());
    }
    echo "PERSON " . $personinshift->id . "<br />";
  }
  echo "<br /> <br />";
}


?>
