<?php

$host = 'localhost';
$dbname = 'TP_Php   ';
$username = 'root'; // Si tu utilises MAMP, WAMP, ou XAMPP, c'est souvent 'root'
$password = 'root'; // Laisser vide si aucun mot de passe

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
