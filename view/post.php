<?php
$_GET['ma_hh'] = isset($_GET['ma_hh']) ? $_GET['ma_hh'] : null;
if ($_GET['ma_hh']) : ?>
  <?php $ma_hh = $_GET['ma_hh']; ?>
  <!-- Navigation -->
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Trang chủ</a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="right-menu" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li>
            <a href="#">Giới Thiệu</a>
          </li>
          <li>
            <a href="#">Liện Hệ</a>
          </li>
          <li>
            <a href="#">Hỏi Đáp</a>
          </li>
          <?php if (isset($_SESSION['user']) && $_SESSION['user']['vai_tro'] == 1) : ?>
            <li>
              <a href="./index.php?source=quan_tri">Quản Trị</a>
            </li>
          <?php endif ?>
        </ul>
        <div class="m-flex mx-4" style="display: flex;">
          <!-- Blog Search Well -->
          <div class="" style="margin-left: 12px;">
            <?php include "./view/search_handle.php"; ?>
          </div>
          <?php if (isset($_SESSION['user'])) : ?>
            <div class="avatar-sign-out" style="margin-left: 3rem;margin-right: -5rem;">
              <?php
              $user_id = $_SESSION['user']['ma_kh'];
              $user_avatar = khach_hang_select_by_id($user_id);
              ?>
              <img src=".<?= $user_avatar['hinh'] ?>" alt="" style=" border-radius: 100%;object-fit: cover;" height="34" width="34">
            </div>
          <?php endif ?>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
  </nav>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <!-- Blog Post Content Column -->
      <?php
      $ma_hh = $_GET['ma_hh'];

      $product_by_id = hang_hoa_select_by_id($ma_hh);
      hang_hoa_tang_so_luot_xem($ma_hh);
      $so_luot_xem = hang_hoa_so_luot_xem($ma_hh);
      ?>
      <div class="col-lg-5">
        <!-- Blog Post -->
        <!-- Image -->
        <?php if (isset($_GET['ma_hh'])) : ?>
          <img class="img-responsive" src=".<?= $product_by_id['hinh'] ?>" alt="" />
        <?php endif ?>


        <hr />
        <!-- Blog Comments -->

        <!-- Comments Form -->
        <?php if (isset($_SESSION['user'])) : ?>
          <?php
          $message = isset($_COOKIE['message']) ? $_COOKIE['message'] : "";
          ?>
          <span class="text-success"><?= $message ?></span>
          <script>
            $(document).ready(function() {
              $("#binh_luan").load("./view/binh_luan/index.php", {
                idPro: <?= $ma_hh ?>
              });
            });
          </script>
          <div id="binh_luan">
          </div>
          <hr />
        <?php else : ?>
          <p class="alert alert-warning">Đăng nhập để có thể bình luận</p>
        <?php endif ?>
        <!-- Posted Comments -->
        <?php $list_comment = binh_luan_select_by_hang_hoa($ma_hh);
        ?>
        <?php if (isset($list_comment[0]['ma_bl'])) : ?>
          <?php foreach ($list_comment as $value) : ?>
            <div class="media mb-4">
              <a class="pull-left" href="#">
                <!-- src="http://placehold.it/64x64" -->

                <?php $tk_kh = khach_hang_select_by_id($value['ma_kh']); ?>
                <img src="./<?= $tk_kh['hinh'] ?>" alt="" height="64" width="64" style="object-fit: cover;">
              </a>
              <div class="media-body">
                <h4 class="media-heading">
                  <?= $tk_kh['ho_ten'] ?>
                  <small> <?= "Post on " . $value['thoi_gian_binh_luan']; ?></small>
                </h4>
                <?= $value['noi_dung']; ?>
              </div>
              <?php
              if (isset($_SESSION['user'])) : ?>
                <?php $user_session = $_SESSION['user'];
                if ($value['ma_kh'] == $user_session['ma_kh']) : ?>
                  <a class="mr-2" href="./index.php?source=sp_detail&ma_bl=<?= $value['ma_bl'] ?>&ql_binh_luan=update_bl&ma_hh=<?= $ma_hh ?>">Update</a>
                  <a href="./view/binh_luan/index.php?source=delete_bl&ma_bl=<?= $value['ma_bl'] ?>&ma_hh=<?= $ma_hh ?>">Delete</a>
                <?php endif ?>
              <?php endif ?>
              <!-- Xử lý update binh_luan -->
              <?php if (
                isset($_GET['ql_binh_luan'])
                && isset($_GET['ma_bl']) && $value['ma_bl'] == $_GET['ma_bl']
              ) : ?>

                <?php
                $ma_bl = $_GET['ma_bl'];
                $binh_luan_result = binh_luan_select_by_id($ma_bl);
                ?>
                <form action="./view/binh_luan/progess_update_bl.php" role="form" method="post">
                  <input type="hidden" value="<?= $ma_hh ?>" name="ma_hh">
                  <input type="hidden" value="<?= $ma_bl ?>" name="ma_bl">
                  <div class="form-group">
                    <textarea class="form-control" rows="5" name="content" required><?= $binh_luan_result['noi_dung'] ?></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              <?php endif ?>
            </div>
          <?php endforeach ?>
        <?php endif ?>
        <!-- Sản phẩm liên quan -->
        <div>
          <?php $hang_hoa_result = hang_hoa_select_by_loai($product_by_id['ma_loai']); ?>
          <h4>Sản phẩm liên quan</h4>
          <?php foreach ($hang_hoa_result as $value) : ?>
            <div>
              <a href="./index.php?source=sp_detail&ma_hh=<?= $value['ma_hh'] ?>"><?= $value['ten_hh'] ?></a>
            </div>
          <?php endforeach ?>
        </div>

      </div>

      <!-- Blog Sidebar Widgets Column -->
      <div class="col-md-4">
        <!-- Blog Search Well -->
        <!-- Title -->
        <?php if (isset($_GET['ma_hh'])) : ?>
          <h1><?= $product_by_id['ten_hh'] ?></h1>
        <?php endif ?>
        <div>
          <h3>Khuyễn mãi đặc biệt mua hàng</h3>
        </div>
        <!-- Author -->
        <?php if (isset($_GET['ma_hh'])) : ?>
          <del class="lead">$<?= $product_by_id['don_gia'] ?></del>
          <span class="lead">$<?= ($product_by_id['don_gia'] - ($product_by_id['don_gia'] * ($product_by_id['giam_gia'] / 100))) ?></span>
        <?php endif ?>
        <p><?= $product_by_id['mo_ta'] ?></p>
      </div>
      <!-- /.row -->
      <div class="col-md-3">
        <div class="well">
          <h4>Danh Mục Sản Phẩm</h4>
          <div class="row">
            <div class="col-lg-12">
              <ul class="list-unstyled">
                <?php $category = loai_select_all(false) ?>
                <?php foreach ($category as $key => $value) : ?>
                  <li><a href="./index.php?source=loai&ma_loai=<?= $value['ma_loai'] ?>"><?= $value['ten_loai'] ?></a></li>
                <?php endforeach ?>
              </ul>
            </div>
          </div>
          <!-- /.row -->
        </div>

        <!-- Side Widget Well -->
        <div class="well">
          <h4>Top 10 sản phẩm Yêu thích</h4>
          <?php $top_10_product = hang_hoa_select_top_10(); ?>
          <?php foreach ($top_10_product as $value) : ?>
            <span>
              <a class="dp-block my-4" href="./index.php?source=sp_detail&ma_hh=<?= $value['ma_hh'] ?>">
                <img src=".<?= $value['hinh'] ?>" alt="" height="20px" class="mr-2">
                <?= $value['ten_hh']; ?></a>
            </span>
            </span>
          <?php endforeach ?>
        </div>
      </div>
      <hr />

    </div>
    <!-- Footer -->
  <?php else : ?>
    <h3 class="alert alert warning"><?= "Không có sản phẩm trong hệ thống" ?></h3>
  <?php endif ?>