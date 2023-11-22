<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost"; // Thay đổi tên server nếu cần
$username = "your_username"; // Thay đổi username của bạn
$password = "your_password"; // Thay đổi password của bạn
$dbname = "your_database"; // Thay đổi tên cơ sở dữ liệu của bạn

// Tạo kết nối đến cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

// Lấy dữ liệu từ form
$recipeTitle = $_POST['recipeTitle'];
$ingredients = $_POST['ingredients'];
$instructions = $_POST['instructions'];

// Chuẩn bị truy vấn SQL để chèn dữ liệu vào bảng
$sql = "INSERT INTO recipes (title, ingredients, instructions) VALUES ('$recipeTitle', '$ingredients', '$instructions')";

if ($conn->query($sql) === TRUE) {
    echo "Công thức đã được gửi thành công!";
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
}

// Đóng kết nối đến cơ sở dữ liệu
$conn->close();
?>
