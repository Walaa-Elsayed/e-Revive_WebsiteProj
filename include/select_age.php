

<?php

echo '<option value="0"> None </option>';

$current_year = date("Y");


echo $current_year;

for ($x = 2000; $x <= $current_year; $x++) {
  echo '<option value="'.$x.'">'.$x.'</option>';
}
?>