<?php 

function binh_luan_insert($noi_dung,$hinh,$ma_hh,$ma_kh,$thoi_gian_binh_luan){
    $sql = "INSERT INTO binh_luan(noi_dung,hinh,ma_hh,ma_kh,thoi_gian_binh_luan) VALUES(?,?,?,?,?)";
    pdo_execute($sql,$noi_dung,$hinh,$ma_hh,$ma_kh,$thoi_gian_binh_luan);
}

function binh_luan_update($noi_dung,$ma_bl){
   $sql = "UPDATE binh_luan SET noi_dung = ? WHERE ma_bl = ?";
   pdo_execute($sql,$noi_dung,$ma_bl);
}

function binh_luan_delete($ma_bl){
    $sql = "DELETE FROM binh_luan WHERE ma_bl = ?";
    pdo_execute($sql,$ma_bl);
}
function khach_hang_binh_luan_delete($ma_kh){
    $sql = "DELETE FROM binh_luan WHERE ma_kh = ?";
    pdo_execute($sql,$ma_kh);
}
function binh_luan_select_all(){
    $sql = "SELECT * FROM binh_luan";
    return pdo_query($sql);
}

function binh_luan_select_by_id($ma_bl){
    $sql = "SELECT * FROM binh_luan 
    WHERE ma_bl = ?";   
    return pdo_query_one($sql,$ma_bl);
}

function binh_luan_exist($ma_loai){
    $sql = "SELECT COUNT(*) FROM binh_luan
    WHERE ma_bl= ?";
    return pdo_query_value($sql,$ma_loai);
}

function binh_luan_select_by_hang_hoa($ma_hh){
    $sql = "SELECT binh_luan.* FROM binh_luan 
    RIGHT JOIN hang_hoa ON binh_luan.ma_hh = hang_hoa.ma_hh 
    WHERE hang_hoa.ma_hh = ? 
    ORDER BY thoi_gian_binh_luan DESC";
    return pdo_query($sql,$ma_hh);
}