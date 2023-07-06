<?php
include "../../dao/pdo.php";
include "../../dao/binh_luan.php";
$ma_bl = $_POST['ma_bl'];
$ma_hh = $_POST['ma_hh'];
$content = $_POST['content'];

binh_luan_update($content,$ma_bl);
header("location: ../../index.php?source=sp_detail&ma_hh=$ma_hh");
