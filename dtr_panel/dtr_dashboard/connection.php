
<?php
$host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'college';

$con = mysqli_connect($host, $db_username, $db_password, $db_name);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
?>
