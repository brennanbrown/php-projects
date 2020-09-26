<?php

function read_dictionary($filename="") {
    $dict_file = "dictionary/{$filename}";
    return file($dict_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
}

$basic_words = read_dictionary("word_list.txt");
$brand_words = read_dictionary("brand_list.txt");

$words = array_merge($basic_words, $brand_words);

echo $words[0] . "<br />";
echo $words[1] . "<br />";
echo $words[2] . "<br />";
echo $words[3] . "<br />";
echo $words[4] . "<br />";

?>