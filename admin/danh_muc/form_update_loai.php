<?php 
    if(isset($_GET['ma_loai']) && isset($_GET['source'])){
       $result = loai_get_info($_GET['ma_loai']);
    }
?>
<form action="./danh_muc/progess_update_loai.php" method="post">
    <div class="form-group">
        <input type="hidden" name="ma_loai" value="<?= $_GET['ma_loai']  ?>">
        <label for="disabledTextInput">Tên loại</label>
        <input type="text" name="ten_loai" id="disabledTextInput" class="form-control" value="<?= $result['ten_loai']; ?>">
    </div>
    <button class="btn btn-primary mt-1" name="update">Update</button>
    <button class="btn btn-light mt-1" type="reset">Nhập lại</button>
    <a href="loai.php?source=view_loai"><button class="btn btn-light mt-1" type="button">Danh sách</button></a>
</form>