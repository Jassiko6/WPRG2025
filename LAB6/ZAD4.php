<?php
    function multiply_matrices (array $A, array $B) {
        if (sizeof($A[0]) != sizeof($B)) {
            return "These arrays cannot be multiplied!";
        }

        foreach ($A as $row) {
            foreach ($row as $elem) {
                if (!is_numeric($elem)) {
                    return "elems of given arrays must be numeric!";
                }
            }
        }

        foreach ($B as $row) {
            foreach ($row as $elem) {
                if (!is_numeric($elem)) {
                    return "elems of given arrays must be numeric!";
                }
            }
        }

        $C =[[]];
        $n = sizeof($A);
        $p = sizeof($B);
        $m = sizeof($A[0]);

        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $p; $j++) {
                $C[$i][$j] = 0;
                for ($r = 0; $r < $m; $r++) {
                    $C[$i][$j] += $A[$i][$r]*$B[$r][$j];
                }
                echo $C[$i][$j]." ";
            }
            echo "<br>";
        }
    }

    $A = array([-1, -2, 3], [0, 2, -1], [-1, 3, 0]);
    $B = array([1, 5, 1], [2, 1, 2], [3, 2 ,3]);

    multiply_matrices($A, $B);
