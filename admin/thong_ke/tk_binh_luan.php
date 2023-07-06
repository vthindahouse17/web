<table class="table table-hover overflow-y-auto">
    <thead>
        <tr>
            <th scope="col">
                Mã hàng hóa
            </th>
            <th scope="col">
                Tên Hàng hóa
            </th>
            <th scope="col">
                Số Lượng
            </th>
            <th scope="col">
                Ngày cũ nhất
            </th>
            <th scope="col">
                Ngày mới nhất
            </th>
        </tr>
    </thead>
    <tbody class="overflow-y-auto">
        <?php $result = thong_ke_binh_luan();
        // print_r($result);
        ?>
        <?php foreach ($result as $value) : ?>
            <tr>
                <td><?= $value['ma_hh'] ?></td>
                <td><?= $value['ten_hh'] ?></td>
                <td><?= $value['so_luong'] ?></td>
                <td><?= $value['ngay_cu_nhat'] ?></td>
                <td><?= $value['ngay_moi_nhat'] ?></td>
            </tr>
        <?php endforeach ?>
        <a href="./index.php?source=tk_hang_hoa"><button class="btn btn-success mx-2" type="button">Thống kê sản phẩm</button></a>
    </tbody>
</table>