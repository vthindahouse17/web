<?php
if (isset($_GET['ma_kh']) && $_GET['ma_kh'] != "") {
    $ma_kh = $_GET['ma_kh'];
    khach_hang_delete($ma_kh);
    khach_hang_binh_luan_delete($ma_kh);
    setcookie("message", "Xóa thành công", time() + 1, "/");
    header("location: ./index.php?source=ds_kh");
}else {
    setcookie("message", "Xóa thất bại", time() + 1, "/");
    header("location: ./index.php?source=ds_kh");
}
