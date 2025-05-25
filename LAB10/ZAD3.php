<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>ZAD1</title>
</head>
<body>
<form action="ZAD3-login.php" method="post">
    Login: <input type="text" name="login" required>
    Haslo: <input type="password" name="password" required>
    <button type="submit" name="wyslij">Wyslij</button>
</form>
<?php
if (isset($_GET['error']) && $_GET['error'] == 1) {
    echo "<p style='color:red;'>Nieprawidłowy login lub hasło.</p>";
}
?>
</body>
</html>
