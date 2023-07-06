<?php
require "../../dao/pdo.php";
require "../../dao/hang_hoa.php";

if (
    isset($_POST['ten_sp']) && isset($_POST['don_gia'])
    && isset($_POST['giam_gia'])
    && isset($_FILES['image'])
    && isset($_POST['ngay_nhap'])
    && isset($_POST['mo_ta'])
    && isset($_POST['dac_biet'])
    && isset($_POST['ten_loai'])
) {
    $ma_hh = $_POST['ma_hh'];
    $ten_sp = $_POST['ten_sp'];
    $don_gia = $_POST['don_gia'];
    $giam_gia = $_POST['giam_gia'];
    $image = $_FILES['image'];
    $oldImage = $_POST['old_image'];
    $ngay_nhap = $_POST['ngay_nhap'];
    $mo_ta = $_POST['mo_ta'];
    $dac_biet = $_POST['dac_biet'];
    $loai_hang = $_POST['ten_loai'];
    $tmp_image = $_FILES['image']['tmp_name'];
    $checkTail = ['png', 'jpg', 'webp', 'jfif', 'gif', 'jepg'];
    $file_info = pathinfo($image['name']);

    if (in_array($file_info['extension'], $checkTail)) {
        $folder_name = "../../content/images/";
        $file_name = uniqid() . $image['name'];
        if (move_uploaded_file($tmp_image, $folder_name . $file_name)) {
            $folder_name = "/content/images/";
            $save_img = $folder_name . $file_name;
        };
    } else {
        $save_img = $oldImage;
    }
} else {
    header("location: ../index.php?source=update_sp&error=Phải đủ các trường thông tin");
}
update_hang_hoa($ten_sp, $don_gia, $giam_gia, $save_img, $ngay_nhap, $mo_ta, $dac_biet, $loai_hang, $ma_hh);
header("location: ../index.php?source=view_sp");
