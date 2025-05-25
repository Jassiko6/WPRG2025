<?php
if (isset($_POST['wybor'])) {
    setcookie("glos", $_POST['wybor'], time() + 3600);
    echo "zaglosowano";
}
?>