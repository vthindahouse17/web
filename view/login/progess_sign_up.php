<?php 
include "../../dao/pdo.php";
include "../../dao/khach_hang.php";

$user_name = $_POST['user_name'];
$password = $_POST['password'];

if(khach_hang_exist($user_name) > 0){
    setcookie("message","Người dùng đã tồn tại",time() + 1, "/");
    header("location: ../../index.php?source=sign_up");
}else {
    $passwordHashed = password_hash($password,PASSWORD_BCRYPT);
    setcookie("message","Tạo tài khoản thành công",time() + 1, "/");
    khach_hang_tao_tai_khoan($user_name,$passwordHashed);
    header("location: ../../index.php?source=sign_up");
}