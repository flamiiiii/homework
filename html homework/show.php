<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>访客列表</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2 style="text-align: center;">访客列表</h2>

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

// 查询数据库中的所有记录
$sql = "SELECT  name, visit_time FROM visitors";
$result = $conn->query($sql);

// 检查查询是否成功
if ($result === false) {
    die("查询失败: " . $conn->error);
}

// 检查是否有记录
if ($row = $result->fetch_assoc()) {
    // 输出表头
    echo "<table>";
    echo "<tr><th>姓名</th><th>访问时间</th></tr>";

    // 输出第一行数据
    echo "<tr><td>" . $row["name"] . "</td><td>" . $row["visit_time"] . "</td></tr>";

    // 输出其余行数据
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["name"] . "</td><td>" . $row["visit_time"] . "</td></tr>";
    }

    echo "</table>";
} else {
    echo "<p style='text-align: center;'>没有记录</p >";
}

// 关闭连接
$conn->close();
?>

</body>
</html>