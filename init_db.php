<?php

require 'vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$host = $_ENV['DB_HOST'];
$name = $_ENV['DB_NAME'];


$db = pg_connect("host=$host dbname=$name");

if (!$db) {
    echo "Error connection to database";
}

echo "Connected to $name successfully \n";

$sql = file_get_contents('init_db.sql');
pg_query($db, $sql);

?>