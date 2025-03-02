<?php

require('mysql-import/vendor/autoload.php');
use Thamaraiselvam\MysqlImport\Import;

$username = config('database.connections.mysql.username');
$password = config('database.connections.mysql.password');
$database = config('database.connections.mysql.database');
$host     = config('database.connections.mysql.host');

new Import($filename, $username, $password, $database, $host);