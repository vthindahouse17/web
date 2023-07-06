<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>X-shop</title>

  <!-- Bootstrap Core CSS -->
  <link href="./css/bootstrap.min.css" rel="stylesheet" />

  <!-- Custom CSS -->
  <link href="./css/blog-home.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <link rel="stylesheet" href="../content/css/main.css">
  <style>
    .swiper {
      width: 100%;
      height: 300px;
    }

    .row-col-3 {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      grid-gap: 32px;
    }

    .mr-2 {
      margin-right: 0.5rem;
    }

    .my-2 {
      margin-top: 0.5rem;
      margin-bottom: 0.5rem;
    }

    .my-4 {
      margin-top: 1rem;
      margin-bottom: 1rem;
    }

    .mb-2 {
      margin-bottom: 0.5rem;
    }

    .mb-4 {
      margin-bottom: 1rem;
    }

    .mb-6 {
      margin-bottom: 1.5rem;
    }

    .mb-8 {
      margin-bottom: 2rem;
    }

    .mt-2 {
      margin-top: 0.5rem;
    }

    .mt-4 {
      margin-top: 1rem;
    }

    .mx-2 {
      margin-left: 0.5rem;
      margin-right: 0.5rem;
    }

    .mx-4 {
      margin-left: 1rem;
      margin-right: 1rem;
    }

    .slide-image {
      width: 100%;
      height: 100%;
      object-fit: contain;
      display: block;
    }

    .product-card {
      background-color: #fff;
      border-radius: 5px;
      padding: 10px;
      overflow: hidden;
      position: relative;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      padding-top: 100%;
    }

    .product-image {
      text-align: center;
      margin-bottom: 20px;
      padding: 18px;
      transition: transform 0.3s ease;
      position: absolute;
      margin-bottom: 20px;
      top: 0;
      left: 0;
      width: 100%;
      height: auto;
      object-fit: cover;
    }

    .product-image:hover img {
      transform: scale(1.1);
    }

    .product-details {
      text-align: center;
    }

    .product-name {
      display: inline-block;
      width: 200px;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .product-price {
      font-size: 16px;
      color: #888;
      margin-bottom: 10px;
    }

    .btn {
      display: inline-block;
      padding: 8px 16px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 4px;
      font-size: 14px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .btn:hover {
      background-color: #0056b3;
    }

    .sidebar-245 {
      margin-top: 40px;
    }

    .right-menu {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .gruop-ip {
      display: flex;
      align-items: center;
    }

    .dp-block {
      display: block !important;
    }

    .dp-inline-block {
      display: inline-block;
    }

    .m-flex {
      display: flex;
    }
    .text-hidden {
      display: inline-block;
      width: 200px;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    @media (max-width: 750px) {
      .right-menu {
        display: flex;
        align-items: center;
      }
    }

    @media (max-width: 750px) {
      .group-ip {
        width: 200px;
      }
    }
  </style>
</head>

<body>