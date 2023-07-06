<?php
// $sortDescending = true là sắp xếp theo giảm dần là false là ngược lại
function loai_select_all($sortDescending){
    $sql = "SELECT * FROM loai ORDER BY ma_loai " . ($sortDescending ? "DESC" : "ASC"); ;
    $result = pdo_query($sql);
    return $result;
}
function loai_insert($ten_loai){
    $sql = "INSERT INTO loai(ten_loai) VALUES(?)";
    pdo_execute($sql,$ten_loai);
}
function loai_delete($ma_loai){
    $sql = "DELETE FROM loai WHERE ma_loai = ?";
    pdo_execute($sql,$ma_loai);
}
function loai_get_info($ma_loai){
    $sql = "SELECT * FROM loai WHERE ma_loai = ?";
    return pdo_query_one($sql,$ma_loai);
}
function loai_update($ten_loai,$ma_loai){
    $sql = "UPDATE loai SET ten_loai = ? WHERE ma_loai = ?";
    return pdo_execute($sql,$ten_loai,$ma_loai);
}


