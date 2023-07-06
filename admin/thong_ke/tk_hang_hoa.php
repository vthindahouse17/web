<table class="table table-hover overflow-y-auto">
    <thead>
        <tr>
            <th scope="col">
                Mã Loại
            </th>
            <th scope="col">
                Tên Loại
            </th>
            <th scope="col">
                Số Lượng
            </th>
            <th scope="col">
                Giá nhỏ nhất
            </th>
            <th scope="col">
                Giá lớn Nhất
            </th>
            <th scope="col">
                Tổng giá
            </th>
        </tr>
    </thead>
    <tbody class="overflow-y-auto">
        <?php $result = thong_ke_hang_hoa();
        // print_r($result);
        ?>
        <?php foreach ($result as $value) : ?>
            <tr>
                <td><?= $value['ma_loai'] ?></td>
                <td><?= $value['ten_loai'] ?></td>
                <td><?= $value['so_luong'] ?></td>
                <td><?= $value['gia_min'] ?></td>
                <td><?= $value['gia_max'] ?></td>
                <td><?= $value['tong_gia'] ?></td>
            </tr>
        <?php endforeach ?>
        <a href="./index.php?source=tk_binh_luan"><button class="btn btn-success mx-2" type="button">Thống kê bình luận</button></a>
    </tbody>
</table>