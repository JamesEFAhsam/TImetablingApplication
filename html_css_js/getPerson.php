<?php
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
    $stmt = $pdo->query("SELECT users.user_id, rank, contracted_hours, preferred_day_off FROM users LEFT JOIN user_preferences ON users.user_id = user_preferences.user_id;");
    $personArr = array();
    foreach($stmt as $row){
      $person = new stdClass();
      $person->name = $row["user_id"];
      $person->rank = $row["rank"];
      $person->hours = $row["contracted_hours"];
      if($row["preferred_day_off"] != NULL){
        $person->dayoff = $row["preferred_day_off"];
      }
      array_push($personArr,$person);
    }
    $stmt = $pdo->query("select number_junior_staff from manager_preferences;");
    $numOfJunior = $stmt->fetchColumn();
    array_push($personArr, $numOfJunior);
    echo json_encode($personArr);
  }catch (PDOException $e){
    exit("PDO Error: ".$e->getMessage());
  }
 ?>