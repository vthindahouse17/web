<?php include "../dao/pdo.php"; ?>
<?php include "../dao/loai.php"; ?>
<?php include "../dao/hang_hoa.php"; ?>
<?php include "../dao/khach_hang.php"; ?>
<?php include "../dao/binh_luan.php"; ?>
<?php include "../dao/thong_ke.php"; ?>

<?php
session_start();
include "./header.php";
if (isset($_SESSION['user']) && $_SESSION['user']['vai_tro'] == 1) {
    $_GET['source'] = isset($_GET['source']) ? $_GET['source'] : "";
    if ($_GET['source']) {
        $source = $_GET['source'];

        switch ($source) {
            case 'add_loai':
                include "./danh_muc/add_loai.php";
                break;
            case 'view_loai':
                include "./danh_muc/view_loai.php";
                break;
            case 'update_loai':
                include "./danh_muc/form_update_loai.php";
                break;
            case 'delete_loai':
                include "./danh_muc/delete_loai.php";
                break;
            case 'add_san_pham':
                include "./hang_hoa/add_san_pham.php";
                break;
            case 'view_sp':
                include "./hang_hoa/view_sp.php";
                break;
            case 'delete_sp':
                include "./hang_hoa/delete_sp.php";
                break;
            case 'update_sp':
                include "./hang_hoa/form_update_sp.php";
                break;
            case 'sign_out':
                include "./sign_out.php";
                break;
            case 'ds_kh':
                include "./khach_hang/view_kh.php";
                break;
            case 'delete_kh':
                include "./khach_hang/delete_kh.php";
                break;
            case 'update_kh':
                include "./khach_hang/form_update_khach_hang.php";
                break;
            case 'ds_bl':
                include "./binh_luan/view_bl.php";
                break;
            case 'delete_bl':
                include "./binh_luan/delete_bl.php";
                break;
            case 'tk_hang_hoa':
                include "./thong_ke/tk_hang_hoa.php";
                break;
            case 'tk_binh_luan':
                include "./thong_ke/tk_binh_luan.php";
                break;
            default:
                echo "Hello";
                break;
        }
    }
}
include "./footer.php";
?>