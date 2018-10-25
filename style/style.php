<?php
function HeaderStyle($title = null) {
  ?>
  <!DOCTYPE html lang="en">
  <html>
  <head>
    <title><?php echo $title ?></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|Playfair+Display">
    <link rel="stylesheet" href="style/style.css" >
    <style>

    </style>
  </head>
  <body style="padding: 0.5em">
    <div class="container">
    <?php }

function FooterStyle() {
    ?>
      </div>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
    </html>
<? }

function Lister($array = null) {
  if (isset($array) && isarray($array)) {
    echo "<ol>";
    foreach ($array as $element) {
      echo "<li>$array</li>";
    }
    echo "</ol>";
  }
  return "Lister requires an array input";
}
