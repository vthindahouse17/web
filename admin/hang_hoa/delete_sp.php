<?php 
if ($_GET['ma_sp']) {
    hang_hoa_delete($_GET['ma_sp']);
    header("location: ./index.php?source=view_sp");
}