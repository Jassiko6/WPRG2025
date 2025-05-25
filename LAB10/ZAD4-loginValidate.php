<?php
if (isset($_POST['email']) && isset($_POST['password'])) {
    if (!$fd = fopen('users.txt', "r")) {
        header("Location: ZAD4-loginForm.php?error=1");
        exit;
    } else {
        $valid = false;
        var_dump($_POST['email'], $_POST['password']);
        while(!feof($fd)){
            $line = fgets($fd);
            $fields = explode(';', $line);
            if (count($fields) < 4) continue;
            var_dump($fields);
            if ($fields[2] == $_POST['email'] && trim($fields[3]) == $_POST['password']) {
                $valid = true;
            }
        }
        fclose($fd);
        if ($valid) {
            session_start();
            header("Location: ZAD4-loginForm.php?success=1");
            exit;
        }
//        else {
//            header("Location: ZAD4-loginForm.php?error=2");
//            exit;
//        }
    }
}