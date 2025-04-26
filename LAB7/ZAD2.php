<?php
    function a($array, $n)
    {
        if($n < 0 || $n > count($array) - 1) {
            printf("BŁĄD");
            return 0;
        }
        else {
            array_splice($array, $n, 0, "$");
            return $array;
        }
    }

    $subjects = array("physics"
    ,
        "chem"
    ,
        "math"
    ,
        "bio"
    ,
        "cs"
    ,
       "drama"
    ,
       "classics");

    $new = a($subjects, 1);
    print_r($new);
