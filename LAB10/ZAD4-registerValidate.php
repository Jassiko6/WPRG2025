<?php
    if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['password'])) {
        $hasUppercase = preg_match('/[A-Z]/', $_POST['password']);
        $hasDigit     = preg_match('/[0-9]/', $_POST['password']);
        $hasSpecial   = preg_match('/[^a-zA-Z0-9]/', $_POST['password']);
        if (!$fd = fopen('users.txt', "r")) {
            header("Location: ZAD4-registerForm.php?error=3");
            exit;
        } else {
            while(!feof($fd)){
                $str = fgets($fd);
                if (str_contains($str, $_POST['email'])) {
                    header("Location: ZAD4-registerForm.php?error=4");
                    exit;
                }
}
            fclose($fd);
        }
        if (strlen($_POST['password']) > 5 && $hasUppercase && $hasDigit && $hasSpecial) {
            if (!$fd = fopen('users.txt', 'a')) {
                header("Location: ZAD4-registerForm.php?error=1");
                exit;
            }else {
                fwrite($fd, $_POST['name'] . ";" . $_POST['surname'] . ";" . $_POST['email'] . ";" . $_POST['password'] . "\n");
                fclose($fd);
                header("Location: ZAD4-registerForm.php?success=1");
                exit;
            }
        }
        else {
            header("Location: ZAD4-registerForm.php?error=2");
            exit;
        }
    }