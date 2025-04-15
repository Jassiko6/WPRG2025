<?php
function is_pangram($text)
{
    $a = false;
    $b = false;
    $c = false;
    $d = false;
    $e = false;
    $f = false;
    $g = false;
    $h = false;
    $iLetter = false;
    $j = false;
    $k = false;
    $l = false;
    $m = false;
    $n = false;
    $o = false;
    $p = false;
    $q = false;
    $r = false;
    $s = false;
    $t = false;
    $u = false;
    $v = false;
    $w = false;
    $x = false;
    $y = false;
    $z = false;

    for ($i = 0; $i < strlen($text); $i++) {
        switch (strtolower($text[$i])) {
            case 'a': $a = true; break;
            case 'b': $b = true; break;
            case 'c': $c = true; break;
            case 'd': $d = true; break;
            case 'e': $e = true; break;
            case 'f': $f = true; break;
            case 'g': $g = true; break;
            case 'h': $h = true; break;
            case 'i': $iLetter = true; break;
            case 'j': $j = true; break;
            case 'k': $k = true; break;
            case 'l': $l = true; break;
            case 'm': $m = true; break;
            case 'n': $n = true; break;
            case 'o': $o = true; break;
            case 'p': $p = true; break;
            case 'q': $q = true; break;
            case 'r': $r = true; break;
            case 's': $s = true; break;
            case 't': $t = true; break;
            case 'u': $u = true; break;
            case 'v': $v = true; break;
            case 'w': $w = true; break;
            case 'x': $x = true; break;
            case 'y': $y = true; break;
            case 'z': $z = true; break;
        }
    }

    if ($a && $b && $c && $d && $e && $f && $g && $h && $iLetter && $j && $k && $l && $m && $n && $o && $p && $q && $r && $s && $t && $u && $v && $w && $x && $y && $z) {
        return true;
    }
    else {
        return false;
    }
}

echo is_pangram("The quick brown fox jumps over the lazy dog.") ? "true<br>" : "false<br>";
echo is_pangram("a") ? "true<br>" : "false<br>";

