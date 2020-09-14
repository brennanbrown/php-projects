<?php
// Creating a character set for the generator: //

$lower = "abcdefghijklmnopqrstuvqxyz";
$upper = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$numbers = "0123456789";
$symbols = "!@#$%^&*()-_~"

$password_chars = $lower . $upper . $numbers . $symbols;

// Can also use PHP range()
$lower_array = range("a", "z");
$upper_array = range("A", "Z");
$numbers_array = range(0, 9);

$password_array = $lower_array . $upper_array . $numbers_array;
$password_chars = implode($password_array);


echo $password_chars;
?>

<pre><?php print_r($password_array); ?>