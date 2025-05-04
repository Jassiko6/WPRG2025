<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>ZAD3</title>
</head>
<body>
<form name="formularz" method="post" action="ZAD3.php">
    <p>
        <input type="text" name="imie">
        <select name="dropdown">
            <option value="odw" selected>Odwrócenie</option>
            <option value="wielkie">Litery na wielkie</option>
            <option value="male">Litery na małe</option>
            <option value="liczba">Liczenie znaków</option>
            <option value="usunB">Usuwanie białych znaków z początku i końca linii</option>
        </select>
    </p>
    <p>
        <input type="submit" name="sub1" value="Zarejestruj się">
    </p>
</form>

<?php
if (empty($_POST['imie'])) return 0;
else {
    switch ($_POST["dropdown"]) {
        case "odw": $out = strrev($_POST["imie"]); echo "<pre>$out</pre>"; break;
        case "wielkie": $out = strtoupper($_POST["imie"]); echo "<pre>$out</pre>"; break;
        case "male": $out = strtolower($_POST["imie"]); echo "<pre>$out</pre>"; break;
        case "liczba": $out = strlen($_POST["imie"]); echo "<pre>$out</pre>"; break;
        case "usunB": $out = trim($_POST["imie"]); echo "<pre>$out</pre>"; break;
    }
}
?>

</body>
</html>
