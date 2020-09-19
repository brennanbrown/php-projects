
<?php
// Creating character sets:
$lower_array = range("a", "z");
$upper_array = range("A", "Z");
$numbers_array = range(0, 9);
$symbols = "!@#$%^&*()-_~";

$password_array = array_merge($lower_array, $upper_array, $numbers_array);
$password_chars = implode("", $password_array) . $symbols;

// Using the improved random_int() for character generation:
function random_char($string) {
    $i = mt_rand(0, strlen($string) - 1);
    return $string[$i];
}

// Looping through random char generation for passwords:
function random_string($length, $char_set) {
    $output = "";
    for($i=0; $i<$length; $i++){
        $output .= random_char($char_set);
    }
    return $output;
}

echo random_string(10, $password_chars)

?>