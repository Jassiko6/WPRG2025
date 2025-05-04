<?php
$input = fgets(STDIN);

if (preg_match("/^\d+\.\d+$/", $input)) {
    $indexOfTheDot = 0;

    for ($i = 0; $i < strlen($input); $i++) {
        $indexOfTheDot++;
        if ($input[$i] == ".") break;
    }

    echo strlen(substr($input, $indexOfTheDot + 1));;
}
else {
    echo "Not a number!";
    return 0;
}