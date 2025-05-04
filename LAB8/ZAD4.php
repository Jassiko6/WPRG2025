<?php
    $input = fgets(STDIN);
    $counter = 0;

    for ($i = 0; $i < strlen($input); $i++) {
        if (preg_match("/[aeiou]/", $input[$i])) $counter++;
    }
    echo $counter;