<?php
function khach_hang_insert($mat_khau, $ho_ten, $kich_hoat, $hinh, $email, $vai_tro)
{
    $sql = "INSERT INTO khach_hang(mat_khau,ho_ten,kich_hoat,hinh,email,vai_tro) 
    VALUES(?,?,?,?,?,?)";
    pdo_execute($sql, $mat_khau, $ho_ten, $kich_hoat, $hinh, $email, $vai_tro);
}
function khach_hang_update($email,$hinh,$dia_chi,$dien_thoai,$kich_hoat, $vai_tro, $ma_kh)
{
    $sql = "UPDATE khach_hang SET email = ?,hinh = ?,dia_chi = ?,dien_thoai = ?,kich_hoat = ?,vai_tro = ? 
    WHERE ma_kh = ?";
    pdo_execute($sql,$email,$hinh,$dia_chi,$dien_thoai,$kich_hoat, $vai_tro, $ma_kh);
}

function khach_hang_delete($ma_kh)
{
    $sql = "DELETE FROM khach_hang WHERE ma_kh = ?";
    pdo_execute($sql, $ma_kh);
}

function khach_hang_select_all()
{   
    $sql = "SELECT * FROM khach_hang";
    return pdo_query($sql);
}

function khach_hang_select_by_id($ma_kh)
{
    $sql = "SELECT * FROM khach_hang WHERE ma_kh = ?";
    return pdo_query_one($sql, $ma_kh);
}

function khach_hang_exist($user_name)
{
    $sql = "SELECT COUNT(*) FROM khach_hang WHERE ho_ten = ?";
    $exist_khach_hang = pdo_query_value($sql, $user_name);
    return  $exist_khach_hang;
}

function khach_hang_change_password($password, $email)
{
    $sql = "UPDATE khach_hang SET mat_khau = ? WHERE email = ?";
    pdo_execute($sql,$password, $email);
}
function khach_hang_select_user_name($user_name){
    $sql = "SELECT * FROM khach_hang WHERE ho_ten = ?";
    return pdo_query_one($sql, $user_name);
}
function khach_hang_tao_tai_khoan($user_name,$password){
    $sql = "INSERT INTO khach_hang(ho_ten,mat_khau) VALUES(?,?)";
    pdo_execute($sql,$user_name,$password);
}
function khach_hang_update_tai_khoan($email,$image_account,$address,$phone_number,$ma_kh){
    $sql = "UPDATE khach_hang SET email = ?,hinh = ?,dia_chi = ?,dien_thoai = ? 
    WHERE ma_kh = ?";
    pdo_execute($sql,$email,$image_account,$address,$phone_number,$ma_kh);
}
