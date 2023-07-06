<?php 
include "../../dao/pdo.php";
include "../../dao/khach_hang.php";

$user_name = $_POST['user_name'];
$password = $_POST['password'];
$email = $_POST['email'];

if(khach_hang_exist($user_name) < 0){
    setcookie("message","Người dùng không tồn tại",time() + 1, "/");
    header("location: ../../index.php?source=forget_pw");
}else {
    $passwordHashed = password_hash($password,PASSWORD_BCRYPT);
    setcookie("message","Đổi mật khẩu thành công",time() + 1, "/");
    khach_hang_change_password($passwordHashed,$email);
    header("location: ../../index.php?source=forget_pw");
}