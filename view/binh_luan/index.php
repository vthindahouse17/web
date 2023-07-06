<?php
include "../../dao/pdo.php";
include "../../dao/binh_luan.php";
if (isset($_GET['source'])) {
    $source = $_GET['source'];
    switch ($source) {
        case 'delete_bl':
            include "./delete_bl.php";
            break;
        // case 'update_bl':
        //     include "./update_bl.php";
        //     break;
        default:
            include "./form_binh_luan.php";
            break;
    }
} else {
    include "./form_binh_luan.php";
}
