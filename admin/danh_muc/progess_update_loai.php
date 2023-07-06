<?php 
require "../../dao/pdo.php";
require "../../dao/loai.php";
 if(isset($_POST['update'])){
    $ten_loai = $_POST['ten_loai'];
    $ma_loai = $_POST['ma_loai'];
    loai_update($ten_loai,$ma_loai);
    header("location: ../index.php?source=view_loai");
}