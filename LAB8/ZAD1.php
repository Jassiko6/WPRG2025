<?php
echo "Enter a string: ";
$input = fgets(STDIN);

echo strtoupper($input);
echo strtolower($input);
echo ucfirst($input);
echo ucwords($input);