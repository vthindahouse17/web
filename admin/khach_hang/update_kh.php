<?php
include "../../dao/pdo.php";
include "../../dao/khach_hang.php";

$ma_kh = $_POST['ma_kh'];
$email = $_POST['email'];
$image = $_FILES['image'];
$oldImage = $_POST['old_image'];
$address = $_POST['address'];
$phone_number = $_POST['account_dt'];
$kich_hoat = $_POST['kich_hoat'];
$role = $_POST['role'];
$tmp_image = $_FILES['image']['tmp_name'];

$checkTail = ['png', 'jpg', 'webp', 'jfif', 'gif', 'jepg'];
$file_info = pathinfo($image['name']);
if ($image['name'] != "") {
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
    $save_img = $oldImage;
}

khach_hang_update($email, $save_img, $address, $phone_number, $kich_hoat,$role, $ma_kh);
setcookie("message", "Cập nhật thành công", time() + 1, "/");
header("location: ../index.php?source=ds_kh");
