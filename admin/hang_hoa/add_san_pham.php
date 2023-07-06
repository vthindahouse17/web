<div class="alert alert-warning <?= isset($_GET['success']) ? "" : "d-none"; ?>">
    <?php
    $success = isset($_GET['success']) ? $_GET['success'] : "";
    $error = isset($_GET['error']) ? $_GET['error'] : "";
    if (isset($_GET['sucsess'])) {
        $success = $_GET['sucsess'];
        $error =  $_GET['error'];
    }
    echo $success;
    ?>
</div>
<div class="alert alert-danger <?= isset($_GET['error']) ? "" : "d-none"; ?>">
    <?php
    $error = isset($_GET['error']) ? $_GET['error'] : "";
    if (isset($_GET['error'])) {
        $error =  $_GET['error'];
    }
    echo $error;
    ?>
</div>
<form action="./hang_hoa/progess_add_sp.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="ten_san_pham">Tên Sản Phẩm</label>
        <input type="text" name="ten_sp" id="ten_san_pham" class="form-control" value="" required>
    </div>
    <div class="form-group">
        <label for="don_gia">Đơn Giá</label>
        <input type="number" name="don_gia" id="don_gia" class="form-control" value="" required>
    </div>
    <div class="form-group">
        <label for="giam_gia">Giảm Giá</label>
        <input type="number" name="giam_gia" id="giam_gia" class="form-control" value="" required>
    </div>
    <div class="form-group">
        <label for="image">Hình ảnh</label>
        <input type="file" name="image" id="image" class="form-control" value="" required>
    </div>
    <div class="form-group">
        <label for="ngay_nhap">Ngày Nhập</label>
        <input type="date" name="ngay_nhap" id="ngay_nhap" class="form-control" value="" required>
    </div>
    <div class="form-group">
        <label for="mo_ta">Mô tả</label>
        <textarea type="text" rows="4" name="mo_ta" id="mo_ta" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label for="dac_biet">Đặc Biệt</label>
        <select name="dac_biet" id="dac_biet" class="form-control">
            <option value="1">1</option>
            <option value="2">2</option>
        </select>
    </div>
    <div class="form-group">
        <?php $loai_result = loai_select_all(false); ?>
        <label for="ten_loai">Tên Loại</label>
        <select name="ten_loai" id="ten_loai" class="form-control">
            <?php foreach($loai_result as $value) : ?>
            <option value="<?= $value['ma_loai'] ?>"><?= $value['ten_loai'] ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="my-2">
        <button class="btn btn-primary mt-1">Tạo</button>
        <button class="btn btn-danger mt-1" type="reset">Nhập lại</button>
        <a href="index.php?source=view_sp"><button class="btn btn-light mt-1" type="button">Danh sách</button></a>
    </div>
</form>