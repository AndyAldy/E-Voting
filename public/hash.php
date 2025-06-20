<?php
$password = 'admin123'; // ganti sesuai password asli
$hash = password_hash($password, PASSWORD_DEFAULT);

echo "Password asli: $password\n";
echo "Password hash: $hash\n";
