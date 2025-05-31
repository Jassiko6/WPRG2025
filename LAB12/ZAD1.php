<?php
$mysqli = new mysqli("localhost", "root", "", "ZAD1");
if ($mysqli->connect_error) {
    printf("Connect failed: %s<br>", $mysqli->connect_error);
    exit();
}

$checkQuery = "SHOW TABLES LIKE 'Student'";
$result = $mysqli->query($checkQuery);
if ($result && $result->num_rows > 0) {
    printf("Table 'Student' already exists<br>");
}
else {
    $sql = "CREATE TABLE Student (
    StudentID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(255) NOT NULL,
    SecondName VARCHAR(255) NOT NULL,
    Salary INT NOT NULL,
    DateOfBirth DATE NOT NULL
)";

    if ($mysqli->query($sql)) {
        echo "Table 'Student' created successfully<br>";
    } else {
        printf("Error creating table: %s<br>", $mysqli->error);
    }
}


$mysqli->close();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>ZAD1</title>
</head>
<body>
<form method="post" action="ZAD1-dropTable.php">
    <button type="submit" name="drop">Delete table</button>
</form>
</body>
</html>
