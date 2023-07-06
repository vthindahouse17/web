<?php
require "../../dao/pdo.php";
require "../../dao/binh_luan.php";

if (isset($_POST['delete_check'])) {
    $delete_check = $_POST['delete_check'];
    $array = explode(' ', $delete_check);
    $array_lenght = count($array);
    for($i = 0;$i < $array_lenght;$i++){
        $ma_bl = $array[$i];
        binh_luan_delete($ma_bl);
    }
}
header("location: ../index.php?source=ds_bl");