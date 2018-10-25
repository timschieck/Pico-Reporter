<?php
require("api.php");
include("style/style.php");
HeaderStyle("Lists");
?>
<h1>Report List</h1>

<?php
Lister(pco_people("lists")->data);

FooterStyle() ?>
