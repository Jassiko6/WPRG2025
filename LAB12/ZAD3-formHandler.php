<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>z</title>
</head>
<body>
<?php
try{
    $db = new PDO("mysql:host=localhost;dbname=ZAD1", 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['submit'])) {
        $email = $_POST['email'];
        $statement = $db->prepare('SELECT * FROM Users WHERE email= :email');
        $statement->execute(['email'=>$email]);
        $result = $statement->fetch();

        if ($result) {
            echo "Już istnieje użytkownik o podanym mailu";
            exit;
        }

        $hash = password_hash($_POST['haslo'], PASSWORD_DEFAULT);
        $statement = $db->prepare('INSERT INTO Users (imie, nazwisko, nazwaUzytkownika, email, haslo) VALUES (?, ?, ?, ?, ?)');        $statement->execute([
            $_POST['imie'],
            $_POST['nazwisko'],
            $_POST['nazwaUzytkownika'],
            $_POST['email'],
            $hash
        ]);

        $statement = $db->prepare('select count(*) from Users');
        $statement->execute();
        $count = $statement->fetchColumn();
        echo "Zarejestrowano<br>Ilość zarejestrowanych użytkowników: ".$count."<br><a href='ZAD3.php'>Rejestracja</a>";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
</body>
</html>