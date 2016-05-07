<?php

$servername = "127.0.0.1";
$username = "root";
$password = "123456";
$dbname = "manage_system";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// 检测连接
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO `case_in`(`name`, `sex`) VALUES ('张三','男')";
$conn->query("set names 'utf8'");
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 