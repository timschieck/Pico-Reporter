<?php
error_reporting(-1);
setlocale(LC_MONETARY, "en_US");
date_default_timezone_set("America/Chicago");
session_start();

function Authentication() {
  session_start();
  if (!isset($_SESSION["user_id"])) {
    Header("Location:login.php");
  }
}

?>
