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
            <a class="navbar-brand" href="./index.php">Trang Chủ</a>
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
            <div class="">
                <!-- Blog Search Well -->
                <div class="">
                    <?php include "./view/search_handle.php" ?>
                </div>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
</nav>

<!-- Page Content -->
<div class="container">
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <!-- First Blog Post -->
            <hr />
            <?php
            $message = isset($_COOKIE['message']) ? $_COOKIE['message'] : "";
            ?>
            <span class="text-success"><?= $message ?></span>
            <?php
            ?>
            <form action="./view/login/progess_forget_password.php" method="post">
                <div class="form-group">
                    <div class="form-group ">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group ">
                        <label for="user_name">Tài khoản</label>
                        <input type="text" name="user_name" id="user_name" class="form-control" required>
                    </div>
                    <div class="form-group ">
                        <label for="password">Mật khẩu mới</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <button class="btn btn-primary mt-2" type="submit">Đổi mật khẩu</button>
                </div>
            </form>
            <hr />
        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-4" style="margin-top: 40px;">
            <div class="well form-group mt-6 ">
                <h4>Tài khoản</h4>
                <?php include "./view/login/account_sidebar.php" ?>
                <form action="./view/login/login.php" method="post">
                    <?php if (isset($_SESSION['user'])) { ?>
                        <a href="./index.php?source=sign_out">
                            <button class="btn btn-primary mt-2" type="button">Đăng xuất</button>
                        </a>
                    <?php } else { ?>
                        <div class="form-group ">
                            <label for="user_name">Tài khoản</label>
                            <input type="text" name="user_name" id="user_name" class="form-control" required>
                        </div>
                        <div class="form-group ">
                            <label for="password">Mật khẩu</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>

                        <button class="btn btn-primary mt-2" type="submit">Đăng nhập</button>
                    <?php } ?>
                </form>
                <a href="./index.php?source=forget_pw" class="mt-4 dp-block">Quên mật khẩu</a>

                <!-- /.input-group -->
            </div>

            <!-- Blog Categories Well -->
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
                    <!-- /.col-lg-6 -->
                    <!-- <div class="col-lg-6">
                <ul class="list-unstyled">
                  <li><a href="#">Category Name</a></li>
                  <li><a href="#">Category Name</a></li>
                  <li><a href="#">Category Name</a></li>
                  <li><a href="#">Category Name</a></li>
                </ul>
              </div> -->
                    <!-- /.col-lg-6 -->
                </div>
                <!-- /.row -->
            </div>

            <!-- Side Widget Well -->
            <div class="well">
                <h4>Top 10 sản phẩm được yêu thích nhất</h4>
                <?php $top_10_product = hang_hoa_select_top_10(); ?>
                <?php foreach ($top_10_product as $value) : ?>
                    <span>
                        <a href="./index.php?source=sp_detail&ma_hh=<?= $value['ma_hh'] ?>"><?= $value['ten_hh']; ?></a>
                    </span>
                <?php endforeach ?>
            </div>
        </div>
    </div>
    <!-- /.row -->

    <hr />

    <!-- Footer -->