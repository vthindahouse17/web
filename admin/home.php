<div class="container-fluid wrapper overflow-hidden">
    <header>
        <nav class="admin_menu shadow-sm">
            <div class="d-flex justify-content-between align-items-center py-2">
                <div><a href="index.php" class="text-light" style="height: 50px;padding: 15px 15px; font-size: 18px;line-height: 20px; color: #9d9d9d;text-decoration: none;">Admin</a></div>
                <div class="dropdown d-flex align-items-center">
                    <div class="mx-4 text-light"><a href="index.php" style="height: 50px;padding: 15px 15px; font-size: 18px;line-height: 20px; color: #fff;text-decoration: none;">Trang chủ</a></div>
                    <button class="dropdown-toggle text-light btn btn-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-user text-light"></i>
                        User
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="./index.php?source=sign_out">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="row">
        <?php include "./sidebar.php" ?>
        <div class="col-10 mt-5 mr-5 main_content">
            <div class="bg-white p-2">
                <h1 class="alert alert-success fw-normal my-2" role="alert">
                    Trang Quản Trị Website
                </h1>
               <div class="row">
                
               </div>
            </div>
    </main>
</div>