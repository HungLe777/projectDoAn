<?php
include_once '../services/connect.php';

// Lấy dữ liệu từ biểu mẫu
$username = $_POST['username'];
$accountname = $_POST['accountname'];
$password = $_POST['password'];
$confirm_password = $_POST['passwordconfirm'];

// Kiểm tra xem mật khẩu đã được xác nhận chính xác chưa
if ($password != $confirm_password) {
    $error_message = "Mật khẩu và xác nhận mật khẩu không khớp!";
} elseif (strlen($password) > 16) {
    $error_message = "Mật khẩu tối đa 16 ký tự!";
} elseif (empty($username) || empty($accountname) || empty($password) || empty($confirm_password)) {
    $error_message = "Hãy nhập đầy đủ thông tin!";
} else {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO taikhoankh (hoten, tentk, matkhautk) VALUES ('$username', '$username', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        $success_message = "Đăng ký thành công!";
    } else {
        $error_message = "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}

// Đóng kết nối đến cơ sở dữ liệu
$conn->close();


?>