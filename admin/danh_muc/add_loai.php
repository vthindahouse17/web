<div class="alert alert-warning <?= isset($_GET['success']) ? "" : "d-none"; ?>">
    <?php
    $success = isset($_GET['success']) ? $_GET['success'] : "";
    if (isset($_GET['sucsess'])) {
        $success = $_GET['sucsess'];
    }
    echo $success;
    ?>
</div>
<form action="./danh_muc/progess_add_loai.php" method="post">
    <div class="form-group">
        <label for="disabledTextInput">Tên loại</label>
        <input type="text" name="ten_loai" id="disabledTextInput" class="form-control" value="">
    </div>
    <button class="btn btn-primary mt-1">Tạo</button>
    <button class="btn btn-danger mt-1" type="reset">Nhập lại</button>
    <a href="index.php?source=view_loai"><button class="btn btn-light mt-1" type="button">Danh sách</button></a>
</form>