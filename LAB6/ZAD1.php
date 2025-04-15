<?php
function print_primes($firstArgument, $secondArgument) {


    if ($firstArgument < 0 || $secondArgument < 0) {
        return "Start and stop must be positive number! Given $firstArgument, $secondArgument!<br>";
    }
    elseif (!is_numeric($firstArgument) || !is_numeric($secondArgument)) {
        return "Start and stop must be numeric!<br>";
    }
    else {
        $bottomBorder = $firstArgument;
        $topBorder = $secondArgument;

        if($bottomBorder > $topBorder) {
            $tmp = $bottomBorder;
            $bottomBorder = $topBorder;
            $topBorder = $tmp;
        }

        if (gettype($bottomBorder) == "double") {
            $bottomBorder = ceil($bottomBorder);
        }
        if (gettype($topBorder) == "double") {
            $topBorder = floor($topBorder);
        }

        $primes = [];
        $numberToCheck = $bottomBorder;

        while($numberToCheck <= $topBorder) {
            $counter = 2;
            $isPrime = true;
            while ($counter < $numberToCheck) {
                if ($numberToCheck % $counter == 0) {
                    $isPrime = false;
                    break;
                }
                $counter++;
            }
            if ($isPrime && $numberToCheck > 1) {
                $primes[] = $numberToCheck;
            }
            $numberToCheck++;
        }

        echo "$firstArgument, $secondArgument: ";
        foreach ($primes as $prime) {
            echo "$prime ";
        }
        echo "<br>";
        return 1;
    }
}

print_primes(5, 10);
print_primes(10, 5);
print_primes(5.5, 10);
print_primes(-5, 10);
print_primes("prime", 10);
?>
