<?php
if (isset($_POST['drop'])) {
    $mysqli = new mysqli("localhost", "root", "", "ZAD1");
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s<br>", $mysqli->connect_error);
        exit();
    }
    $dropTableQuery = "DROP TABLE Student";
    if($mysqli->query($dropTableQuery)) {
        printf("Table Student deleted successfully<br>");
    } else {
        printf("Error deleting table: %s<br>", $mysqli->error);
    }
    $mysqli->close();
}