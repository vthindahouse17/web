<table class="table table-hover overflow-y-auto">
    <thead>
        <tr>
            <th scope="col">

            </th>
            <th scope="col">
                Mã KH
            </th>
            <th scope="col">
                Tên TK
            </th>
            <th scope="col">
                Email
            </th>
            <th scope="col">
                Hình Ảnh
            </th>
            <th scope="col">
                Địa chỉ
            </th>
            <th scope="col">
                Số điện thoại
            </th>
            <th scope="col">
                Kích hoạt
            </th>
            <th scope="col">
                Vai trò
            </th>
            <th scope="col">
                Update
            </th>
            <th scope="col">
                Delete
            </th>
        </tr>
    </thead>
    <tbody class="overflow-y-auto">
        <?php $result = khach_hang_select_all();
        ?>

        <?php foreach ($result as $value) : ?>
            <tr>
                <td> <input type="checkbox" id="checkInput" name="delete_check" value="<?= $value['ma_kh'] ?>"></td>
                <td><?= $value['ma_kh'] ?></td>
                <td><?= $value['ho_ten'] ?></td>
                <td><?= $value['email'] ?></td>
                <td><img src="..<?= $value['hinh'] ?>" alt="" height="40"></td>
                <td><?= $value['dia_chi'] ?></td>
                <td><?= $value['dien_thoai'] ?></td>
                <td><?= $value['kich_hoat'] ?></td>
                <td><?= $value['vai_tro'] ?></td>
                <td><a href="./index.php?ma_kh=<?= $value['ma_kh'] ?>&source=update_kh">Update</a> </td>
                <td><a href="./index.php?ma_kh=<?= $value['ma_kh'] ?>&source=delete_kh" onclick="return confirm('Bạn chắc chứ ?')">Delete</a></td>
            </tr>
        <?php endforeach ?>
        <button class="btn btn-primary mx-2" type="button" id="checkAllCheckbox">Chọn tất cả</button>
        <button class="btn btn-primary mx-2" type="reset" id="unSelectAll">Bỏ chọn tất cả</button>
        <form action="./khach_hang/delete_all_check.php" method="post">
            <input type="hidden" class="valueChecked" id="setChecked" name="delete_check" value="">
            <button class="btn btn-danger mx-2">Xóa mục đã chọn</button>
        </form>
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
                console.log("No");
                ma_loaiStogate = ma_loaiStogate + " " + this.value;
                setChecked.value = ma_loaiStogate;
                setChecked.value = setChecked.value.trim();
            } else {
                debugger
                console.log("hehe");
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