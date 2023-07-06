<table class="table table-bordered table-hover overflow-auto">
<thead>
        <tr>
            <th scope="col">

            </th>
            <th scope="col">
                Mã Sản Phẩm
            </th>
            <th scope="col">
                Tên Sản Phẩm
            </th>
            <th scope="col">
                Đơn Giá
            </th>
            <th scope="col">
                Giảm Giá
            </th>
            <th scope="col">
                Hình Ảnh
            </th>
            <th scope="col">
                Ngày Nhập
            </th>
            <th scope="col">
                Mô Tả
            </th>
            <th scope="col">
                Đặc Biệt
            </th>
            <th scope="col">
                Tên Loại
            </th>
            <th scope="col">
                Lượt xem
            </th>
            <th scope="col">
                Update
            </th>
            <th scope="col">
                Delete
            </th>
        </tr>
    </thead>
    <tbody>
        <?php $result = hang_hoa_select_all(false);
        ?>
        <?php foreach ($result as $value) : ?>
           <?php $loai_result = loai_get_info($value['ma_loai']); ?>
            <tr>
                <td> <input type="checkbox" id="checkInput"  value="<?= $value['ma_hh'] ?>"></td>
                <td><?= $value['ma_hh'] ?></td>
                <td><?= $value['ten_hh'] ?></td>
                <td><?= $value['don_gia'] ?></td>
                <td><?= $value['giam_gia'] ?></td>
                <td><img src="..<?= $value['hinh'] ?>" alt="" width="100"></td>
                <td><?= $value['ngay_nhap'] ?></td>
                <td class="text-hidden"><?= $value['mo_ta'] ?></td>
                <td><?= $value['dac_biet'] ?></td>
                <td><?= $loai_result['ten_loai'] ?></td>
                <td><?= $value['so_luot_xem'] ?></td>
                <td><a href="./index.php?ma_sp=<?= $value['ma_hh'] ?>&source=update_sp">Update</a> </td>
                <td><a href="./index.php?ma_sp=<?= $value['ma_hh'] ?>&source=delete_sp" onclick="return confirm('Bạn chắc chứ ?')">Delete</a></td>
            </tr>
        <?php endforeach ?>
        <button class="btn btn-primary mx-2" type="button" id="checkAllCheckbox">Chọn tất cả</button>
        <button class="btn btn-primary mx-2" type="button" id="unSelectAll">Bỏ chọn tất cả</button>
        <form action="./hang_hoa/delete_all_sp.php" method="post">
            <input type="hidden" class="valueChecked" id="setChecked" name="delete_check" value="">
            <button class="btn btn-danger mx-2">Xóa mục đã chọn</button>
        </form>
        <a href="./index.php?source=add_san_pham"><button class="btn btn-success mx-2" type="button">Tạo mới</button></a>
    </tbody>
</table>
<script>
     let selectAll = document.querySelector("#checkAllCheckbox");
    let unSelectAll = document.querySelector("#unSelectAll");
    let checkBoxes = document.querySelectorAll("#checkInput");
    let setChecked = document.querySelector("#setChecked");
    let getCheckboxInput = document.querySelector('.valueChecked').value;
    getCheckboxInput = getCheckboxInput.split(" ");
    let ma_loaiStogate = "";
    let newLocation;
    for (let i = 0; i < checkBoxes.length; i++) {
        checkBoxes[i].onclick = function() {
            let stogageChecked = this.value;
            console.log(stogageChecked);
            if (this.checked) {
                ma_loaiStogate = ma_loaiStogate + " " + this.value;
                setChecked.value = ma_loaiStogate;
                setChecked.value = setChecked.value.trim();
            } else {
                let location = setChecked.value.split(" ");
                if (location.length > 1) {
                    newLocation = location.filter(function(item) {
                        return item !== stogageChecked;
                    });
                } else {
                    console.log(newLocation);
                    newLocation = [];
                    setChecked.value = "";
                    ma_loaiStogate = "";
                }
                if (newLocation.length > 0) {
                    setChecked.value = newLocation.join(" ");
                }
            }
        }
    }

    selectAll.onclick = function() {
        for (let i = 0; i < checkBoxes.length; i++) {
            checkBoxes[i].checked = true;
            ma_loaiStogate = ma_loaiStogate + " " + checkBoxes[i].value;
        }
        console.log(ma_loaiStogate);
        setChecked.value = ma_loaiStogate.trim();
    }

    unSelectAll.onclick = function() {
        for (let i = 0; i < checkBoxes.length; i++) {
            checkBoxes[i].checked = false;
        }
        setChecked.value = "";
        ma_loaiStogate = "";
    }
</script>