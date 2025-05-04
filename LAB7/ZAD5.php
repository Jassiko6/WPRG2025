<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>ZAD4</title>
</head>
<body>
<h1>Kalkulator</h1>
<hr>
<h3>Prosty</h3>
<form name="f1" method="POST">
    <p>
        <input name="kp_l1" type="number" required>
        <select name="kp_o1" id="kp_o1">
            <option value="dod" selected>Dodawanie</option>
            <option value="od">Odejmowanie</option>
            <option value="mn">Mnożenie</option>
            <option value="dz">Dzielenie</option>
        </select>
        <input name="kp_l2" type="number" required>
    </p>
    <p><input type="submit" name="kp_s" value="Oblicz"></p>
</form>
<hr>
<h3>Zaawansowany</h3>
<form name="f2" method="POST">
    <p>
        <input name="kz_l" type="text" required>
        <select name="kz_o" id="kz_o">
            <option value="cos" selected>Cosinus</option>
            <option value="sin">Sinus</option>
            <option value="tan">Tangens</option>
            <option value="BinDzies">Binarne na dziesiętne</option>
            <option value="DziesBin">Dziesiętne na binarne</option>
            <option value="DziesSzes">Dziesiętne na szesnastkowe</option>
            <option value="SzesDzies">Szesnastkowe na dziesiętne</option>
        </select>
    </p>
    <p><input type="submit" name="kz_sub" value="Oblicz"></p>
</form>

<hr>
<h3>Wynik:</h3>
<p>
    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST['kp_l1']) && isset($_POST['kp_l2'])) {
            switch ($_POST['kp_o1']) {
                case 'dod': echo $_POST['kp_l1'] + $_POST['kp_l2']; break;
                case 'od': echo $_POST['kp_l1'] - $_POST['kp_l2']; break;
                case 'mn': echo $_POST['kp_l1'] * $_POST['kp_l2']; break;
                case 'dz':
                    if ($_POST['kp_l2'] != 0) {
                        echo $_POST['kp_l1'] / $_POST['kp_l2'];
                    } else {
                        echo "Error: Nie dziel przez zero!";
                    }
                    break;
            }
        } elseif (isset($_POST['kz_l']) && isset($_POST['kz_o'])) {
            $input = $_POST['kz_l'];
            $operation = $_POST['kz_o'];

            switch ($operation) {
                case 'cos':
                case 'sin':
                case 'tan':
                case 'DziesBin':
                case 'DziesSzes':
                    if (is_numeric($input)) {
                        switch ($operation) {
                            case 'cos': echo round(cos(deg2rad($input)), 5); break;
                            case 'sin': echo round(sin(deg2rad($input)), 5); break;
                            case 'tan': echo round(tan(deg2rad($input)), 5); break;
                            case 'DziesBin': echo decbin($input); break;
                            case 'DziesSzes': echo strtoupper(dechex($input)); break;
                        }
                    } else {
                        echo "Podaj wartość numeryczną!";
                    }
                    break;

                case 'BinDzies':
                    if (preg_match('/^[01]+$/', $input)) {
                        echo bindec($input);
                    } else {
                        echo "Podaj wartość binarną!";
                    }
                    break;

                case 'SzesDzies':
                    $input = trim($input);
                    if (substr(strtolower($input), 0, 2) === '0x') {
                        $input = substr($input, 2);
                    }

                    if (ctype_xdigit($input)) {
                        echo hexdec($input);
                    } else {
                        echo "Podaj wartość heksadecymalną!";
                    }
                    break;

                default:
                    echo "Nieznana operacja!";
                    break;
            }
        } else {
            echo "Podaj wartość numeryczną!";
        }
    }
    ?>
</p>
</body>
</html>