<?php
$servername = "127.0.0.1";
$username = "root";
$password = "123456";
$dbname = "manage_system";

// 创建连接
$GLOBALS['$conn'] = new mysqli($servername, $username, $password, $dbname);
// 检测连接
if ($GLOBALS['$conn']->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else
{
	$GLOBALS['$conn']->query("set names 'utf8'");
}
// echo "Connected successfully";
?>