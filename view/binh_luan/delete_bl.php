<?php 
$ma_bl = $_GET['ma_bl'];
$ma_hh = $_GET['ma_hh'];
binh_luan_delete($ma_bl);
header("location: ../../index.php?source=sp_detail&ma_hh=$ma_hh");