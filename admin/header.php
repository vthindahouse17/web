<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>X-shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../fonts/icon/fontawesome-free-6.3.0-web/css/all.min.css">
    <link rel="stylesheet" href="./adminCss/main.css">
</head>
<style>
    .text-hidden {
        display: inline-block;
        width: 100px;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
        -webkit-line-clamp: 6;
    }
</style>

<body>
    <div class="container-fluid wrapper overflow-hidden">
        <header>
            <nav class="admin_menu shadow-sm">
                <div class="d-flex justify-content-between align-items-center py-2">
                    <div><a href="index.php" class="text-light" style="height: 50px;padding: 15px 15px; font-size: 18px;line-height: 20px; color: #9d9d9d;text-decoration: none;">Admin</a></div>
                    <div class="dropdown d-flex align-items-center">
                        <div class="mx-4 text-light"><a href="../index.php" style="height: 50px;padding: 15px 15px; font-size: 18px;line-height: 20px; color: #fff;text-decoration: none;">Trang chủ</a></div>
                        <button class="dropdown-toggle text-light btn btn-dark me-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user mx-1 text-light"></i>
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
        <main class="row overflow-y-auto overflow-x-hidden" style="height: 100vh !important">
            <?php include "./sidebar.php" ?>
            <div class="col-10 mt-5 mr-5 main_content">
                <div class="bg-white p-2">
                    <h1 class="bg-success-subtle rounded-2 py-4 px-2 fw-normal my-2" role="alert">
                        Trang Quản Trị Website
                    </h1>
                    <?php
                    $message = isset($_COOKIE['message']) ? $_COOKIE['message'] : "";
                    ?>
                    <span class="text-success"><?= $message ?></span>
                    <div class="row ">
                        <div class="col">