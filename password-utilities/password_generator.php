
<?php

// Using the improved mt_rand() for character generation:
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

function generate_password($options) {
    // Define character sets:
    $chars = "";
    $lower_arr = range("a", "z");
    $upper_arr = range("A", "Z");
    $numbr_arr = range(0, 9);

    $lower = implode("", $lower_arr);
    $upper = implode("", $upper_arr);
    $numbr = implode("", $numbr_arr);
    $symbl = "!@#$%^&*()-_~";

    // Extract configuration flags into variables:
    $use_lower = isset($options["lower"]) ? $options["lower"] : "0";
    $use_upper = isset($options["upper"]) ? $options["upper"] : "0";;
    $use_numbr = isset($options["numbr"]) ? $options["numbr"] : "0";;
    $use_symbl = isset($options["symbl"]) ? $options["symbl"] : "0";;

    if($use_lower === "1") { $chars .= $lower; }
    if($use_upper === "1") { $chars .= $upper; }
    if($use_numbr === "1") { $chars .= $numbr; }
    if($use_symbl === "1") { $chars .= $symbl; }

    $length = isset($options["length"]) ? $options["length"] : 8;
    return random_string($length, $chars);
}

$options = array(
    "length" => $_GET["length"],
    "lower" => $_GET["lower"],
    "upper" => $_GET["upper"],
    "numbr" => $_GET["numbr"],
    "symbl" => $_GET["symbl"]
);

$password = generate_password($options);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Generator</title>
</head>
<body>
    
    <p>Generated Password: <?php echo $password; ?></p>

    <p>Generate a new password using the form options:</p>
    <form action="" method="get">
        Length: <input type="number" name="length" min="1" max="99" 
        value="<$php if(isset($_GET["length"])) { echo $_GET["length"]; } ?>"/>
        <br />
        <input type="checkbox" name="lower" value="1" <?php if($_GET["lower"] == 1 ) { echo "checked"; }?> /> Lowercase characters (abc...)
        <br />
        <input type="checkbox" name="upper" value="1" <?php if($_GET["upper"] == 1 ) { echo "checked"; }?> /> Uppercase characters (ABC...)
        <br />
        <input type="checkbox" name="numbr" value="1" <?php if($_GET["numbr"] == 1 ) { echo "checked"; }?> /> Numerical values (123...)
        <br />
        <input type="checkbox" name="symbl" value="1" <?php if($_GET["symbl"] == 1 ) { echo "checked"; }?> /> Symbols (!@#)
        <br />
        <input type="submit" value="Submit" />
    </form>

</body>
</html>