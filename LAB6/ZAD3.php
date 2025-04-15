<?php
    function sequences_n ($a, $r, $n) {
        if (!is_numeric($a) || !is_numeric($r) || !is_numeric($n)) {
            return "$a, $r, $n: Parameters must be numeric!<br>";
        }
        elseif ($n < 0) return "$a, $r, $n: N must be positive!<br>";
        else {
            echo "$a, $r, $n:<br>Arithmetic: ";
            for ($i = 1; $i <= $n; $i++) {
                $arithmeticSum = $a + ($i - 1)*$r;
                if ($i == ($n)) {
                    echo "$arithmeticSum<br>";
                }
                else {
                    echo "$arithmeticSum, ";
                }

            }

            echo "Geometric: ";
            for ($j = 0; $j < $n; $j++) {
                $geometricSum = $a * pow($r, $j);
                if ($j == ($n-1)) {
                    echo "$geometricSum<br>";
                }
                else {
                    echo "$geometricSum, ";
                }
            }
            return 1;
        }
    }

sequences_n(5, 2, 10);
sequences_n(5, -2, 10);
sequences_n(-5, 2, 10);
sequences_n(5, 2.5, 10);
sequences_n(5, 2.5, -10);
sequences_n("start", 2, 10);
