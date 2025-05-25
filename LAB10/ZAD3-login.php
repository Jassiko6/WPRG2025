<?php
$login = "l";
$password = "p";

if (isset($_POST['login']) && isset($_POST['password'])) {
    if ($_POST['login'] == $login && $_POST['password'] == $password) {
        session_start();
        $_SESSION['login'] = $login;
        $_SESSION['password'] = $password;

        header("Location: ZAD3-logout.php");
        exit;
    }
    else {
        header("Location: ZAD3.php?error=1");
        exit;
    }
}