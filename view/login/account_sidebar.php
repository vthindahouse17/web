<?php if (isset($_SESSION['user'])) : ?>
    <div style="text-align: center;">
        <?php 
            // $user_avatar = $_SESSION['user']['hinh'] != ""?$_SESSION['user']['hinh']:"/content/images/anhdd.png";
            $user_id = $_SESSION['user']['ma_kh'];
            $user_avatar = khach_hang_select_by_id($user_id);
            $user_avatar = isset($user_avatar) ? $user_avatar:"/content/images/anhdd.png";
        ?>
        <img src=".<?= $user_avatar['hinh'] ?>" alt="" height="100px">
    </div>
    <div>
        <?php if ($_SESSION['user']['vai_tro'] == 1) : ?>
            <a href="./index.php?source=quan_tri"><button class="btn btn-primary mt-2" type="button">Quản trị</button></a> <br>
        <?php endif ?>
        <a href="./index.php?source=update_account"><button class="btn btn-primary mt-2" type="button">Cập nhật tài khoản</button></a>
        <a href="./index.php?source=forget_pw" class="mt-4 dp-block"><button class="btn btn-primary mt-2" type="button">Quên mật khẩu</button></a>
    </div>
<?php endif ?>