<?php
require "../../dao/pdo.php";
require "../../dao/loai.php";

if(isset($_POST['ten_loai'])){
    $ten_loai = $_POST['ten_loai'];
    loai_insert($ten_loai);
}
header("location: ../index.php?source=add_loai&success=Thêm thành công");
