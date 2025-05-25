<?php
$name = "z1";
$value = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reset'])) {
    setcookie($name, '', time() - 3600);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
} else {
    $value = isset($_COOKIE[$name]) ? $_COOKIE[$name] : 0;
    setcookie($name, ++$value);
}
echo $value;
if ($value > 5) echo "a";

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>ZAD1</title>
</head>
<body>
<form method="post">
    <button type="submit" name="reset">Reset</button>
</form>
</body>
</html>

