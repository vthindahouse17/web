<?php include "../dao/pdo.php"; ?>
<?php include "../dao/loai.php"; ?>

<?php include "../includes/header.php" ?>
<link rel="stylesheet" href="./adminCss/main.css">
<div class="container-fluid wrapper">
    <header>
        <nav class="admin_menu shadow-sm">
            <div class="d-flex justify-content-between align-items-center py-2">
                <div><a href="index.php" class="text-light" style="height: 50px;padding: 15px 15px; font-size: 18px;line-height: 20px; color: #9d9d9d;text-decoration: none;">Admin</a></div>
                <div class="dropdown d-flex align-items-center">
                    <div class="mx-4 text-light"><a href="index.php" style="height: 50px;padding: 15px 15px; font-size: 18px;line-height: 20px; color: #fff;text-decoration: none;">Trang chủ</a></div>
                    <button class="dropdown-toggle text-light btn btn-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-user mx-1 text-light"></i>
                        User
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="row">
        <?php include "./sidebar.php" ?>
        <div class="col-10 mt-5 mr-5 main_content">
            <div class="bg-white p-2 overflow-y-auto">
                <?php
                if (isset($_GET['source'])) {
                    $source = $_GET['source'];
                } else {
                    $source = '';
                }
                switch ($source) {
                    case 'add_loai':
                        include ".add_loai.php";
                        break;
                    case 'update_loai':
                        include "./form_update_loai.php";
                        break;
                    case 'view_loai':
                        include "./view_loai.php";
                        break;
                    default:
                        include "./view_all.php";
                }

                ?>
            </div>

        </div>
    </main>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<?php include "../includes/footer.php" ?>