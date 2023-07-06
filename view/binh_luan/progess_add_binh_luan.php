<?php 
include "../../dao/pdo.php";
include "../../dao/binh_luan.php";

$user_id = $_POST['ma_user'];
$ma_hh = $_POST['ma_hh'];
$noi_dung = $_POST['content'];
$hinh = $_POST['user_hinh'];
if($hinh == ""){
    $save_hinh = "content/images/anhdd.png";
}else {
    $save_hinh = $hinh;
}
date_default_timezone_set('Asia/Ho_Chi_Minh');
binh_luan_insert($noi_dung,$save_hinh,$ma_hh,$user_id,date('Y-m-d H:i:s'));
setcookie("message","Bình luận thành công",time() + 1, "/");
header("location: ../../index.php?source=sp_detail&ma_hh=$ma_hh");

