<?php
        $sql = "SELECT * FROM danhmuc WHERE id= :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id',$_GET['id_dm']);
        $stmt->execute();
        $danhmuceuro = $stmt->fetch();

?>
<!--breadcrumbs area start-->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="/">Trang chủ</a></li>
                        <li class="active"><?=isset($_GET['id_dm']) ? $danhmuceuro['name'] : 'DANH MỤC' ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--shop wrapper area-->
<div class="shop_area">
    <div class="container">
        <div class="row shop_reverse">
        <div class="col-lg-3 col-md-10">
                <div class="sidebar_widget">
                    <div class="widget_list widget_banner">
                        <img src="assets/img/banner/banner26.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-10">
                <div class="shop_wrapper">
                    <div class="banner_slider">
                        <img src="assets/img/banner/banner25.jpg" alt="">
                    </div>
                    <!--shop toolbar start-->
                    <div class="shop_toolbar">
                        <div class="list_button">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a class="active" data-bs-toggle="tab" href="#large" role="tab"
                                        aria-controls="large" aria-selected="true"><i class="fa fa-th-large"></i></a>
                                </li>
                                <li>
                                    <a data-bs-toggle="tab" href="#list" role="tab" aria-controls="list"
                                        aria-selected="false"><i class="fa fa-th-list"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--shop toolbar end-->
                    <?php
                            $sql = "SELECT * FROM sanpham ORDER BY id DESC";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            $danhSachSp = $stmt->fetchAll();
                            
                            $sql = "SELECT * FROM sanpham WHERE id_danhmuc = :id_danhmuc ORDER BY id DESC";
                            $stmt = $conn->prepare($sql);
                            $stmt->bindParam(':id_danhmuc',$_GET['id_dm']);
                            $stmt->execute();
                            $danhSachSptheodanhmuc = $stmt->fetchAll();
                    ?>

                    <div class="tab-content tab_four tab_six shop_list">
                        <div class="tab-pane fade show active" id="large" role="tabpanel">
                            <div class="row">
                              <?php
                                   if(isset($_GET['id_dm']) && $_GET['id_dm']>0){
                                      if(empty($danhSachSptheodanhmuc)){
                                        ?>
                                          <spam>Danh mục này không có sản phẩm</spam>
                                        <?php
                                      }else{
                                        foreach ($danhSachSptheodanhmuc as $key => $sp) {
                                        ?>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single_product">
                                                    <div class="product_thumb">
                                                        <a href="?url=chi-tiet-san-pham&id_sp=<?=$sp['id']?>">
                                                            <img style="object-fit: cover;height: 250px;" class="primary_img" src="<?= PATH_FOLDER ?>/image/<?= $sp['hinh_anh']?>"
                                                                alt="Product Image">
                                                            <img style="object-fit: cover;height: 250px;" class="secondary_img" src="<?= PATH_FOLDER ?>/image/<?= $sp['hinh_anh']?>"
                                                                alt="">
                                                        </a>
                                                        <div class="product_action">
        
                                                            <ul>
                                                                <li><a href="#" data-bs-toggle="tooltip" data-placement="top"
                                                                        title="add to cart">+ add to cart</a></li>
                                                                <li><a href="#" data-bs-toggle="tooltip" data-placement="top"
                                                                        title="Compare"><i class="fa fa-refresh"
                                                                            aria-hidden="true"></i></a></li>
                                                                <li><a href="#" data-bs-toggle="tooltip" data-placement="top"
                                                                        title="Add to wishlist"><i class="fa fa-heart-o"
                                                                            aria-hidden="true"></i></a></li>
                                                                <li><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                                        data-placement="top" title="Quick View"><i
                                                                            class="fa fa-eye"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <!-- <div class="sale_percent">
                                                            <span>-4%</span>
                                                        </div> -->
                                                    </div>
                                                    <div class="product_content">
                                                        <div class="product_name">
                                                            <h2><a href="?url=chi-tiet-san-pham&id_sp=<?= $sp['id'] ?>"><?= $sp['ten_nuochoa']?></a></h2>
                                                        </div>
                                                        <div class="product_meta">
                                                            <div class="product_price">
                                                                <span class="current_price"><?= number_format($sp['gia_nuochoa'], 0, '.', ',') ?>VNĐ</span>
                                                            </div>
                                                            <div class="product_ratting">
                                                                <ul>
                                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
        
                                                </div>
                                            </div>
                                        <?php
                                        }
                                      }
                                   }else{
                                    foreach ($danhSachSp as $key => $sp) {
                                    ?>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="single_product">
                                                <div class="product_thumb">
                                                    <a href="?url=chi-tiet-san-pham&id_sp=<?=$sp['id']?>">
                                                        <img class="primary_img" src="<?= PATH_FOLDER ?>/image/<?= $sp['hinh_anh']?>"
                                                            alt="Product Image">
                                                        <img class="secondary_img" src="<?= PATH_FOLDER ?>/image/<?= $sp['hinh_anh']?>"
                                                            alt="">
                                                    </a>
                                                    <div class="product_action">
    
                                                        <ul>
                                                            <li><a href="#" data-bs-toggle="tooltip" data-placement="top"
                                                                    title="add to cart">+ add to cart</a></li>
                                                            <li><a href="#" data-bs-toggle="tooltip" data-placement="top"
                                                                    title="Compare"><i class="fa fa-refresh"
                                                                        aria-hidden="true"></i></a></li>
                                                            <li><a href="#" data-bs-toggle="tooltip" data-placement="top"
                                                                    title="Add to wishlist"><i class="fa fa-heart-o"
                                                                        aria-hidden="true"></i></a></li>
                                                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                                    data-placement="top" title="Quick View"><i
                                                                        class="fa fa-eye"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <!-- <div class="sale_percent">
                                                        <span>-4%</span>
                                                    </div> -->
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_name">
                                                        <h2><a href="?url=chi-tiet-san-pham&id_sp=<?= $sp['id'] ?>"><?= $sp['ten_nuochoa']?></a></h2>
                                                    </div>
                                                    <div class="product_meta">
                                                        <div class="product_price">
                                                            <span class="current_price"><?= number_format($sp['gia_nuochoa'], 0, '.', ',') ?>VNĐ</span>
                                                        </div>
                                                        <div class="product_ratting">
                                                            <ul>
                                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
    
                                            </div>
                                        </div>
                                    <?php
                                    }
                                }
                            ?>                                                                                              
                            </div>
                        </div>
                        <div class="tab-pane fade" id="list" role="tabpanel">
                        <?php
                                   if(isset($_GET['id_dm']) && $_GET['id_dm']>0){
                                      if(empty($danhSachSptheodanhmuc)){
                                        ?>
                                          <spam>Danh mục này không có sản phẩm</spam>
                                        <?php
                                      }else{
                                        foreach ($danhSachSptheodanhmuc as $key => $sp) {
                                        ?>
                            <div class="product_list_item">
                                <div class="row align-items-center">
                                    <div class="col-lg-4 col-md-4">
                                        <div class="product_thumb">
                                            <a href="?url=chi-tiet-san-pham&id_sp=<?= $sp['id'] ?>">
                                                <img class="primary_img" src="<?= PATH_FOLDER ?>/image/<?= $sp['hinh_anh']?>"
                                                    alt="Product Image">
                                                <img class="secondary_img" src="<?= PATH_FOLDER ?>/image/<?= $sp['hinh_anh']?>"
                                                    alt="">
                                            </a>

                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-8">
                                        <div class="product_content">
                                            <div class="product_name">
                                                <h2><a href="?url=chi-tiet-san-pham&id_sp=<?= $sp['id'] ?>"><?= $sp['ten_nuochoa']?></a></h2>
                                            </div>
                                            <div class="product_price">
                                                <span class="current_price"><?= number_format($sp['gia_nuochoa'], 0, '.', ',') ?>VNĐ</span>
                                                <!-- <span class="old_price">$68.00</span> -->
                                            </div>
                                            <div class="product_desc">
                                                <p><?= $sp['mota'] ?></p>
                                            </div>
                                            <div class="product_ratting">
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                </ul>
                                            </div>

                                            <div class="product_action">
                                                <ul>
                                                    <li><a href="#" data-bs-toggle="tooltip" data-placement="top"
                                                            title="add to cart">+ add to cart</a></li>
                                                    <li><a href="#" data-bs-toggle="tooltip" data-placement="top"
                                                            title="Compare"><i class="fa fa-refresh"
                                                                aria-hidden="true"></i></a></li>
                                                    <li><a href="#" data-bs-toggle="tooltip" data-placement="top"
                                                            title="Add to wishlist"><i class="fa fa-heart-o"
                                                                aria-hidden="true"></i></a></li>
                                                    <li><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                            data-placement="top" title="Quick View"><i
                                                                class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                        <?php
                                        }
                                      }
                                   }else{
                                    foreach ($danhSachSp as $key => $sp) {
                                    ?>
                                <div class="product_list_item">
                                <div class="row align-items-center">
                                    <div class="col-lg-4 col-md-4">
                                        <div class="product_thumb">
                                            <a href="?url=chi-tiet-san-pham&id_sp=<?= $sp['id'] ?>">
                                                <img class="primary_img" src="<?= PATH_FOLDER ?>/image/<?= $sp['hinh_anh']?>"
                                                    alt="Product Image">
                                                <img class="secondary_img" src="<?= PATH_FOLDER ?>/image/<?= $sp['hinh_anh']?>"
                                                    alt="">
                                            </a>

                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-8">
                                        <div class="product_content">
                                            <div class="product_name">
                                                <h2><a href="?url=chi-tiet-san-pham&id_sp=<?= $sp['id'] ?>"><?= $sp['ten_nuochoa']?></a></h2>
                                            </div>
                                            <div class="product_price">
                                                <span class="current_price"><?= number_format($sp['gia_nuochoa'], 0, '.', ',') ?>VNĐ</span>
                                                <!-- <span class="old_price">$68.00</span> -->
                                            </div>
                                            <div class="product_desc">
                                                <p><?= $sp['mota'] ?></p>
                                            </div>
                                            <div class="product_ratting">
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                </ul>
                                            </div>

                                            <div class="product_action">
                                                <ul>
                                                    <li><a href="#" data-bs-toggle="tooltip" data-placement="top"
                                                            title="add to cart">+ add to cart</a></li>
                                                    <li><a href="#" data-bs-toggle="tooltip" data-placement="top"
                                                            title="Compare"><i class="fa fa-refresh"
                                                                aria-hidden="true"></i></a></li>
                                                    <li><a href="#" data-bs-toggle="tooltip" data-placement="top"
                                                            title="Add to wishlist"><i class="fa fa-heart-o"
                                                                aria-hidden="true"></i></a></li>
                                                    <li><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                            data-placement="top" title="Quick View"><i
                                                                class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                    <?php
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--shop wrapper start-->