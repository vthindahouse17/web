<?php 
function thong_ke_hang_hoa(){
    $sql = "SELECT loai.ma_loai,loai.ten_loai,
    COUNT(*) AS so_luong,
    MIN(hang_hoa.don_gia) AS gia_min,
    MAX(hang_hoa.don_gia) AS gia_max,
    AVG(hang_hoa.don_gia) AS tong_gia
    FROM hang_hoa 
    LEFT JOIN loai ON loai.ma_loai = hang_hoa.ma_loai 
    GROUP BY loai.ma_loai,loai.ten_loai";
    return pdo_query($sql);
}
function thong_ke_binh_luan(){
    $sql = "SELECT hang_hoa.ma_hh,hang_hoa.ten_hh, 
    COUNT(*) AS so_luong, 
    MIN(binh_luan.thoi_gian_binh_luan) AS ngay_cu_nhat, 
    MAX(binh_luan.thoi_gian_binh_luan) AS ngay_moi_nhat 
    FROM binh_luan 
    LEFT JOIN hang_hoa ON hang_hoa.ma_hh = binh_luan.ma_hh 
    GROUP BY hang_hoa.ma_hh,hang_hoa.ten_hh 
    HAVING so_luong > 0";
    return pdo_query($sql);
}