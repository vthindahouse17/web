<?php
if (isset($_GET['ma_kh']) && isset($_GET['source'])) {
    $result = khach_hang_select_by_id($_GET['ma_kh']);
}
?>
<form action="./khach_hang/update_kh.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <input type="hidden" name="ma_kh" value="<?= $_GET['ma_kh']  ?>">
        <label for="disabledTextInput">Email</label>
        <input type="text" name="email" id="disabledTextInput" class="form-control" value="<?= $result['email']; ?>">
    </div>
    <div class="form-group">
        <label for="image">Hình ảnh</label>
        <input type="file" name="image" id="image" class="form-control">
        <input type="hidden" name="old_image" value="<?= $result['hinh'] ?>">
        <img src="..<?= $result['hinh'] ?>" alt="" height="100">
    </div>
    <div class="form-group">
        <label for="address">Địa chỉ</label>
        <input type="text" name="address" id="address" class="form-control" value="<?= $result['dia_chi']  ?>">
    </div>
    <div class="form-group">
        <label for="account_dt">Số điện thoại</label>
        <input type="text" name="account_dt" id="account_dt" class="form-control" value="<?= $result['dien_thoai']  ?>">
    </div>
    <div class="form-group">
        <label for="kich_hoat">Kích hoạt<table></table></label>
        <input type="text" name="kich_hoat" id="kich_hoat" class="form-control" value="<?= $result['kich_hoat']  ?>">
    </div>
    <div class="form-group">
        <label for="role">Vai trò</label>
        <select name="role" id="role" class="form-control">
            <?php if ($result['vai_tro'] == 0) : ?>
                <option value="0">0</option>
                <option value="1">1</option>

            <?php else : ?>
                <option value="1">1</option>
                <option value="0">0</option>
            <?php endif ?>
        </select>
    </div>
    <button class="btn btn-primary mt-1">Update</button>
    <button class="btn btn-light mt-1" type="reset">Nhập lại</button>
    <a href="./index.php?source=ds_kh"><button class="btn btn-light mt-1" type="button">Danh sách</button></a>
</form>