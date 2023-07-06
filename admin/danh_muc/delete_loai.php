<?php
if ($_GET['ma_loai']) {
    loai_delete($_GET['ma_loai']);
    header("location: ./index.php?source=view_loai");
}
