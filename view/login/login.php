<?php
include "../../dao/pdo.php";
include "../../dao/khach_hang.php";
$user_name = $_POST['user_name'];
$password = $_POST['password'];
$user_login = khach_hang_select_user_name($user_name);

if ($user_login != "") {
    if (password_verify($password, $user_login['mat_khau'])) {
        $session_expire_time = 1800;
        session_set_cookie_params($session_expire_time);
        session_start();
        $_SESSION['user'] = $user_login;
        setcookie("message", "Đăng nhập thành công", time() + 1, "/");
        header("location: ../../index.php");
    } else {
        setcookie("message", "Tài khoản hoặc mật khẩu không đúng", time() + 1, "/");
        header("location: ../../index.php");
    }
} else {
    setcookie("message", "Người dùng không tồn tại", time() + 1, "/");
    header("location: ../../index.php");
}
