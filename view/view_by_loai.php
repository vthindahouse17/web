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
            <div class="m-flex mx-4" style="display: flex;">
                <!-- Blog Search Well -->
                <div>
                    <?php include "./view/search_handle.php" ?>
                </div>
                <?php if (isset($_SESSION['user'])) : ?>
                    <div style="margin-left: 3rem;margin-right: -5rem;">
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
        <!-- Blog Entries Column -->
        <div class="col-md-9">
            <!-- First Blog Post -->
            <hr />
            <div class="swiper mb-8">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide">
                        <img src="./content/images/newCard.jpg" alt="" class="img-responsive slide-image" style="width: 100%;height: 100%;object-fit: cover;display: block;" />
                    </div>
                    <div class="swiper-slide">
                        <img src="./content/images/asus-tuf-gaming-dual-geforce-rtx-4060-ti-edge-up-feature.jpg" alt="" class="img-responsive slide-image " style="width: 100%;height: 100%;object-fit: cover;display: block;" />
                    </div>
                    <div class="swiper-slide">
                        <img src="./content/images/POST-01-1-2048x1373.jpg" alt="" class="img-responsive slide-image " style="width: 100%;height: 100%;object-fit: cover;display: block;" />
                    </div>
                    ...
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

                <!-- If we need scrollbar -->
                <!-- <div class="swiper-scrollbar"></div> -->
            </div>
            <div class="row-col-4">
                <?php
                $ma_loai = $_GET['ma_loai'];
                $product_result = hang_hoa_select_by_loai($ma_loai);
                ?>
                <div class="row-col-3">
                    <?php if (isset($product_result[0]['ma_hh'])) : ?>
                        <?php foreach ($product_result as $key => $value) : ?>
                            <div class="product-card">
                                <a href="./index.php?source=sp_detail&ma_hh=<?= $value['ma_hh'] ?>">
                                    <img class="product-image" src=".<?= $value['hinh'] ?>" alt="" />
                                </a>
                                <div>
                                    <a href="./index.php?source=sp_detail&ma_hh=<?= $value['ma_hh'] ?>" class="product-name"><?= $value['ten_hh'] ?></a>
                                </div>
                                <div>
                                    <span class="product-price">$<?= $value['don_gia'] ?></span>
                                </div>
                                <a href="./index.php?source=sp_detail&ma_hh=<?= $value['ma_hh'] ?>"><button class="btn btn-primary">Chi tiết</button></a>
                            </div>

                        <?php endforeach ?>
                    <?php endif ?>
                </div>
            </div>
            <hr />
            <!-- Pager -->
            <ul class="pager">
                <li class="previous">
                    <a href="#">&larr; Older</a>
                </li>
                <li class="next">
                    <a href="#">Newer &rarr;</a>
                </li>
            </ul>
        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-3" style="margin-top: 40px;">
            <div class="well form-group mt-6 ">
                <h4>Tài khoản</h4>
                <?php
                $message = isset($_COOKIE['message']) ? $_COOKIE['message'] : "";
                ?>
                <span class="text-success"><?= $message ?></span>
                <?php
                $sign_in_or_sign_up = isset($_GET['sign_up']) ? "./view/sign_up.php" : "./view/login.php";
                ?>
                <?php include "./view/login/account_sidebar.php" ?>
                <form action="<?= $sign_in_or_sign_up ?>" method="post">
                    <?php if (isset($_SESSION['user'])) { ?>
                        <a href="./index.php?source=sign_out">
                            <button class="btn btn-primary mt-2" type="button">Đăng xuất</button>
                        </a>
                    <?php } else { ?>
                        <div class="form-group ">
                            <label for="user_name">Tài khoản</label>
                            <input type="text" name="user_name" id="user_name" class="form-control">
                        </div>
                        <div class="form-group ">
                            <label for="password">Mật khẩu</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <?php if (!isset($_GET['sign_up'])) { ?>
                            <button class="btn btn-primary mt-2" type="submit">Đăng nhập</button>
                        <?php } ?>
                        <?php $button_type = isset($_GET['sign_up']) ? "submit" : "button"; ?>
                        <a href="./index.php?sign_up"><button class="btn btn-primary mt-2" type="<?= $button_type ?>">Đăng Ký</button></a>
                    <?php } ?>
                </form>
                <a href="./index.php?source=forget_pw" class="mt-4 dp-block"><button class="btn btn-primary mt-2" type="button">Quên mật khẩu</button></a>
                <!-- /.input-group -->
            </div>

            <!-- Blog Categories Well -->
            <div class="well">
                <h4>Categories</h4>
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
                <h4>Top 10 sản phẩm được yêu thích nhất</h4>
                <?php $top_10_product = hang_hoa_select_top_10(); ?>
                <?php foreach ($top_10_product as $value) : ?>
                    <span>
                        <a class="dp-block" href="./index.php?source=sp_detail&ma_hh=<?= $value['ma_hh'] ?>">
                            <img class="my-4 mr-2" src=".<?= $value['hinh'] ?>" alt="" height="40px" width="40px" style="object-fit: contain;">
                            <?= $value['ten_hh']; ?></a>
                    </span>
                <?php endforeach ?>
            </div>
        </div>
    </div>
    <!-- /.row -->

    <hr />

    <!-- Footer -->