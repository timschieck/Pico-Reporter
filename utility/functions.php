<?php
function SortByLastName($array) {
    function LastNameSort($a, $b) {
      return strcmp($a->attributes->last_name, $b->attributes->last_name);
    }
    return usort($array, "LastNameSort");
}
?>
