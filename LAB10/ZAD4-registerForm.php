<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>ZAD1</title>
</head>
<body>
<form action="ZAD4-registerValidate.php" method="post">
    Imie: <input type="text" name="name" required>
    Nazwisko: <input type="text" name="surname" required>
    Email: <input type="text" name="email" required>
    Haslo: <input type="password" name="password" required>
    <button type="submit" name="wyslij">Wyslij</button>
</form>
<a href="ZAD4-loginForm.php">Logowanie</a>
<?php
if (isset($_GET['error']) && $_GET['error'] == 1) {
    echo "<p>Nie udało się otworzyć pliku</p>";
}
elseif (isset($_GET['success']) && $_GET['success'] == 1) {
    echo "<p>Zarejestrowano</p>";
}
elseif (isset($_GET['error']) && $_GET['error'] == 2) {
    echo "<p>Hasło powinno składać się z co najmniej 6 znaków, zawierać co
najmniej 1 wielką literę, cyfrę oraz znak specjalny.</p>";
}
elseif (isset($_GET['error']) && $_GET['error'] == 3) {
    echo "<p>Błąd walidacji maila</p>";
}
elseif (isset($_GET['error']) && $_GET['error'] == 4) {
    echo "<p>Już istnieje konto z podanym emailem</p>";
}
?>
</body>
</html>
