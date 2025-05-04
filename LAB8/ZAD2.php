<?php
echo "Enter a string: ";
$input = fgets(STDIN);

if (preg_match("/[a-zA-Z]/", $input)) {
    echo "The string can't contain letters!";
    return 0;
}

$charsToRemove = ["\\", "/", ":", "*", "?", "<", ">", "|", "+", "-", "\""];

echo str_replace($charsToRemove, "", $input);;