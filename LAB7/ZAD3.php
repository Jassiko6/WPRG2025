<?php
function f($a, $b, $c, $d)
{
    $array = array($a => $c);
    $length = $b - $a;
    $nextNumber = $c + 1;

    for ($i = 0; $i < $length; $i++) {
        $array[] = $nextNumber;
        if($nextNumber + 1 > $d) continue;
        else $nextNumber++;
    }

    return $array;
}

print_r(f(3, 10, 1, 5));

