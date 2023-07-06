<?php
    session_start();
    $idPro = $_REQUEST['idPro'];
    $user_id = isset($_SESSION['user'])?$_SESSION['user']:"";
?>
<div class="well">
    <h4>Leave a Comment:</h4>
    <form action="./view/binh_luan/progess_add_binh_luan.php" role="form" method="post">
        <input type="hidden" value="<?= $idPro ?>" name="ma_hh">
        <input type="hidden" value="<?= $user_id['ma_kh'] ?>" name="ma_user">
        <input type="hidden" name="user_hinh" value="<?= $user_id['hinh'] ?>">
        <div class="form-group">
            <textarea class="form-control" rows="3" name="content" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
