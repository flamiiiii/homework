<?php
// 数据库配置
$servername = "localhost";
$username = "root";
$password = "";
$port=3307;
$dbname = "namedb";

// 创建连接
$conn =mysqli_connect("{$servername}:{$port}", $username, $password, $dbname);

// 检查连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

// 获取表单数据
$name = $_POST['name'];
$timestamp = date("Y-m-d H:i:s");

// 准备并绑定
$stmt = $conn->prepare("INSERT INTO visitors (name, visit_time) VALUES (?, ?)");
$stmt->bind_param("ss", $name, $timestamp);

// 执行查询
if ($stmt->execute()) {
    // 重定向到目标网站
    header("Location:homework.html");
    exit();
} else {
    echo "错误: " . $stmt->error;
}

// 关闭连接
$stmt->close();
$conn->close();
?>