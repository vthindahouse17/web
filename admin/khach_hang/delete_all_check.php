<?php
require "../../dao/pdo.php";
require "../../dao/khach_hang.php";

if (isset($_POST['delete_check'])) {
    $delete_check = $_POST['delete_check'];
    $array = explode(' ', $delete_check);
    $array_lenght = count($array);
    for ($i = 0; $i < $array_lenght; $i++) {
        $ma_kh = $array[$i];
        khach_hang_delete($ma_kh);
        khach_hang_binh_luan_delete($ma_kh);
    }
}
setcookie("message", "Xóa thành công", time() + 1, "/");
header("location: ../index.php?source=ds_kh");
