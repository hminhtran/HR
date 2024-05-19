
<?php 
function checkAdminSession() {
    // Kiểm tra nếu người dùng chưa đăng nhập hoặc không có vai trò là quản trị viên
    if (!isset($_SESSION['username']) || $_SESSION['role'] != 1) {
        // Hủy bỏ phiên làm việc
        session_unset();
        session_destroy();
        // Chuyển hướng đến trang đăng nhập
        header("Location: ../login.php");
        exit;
    }
}
checkAdminSession();
?>