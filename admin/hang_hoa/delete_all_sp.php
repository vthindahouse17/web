<?php
require "../../dao/pdo.php";
require "../../dao/hang_hoa.php";

if (isset($_POST['delete_check'])) {
    $delete_check = $_POST['delete_check'];
    $array = explode(' ', $delete_check);
    $array_lenght = count($array);
    for($i = 0;$i < $array_lenght;$i++){
        $ma_loai = $array[$i];
        hang_hoa_delete($ma_loai);
    }
}
header("location: ../index.php?source=view_sp");