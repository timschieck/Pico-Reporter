<?php
if(count(get_included_files()) ==1) exit();

function dbcon() {
  class MyDB extends SQLite3 {
    function __construct() {
      $this->open("db/config.sqlite3");
    }
  }
  return $db;
}

function GetConfigOptions() {
  try {
    $db_config = new PDO('sqlite:db/config.sqlite3');
  }
  catch(PDOException $e)
  {
    echo "Exception: " . $e->getMessage();
  }
  return $db_config->query("SELECT option,value FROM options")->fetchAll(PDO::FETCH_KEY_PAIR);
}

function FindUser($username) {
  $db = dbcon("users");
  $sql = "SELECT * FROM users WHERE username = '$username';";
  return $db->query($sql)->fetchArray(SQLITE3_ASSOC)['password'];
  $db->close();
}
