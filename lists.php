<?php
require("api.php");
include("style/style.php");
HeaderStyle("Lists");

if (!isset($_GET["list"])) {
  echo "<h1>Planning Center Lists</h1>";
  echo "<ul>";
  $people_lists = pco_people("lists")->data;
  foreach($people_lists as $list) {
    if ($list->attributes->name == null) {$list->attributes->name = "Blank";}
    echo "<li><a href='?list=$list->id'>";
    echo $list->attributes->name;
    echo "</a></li>";
  }
  echo "</ul>";
  echo "<a role='button' class='btn btn-primary' href='./'>Back to Pico Reporter</a>";
} else {
  $list = $_GET["list"];
  $params = array(
    "include" => "people"
  );
  $list_details = pco_people("lists/$list", $params);
  echo "<h1>". $list_details->data->attributes->name . "</h1>";
  $people_on_list = $list_details->included;

echo "<table class='table table-striped table-hover'>";
  foreach ($people_on_list as $person) {
    echo "<tr>";
      // echo "<td></td>";
      echo "<td>" . $person->attributes->name . "</td>\n";
      echo "</tr>";
    }
  echo "</table>";
  echo "<a role='button' class='btn btn-primary' href='lists.php'>Back to lists</a>";
}

FooterStyle();

?>
