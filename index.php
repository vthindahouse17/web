<?php
include "./dao/pdo.php";
include "./dao/loai.php";
include "./dao/hang_hoa.php";
include "./dao/khach_hang.php";
include "./dao/binh_luan.php";
session_start();
include "./view/header.php";

if (isset($_GET['source'])) {
    $source = $_GET['source'];
    $keyword = "";
    switch ($source) {
        case 'sp_detail':
            include "./view/post.php";
            break;
        case 'quan_tri':
            header("location: ./admin/index.php");
            break;
        case 'sign_out':
            include "./view/login/sign_out.php";
            break;
        case 'loai':
            include "./view/view_by_loai.php";
            break;
        case 'sign_up':
            include "./view/login/sign_up.php";
            break;
        case 'search':
            if (isset($_POST['hang_hoa_search'])
                && $_POST['hang_hoa_search'] != "") {
                $keyword = $_POST['hang_hoa_search'];
            }
            include "./view/search.php";
            break;
        case 'forget_pw':
            include "./view/login/fg_password.php";
            break;
        case 'update_account':
            include "./view/login/update_account.php";
            break;
        default:
            include "./view/home.php";
            break;
    }
} else {
    include "./view/home.php";
}
include "./view/footer.php";
