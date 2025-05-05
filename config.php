<?php
$databaseHost = 'localhost';
$databaseUsername = 'root';
$databasePassword = '';
$databaseName = 'ems';
$url = "http://localhost/labtest2"; 
define('BASE_URL', 'http://localhost/labtest2/');
define('BASE_PATH', __DIR__);

$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
} 

?>
