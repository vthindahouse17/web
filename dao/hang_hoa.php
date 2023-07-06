<?php

function hang_hoa_insert($ten_hh, $don_gia, $giam_gia, $hinh, $ngay_nhap, $mo_ta, $dac_biet, $ma_loai)
{
    $sql = "INSERT INTO hang_hoa(ten_hh,don_gia,
    giam_gia,hinh,ngay_nhap,mo_ta,dac_biet,ma_loai) 
    VALUES(?,?,?,?,?,?,?,?)";
    pdo_execute(
        $sql,
        $ten_hh,
        $don_gia,
        $giam_gia,
        $hinh,
        $ngay_nhap,
        $mo_ta,
        $dac_biet,
        $ma_loai
    );
}

function update_hang_hoa($ten_hh, $don_gia, $giam_gia, $hinh, $ngay_nhap, $mo_ta, $dac_biet, $ma_loai, $ma_hh)
{
    $sql = "UPDATE hang_hoa SET ten_hh = ?,don_gia = ?,giam_gia = ?,
    hinh = ?,ngay_nhap = ?,mo_ta = ?
    ,dac_biet = ?,ma_loai = ? WHERE ma_hh = ?";
    pdo_execute($sql, $ten_hh, $don_gia, $giam_gia, $hinh, $ngay_nhap, $mo_ta, $dac_biet, $ma_loai, $ma_hh);
}

function hang_hoa_delete($ma_hh){
    $sql = "DELETE FROM hang_hoa WHERE ma_hh = ?";
    pdo_execute($sql,$ma_hh);
}

function hang_hoa_select_all($sortDescending)
{
    $sql = "SELECT * FROM hang_hoa ORDER BY ma_hh " . ($sortDescending ? "DESC" : "ASC");
    return pdo_query($sql);
}
function hang_hoa_select_all_by_loai($ma_loai)
{
    $sql = "SELECT * FROM hang_hoa WHERE ma_loai = ?";
    return pdo_query($sql,$ma_loai);
}

function hang_hoa_select_by_id($ma_hh)
{
    $sql = "SELECT * FROM hang_hoa WHERE ma_hh = ?";
    return pdo_query_one($sql, $ma_hh);
}

function hang_hoa_exist($ten_hh)
{
    $sql = "SELECT COUNT(*) FROM hang_hoa WHERE ten_hh = ?";
    $search_result = pdo_query_one($sql, $ten_hh);
    return $search_result;
}

function hang_hoa_tang_so_luot_xem($ma_hh)
{
    // $incView = hang_hoa_select_by_id($ma_hh);
    // $incView = ($incView['so_luot_xem'] + 1);
    $sql = "UPDATE hang_hoa SET so_luot_xem =  so_luot_xem + 1
    WHERE ma_hh = ?";
    pdo_execute($sql,$ma_hh);
}
function hang_hoa_so_luot_xem($ma_hh)
{
    // $incView = hang_hoa_select_by_id($ma_hh);
    // $incView = ($incView['so_luot_xem'] + 1);
    $sql = "SELECT so_luot_xem FROM hang_hoa WHERE ma_hh = ?";
    return pdo_query_value($sql,$ma_hh);
}

function hang_hoa_select_top_10()
{
    $sql = "SELECT * FROM hang_hoa 
    ORDER BY so_luot_xem DESC 
    LIMIT 10";
    return pdo_query($sql);
}

function hang_hoa_select_dac_biet()
{
    $hang_hoa_dac_biet = 1;
    $sql = "SELECT * FROM hang_hoa WHERE dac_biet = ?";

    return pdo_query($sql,$hang_hoa_dac_biet);
}

function hang_hoa_select_by_loai($ma_loai){
    $sql = "SELECT * FROM hang_hoa 
    RIGHT JOIN loai 
    ON hang_hoa.ma_loai = loai.ma_loai 
    WHERE loai.ma_loai = ?";
    return pdo_query($sql,$ma_loai);
}

function hang_hoa_select_keyword($keyword){
    $sql = "SELECT * FROM hang_hoa WHERE ten_hh like ?  ";
    return pdo_query($sql,'%' . $keyword . '%');
}
function hang_hoa_select_all_home()
{
    $sql = "SELECT * FROM hang_hoa ORDER BY ma_hh DESC LIMIT 0,12";
    return pdo_query($sql);
}