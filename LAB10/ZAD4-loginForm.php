<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>ZAD1</title>
</head>
<body>
<form action="ZAD4-loginValidate.php" method="post">
    Email: <input type="text" name="email" required>
    Haslo: <input type="password" name="password" required>
    <button type="submit" name="wyslij">Wyslij</button>
</form>
<a href="ZAD4-registerForm.php">Rejestracja</a>
<?php
    if (isset($_GET['success']) && $_GET['success'] == 1) {
        echo "<p>Zalogowano</p>";
    }
    else if (isset($_GET['error']) && $_GET['error'] == 1) {
        echo "<p>blad przy otwieraniu pliku</p>";
    }
    else if (isset($_GET['error']) && $_GET['error'] == 2) {
        echo "<p>Niepoprawny login lub haslo</p>";
    }

?>
</body>
</html>
