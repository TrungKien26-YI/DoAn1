<!doctype html>
<html class="no-js" lang="zxx">

<!-- Mirrored from htmldemo.net/beeta/beeta/index-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Jul 2024 12:48:36 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Beeta - Multipurpose eCommerce Bootstrap 4 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= PATH_FOLDER ?>/public/nuochoa/assets/img/favicon.png">

    <!-- all css here -->
    <link rel="stylesheet" href="<?= PATH_FOLDER ?>/public/nuochoa/assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="<?= PATH_FOLDER ?>/public/nuochoa/assets/css/bundle.css">
    <link rel="stylesheet" href="<?= PATH_FOLDER ?>/public/nuochoa/assets/css/plugins.css">
    <link rel="stylesheet" href="<?= PATH_FOLDER ?>/public/nuochoa/assets/css/style.css">
    <link rel="stylesheet" href="<?= PATH_FOLDER ?>/public/nuochoa/assets/css/responsive.css">
    <script src="<?= PATH_FOLDER ?>/public/nuochoa/assets/js/vendor/modernizr-3.7.1.min.js"></script>
</head>

<body>
    <!-- Add your site or application content here -->

    <!--header area start-->
    <header class="header_area header_four">
        <div class="container-fluid p-0">
            <!--header top start-->
            <div class="header_top">
                <div class="row align-items-center no-gutters">
                    <div class="col-lg-7 col-md-12">
                        <div class="left_info">
                            <ul>
                                <li><a href="#"><i class="fa fa-phone"></i>0362423893</a></li>
                                <li><a href="#"><i class="fa fa-envelope-open-o"></i>trungkienpow2003@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12">
                        <div class="right_info text-right">
                            <ul>
                                <?php
                                    if(isset($_SESSION['userID'])) {
                                        ?>
                                            <li class="top_links"><a href="#">Tài khoản của tôi <i class="fa fa-angle-down"></i></a>
                                                <ul class="dropdown_links">
                                                    <li><a href="checkout.html">Xin chào: <?=$user['hoten'] ?> </a></li>
                                                    <?php
                                                        if($user['role'] == 'admin'){
                                                            ?>
                                                              <li><a href="<?=PATH_FOLDER?>/admin">Vào trang quản trị </a></li>
                                                            <?php    
                                                        }
                                                    ?>  
                                                    <li><a href="?url=don-hang">Đơn hàng </a></li>
                                                    <li><a href="?url=giohang">Giỏ hàng </a></li>
                                                    <li><a href="?url=dangxuat" onclick="return confirm('Bạn muốn đăng xuất?')">Đăng xuất</a></li>
                                                </ul>
                                            </li>
                                        <?php
                                    } else {
                                        ?>
                                            <li><a href="?url=auth">Đăng nhập & Đăng ký</a></li>
                                        <?php
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--header top end-->
            <!--header bottom start-->
            <div class="header_bottom sticky-header">
                <div class="row align-items-center">
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="/"><img src="<?= PATH_FOLDER ?>/public/nuochoa/assets/img/logo/logo2.png"
                                    alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="main_menu_inner">
                            <div class="main_menu d-none d-lg-block">
                                <ul>
                                    <li class="active"><a href="/">Trang chủ</a>
                                    </li>
                                    <li><a href="?url=danh-muc">Danh mục<i class="fa fa-angle-down"></i></a>
                                        <?php
                                        $sql = "SELECT * FROM danhmuc LIMIT 10";
                                        $stmt = $conn->prepare($sql);
                                        $stmt->execute();
                                        $danhSachDanhMuc = $stmt->fetchAll();
                                        ?>
                                        <ul class="sub_menu pages">
                                            <?php
                                            foreach ($danhSachDanhMuc as $key => $dm) {
                                                ?>
                                                <li><a href="?url=danh-muc&id_dm=<?= $dm['id'] ?>"><?= $dm['name'] ?></a></li>
                                                <?php
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                    <li><a href="">Tin tức<i class=""></i></a>
                                        <!-- <ul class="mega_menu">
                                            <li><a href="#">Blog Layouts</a>
                                            </li>
                                            <li><a href="#">Tư vấn</a>
                                            </li>
                                            <li><a href="#">giới thiệu</a>
                                            </li>
                                        </ul> -->
                                    </li>
                                    <li><a href="">Tư vấn <i class=""></i></a>
                                        <!-- <ul class="sub_menu pages">
                                            <li><a href="about.html">About Us</a></li>
                                            <li><a href="services.html">services</a></li>
                                            <li><a href="faq.html">Frequently Questions</a></li>
                                            <li><a href="login.html">login</a></li>
                                            <li><a href="my-account.html">my account</a></li>
                                            <li><a href="404.html">Error 404</a></li>
                                        </ul> -->
                                    </li>
                                    <li><a href="">Giới thiệu</a></li>
                                </ul>

                            </div>
                            <div class="mobile-menu d-lg-none">
                                <nav>
                                    <ul>
                                        <li><a href="index.html">Home</a>
                                            <ul>
                                                <li><a href="index.html">Fashion Home 1</a></li>
                                                <li><a href="index-2.html">Fashion Home 2</a></li>
                                                <li><a href="index-3.html">Fashion Home 3</a></li>
                                                <li><a href="index-4.html">Cosmetic Home 1</a></li>
                                                <li><a href="index-5.html">Cosmetic Home 2</a></li>
                                                <li><a href="index-6.html">Cosmetic Home 3</a></li>
                                                <li><a href="index-7.html">Cosmetic Home 4</a></li>
                                                <li><a href="christmas.html">Christmas Home</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="shop.html">shop</a>
                                            <ul>
                                                <li><a href="#">Shop Layouts</a>
                                                    <ul>
                                                        <li><a href="shop-fullwidth.html">Full Width</a></li>
                                                        <li><a href="shop-fullwidth-list.html">Full Width list</a></li>
                                                        <li><a href="shop-right-sidebar.html">Right Sidebar </a></li>
                                                        <li><a href="shop-right-sidebar-list.html"> Right Sidebar
                                                                list</a></li>
                                                        <li><a href="shop-list.html">List View</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">other Pages</a>
                                                    <ul>
                                                        <li><a href="portfolio.html">portfolio</a></li>
                                                        <li><a href="portfolio-details.html">portfolio details</a></li>
                                                        <li><a href="cart.html">cart</a></li>
                                                        <li><a href="checkout.html">Checkout</a></li>
                                                        <li><a href="my-account.html">my account</a></li>
                                                        <li><a href="wishlist.html">Wishlist</a></li>

                                                    </ul>
                                                </li>
                                                <li><a href="#">Product Types</a>
                                                    <ul>
                                                        <li><a href="single-product.html">product details</a></li>
                                                        <li><a href="product-grouped.html">product grouped</a></li>
                                                        <li><a href="product-sidebar.html">product sidebar</a></li>
                                                        <li><a href="product-gallery.html">product gallery</a></li>
                                                        <li><a href="product-slider.html">product slider</a></li>
                                                        <li><a href="variable-product.html">variable product</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="blog.html">blog</a>
                                            <ul>
                                                <li><a href="#">Blog Layouts</a>
                                                    <ul>

                                                        <li><a href="blog-details.html">blog details</a></li>
                                                        <li><a href="blog-details-sidebar.html">blog details Sidebar</a>
                                                        </li>
                                                        <li><a href="blog-none-sidebar.html">No Sidebar</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">blog Pages</a>
                                                    <ul>
                                                        <li><a href="blog-none-sidebar.html">Author</a></li>
                                                        <li><a href="blog-sidebar.html">Category</a></li>
                                                        <li><a href="#">Blog tag</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Post Formats</a>
                                                    <ul>
                                                        <li><a href="blog-sidebar.html">blog sidebar</a></li>
                                                        <li><a href="blog-fullwidth.html">blog fullwidth</a></li>
                                                        <li><a href="blog-fullwidth.html">Gallery Format</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="#">pages</a>
                                            <ul>
                                                <li><a href="about.html">About Us</a></li>
                                                <li><a href="services.html">services</a></li>
                                                <li><a href="faq.html">Frequently Questions</a></li>
                                                <li><a href="login.html">login</a></li>
                                                <li><a href="404.html">Error 404</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html">Contact Us</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="search_area search_four">
                            <div class="search_dropdown">
                            </div>
                            <div class="shopping_cart cart_four">
                                <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                <!--mini cart-->
                                <div class="mini_cart">
                                <?php
                                    $sql = "SELECT 
                                                giohang.id as id_cart,
                                                giohang.id_sanpham,
                                                giohang.id_taikhoan,
                                                giohang.soluong,
                                                sanpham.id,
                                                sanpham.ten_nuochoa,
                                                sanpham.hinh_anh,
                                                sanpham.gia_nuochoa                                    
                                            FROM 
                                                giohang
                                            INNER JOIN
                                                sanpham ON giohang.id_sanpham = sanpham.id
                                             WHERE 
                                                id_taikhoan = :id_taikhoan LIMIT 3";
                                            $stmt = $conn->prepare($sql);
                                            $stmt->bindParam(':id_taikhoan', $_SESSION['userID']);
                                            $stmt->execute();
                                            $listgiohang = $stmt->fetchAll();
                                ?>
                                    <?php
                                        $tong = 0;
                                        $thanhtien = 0;
                                        foreach ($listgiohang as $sanPham){
                                            $tong = $sanPham['gia_nuochoa'] * $sanPham['soluong'];
                                            $thanhtien += $tong;
                                        ?>
                                    <div class="cart_item">
                                         <div class="cart_img">
                                        <a href="#"><img src="<?= PATH_FOLDER ?>/image/<?=$sanPham['hinh_anh']?>"alt=""></a>
                                    </div>
                                        <div class="cart_info">
                                            <a href="#"><?=$sanPham['ten_nuochoa']?></a>
                                            <span class="quantity">Số lượng: <?=$sanPham['soluong']?></span>
                                            <span class="cart_price"><?= number_format($sanPham['gia_nuochoa'], 0, ',', '.') ?> VNĐ</span>
                                            <div class="cart_remove">
                                            <a title="Remove this item" href="?url=deleteCart&id_cart=<?=$sanPham['id_cart']?>"><i class="fa fa-times-circle"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <div class="total_price">
                                        <span> Tổng: </span>
                                        <span class="prices"><?= number_format($thanhtien, 0, ',', '.') ?> VNĐ</span>
                                    </div>
                                    <div class="cart_button">                                     
                                        <a href="?url=giohang"> xem giỏ hàng</a>
                                    </div>
                                </div>
                                <!--mini cart end-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--header area end-->