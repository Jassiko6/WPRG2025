<?php
    function numbers($givenNumber) {
        if (!is_numeric($givenNumber)) {
            return "$givenNumber: Parameter must be numeric!<br>";
        }
        else {
            $givenNumberString = (string) $givenNumber;
            $sum = 0;
            for ($i = 0; $i < strlen($givenNumberString); $i++) {
                $numberToAdd = $givenNumberString[$i];
                if (!is_numeric($numberToAdd)) continue;
                elseif (($sum + $numberToAdd) >= 10) break;
                else $sum += $numberToAdd;
            }

            return "$givenNumber: $sum<br>";
        }
    }
    echo numbers(9876);
    numbers(-540);
    numbers(5111.1);
    numbers("numbers");

