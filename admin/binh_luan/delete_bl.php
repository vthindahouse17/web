<?php 
if (isset($_GET['ma_bl']) && $_GET['ma_bl'] != "") {
    $ma_bl = $_GET['ma_bl'];
    binh_luan_delete($ma_bl);
    setcookie("message", "Xóa thành công", time() + 1, "/");
    header("location: ./index.php?source=ds_bl");
}else {
    setcookie("message", "Xóa thất bại", time() + 1, "/");
    header("location: ./index.php?source=ds_bl");
}