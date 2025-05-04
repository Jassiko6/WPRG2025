<?php
echo "<table border = 1>";
echo "<tr><th>imie</th><th>nazwisko</th><th>adres email</th><th>haslo</th><th>potwierdzone haslo</th><th>wiek</th></tr>";
echo "<tr><td>{$_POST['imie']}</td><td>{$_POST['nazwisko']}</td><td>{$_POST['email']}</td><td>{$_POST['haslo']}</td><td>{$_POST['potwierdzoneHaslo']}</td><td>{$_POST['wiek']}</td></tr>";