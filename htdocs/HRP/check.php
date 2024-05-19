<?php
// Bắt đầu phiên làm việc
session_start();

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if(!(isset($_SESSION["username"]) && isset($_SESSION["role"]) && $_SESSION["role"] > 1)) {
    // Nếu không đăng nhập hoặc vai trò không lớn hơn 1, chuyển hướng về trang đăng nhập
    header("location: login.php");
    exit;
}

/*// Kết nối vào cơ sở dữ liệu
$servername = "localhost";
$username = "root"; // Thay thế bằng tên người dùng của bạn
$password = ""; // Thay thế bằng mật khẩu của bạn
$dbname = "hr_db"; // Thay thế bằng tên cơ sở dữ liệu của bạn

$link = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($link->connect_error) {
    die("Kết nối không thành công: " . $link->connect_error);
}
// Lấy ID của người dùng đã đăng nhập
$employee_id = $_SESSION["id"];

// Truy vấn cơ sở dữ liệu để lấy thông tin của nhân viên
$sql = "SELECT * FROM employees WHERE id = $employee_id";
$result = mysqli_query($link, $sql);

// Kiểm tra nếu truy vấn thành công và có ít nhất một dòng kết quả
if ($result && mysqli_num_rows($result) > 0) {
    $employee_data = mysqli_fetch_assoc($result);
} else {
    echo "Không thể lấy thông tin của nhân viên.";
    exit;
}
?>*/
