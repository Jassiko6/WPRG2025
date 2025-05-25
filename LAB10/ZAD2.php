<?php
    if (isset($_COOKIE['glos'])) {
        echo "juz zaglosowano";
        exit();
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>ZAD1</title>
</head>
<body>
<form action="ZAD2response.php" method="post">
  <p>wybierz</p>
  <select name="wybor" id="wybor">
    <option value="1">1</option>
    <option value="2">2</option>
  </select>
  <button type="submit" name="wyslij">Wyslij</button>
</form>
</body>
</html>