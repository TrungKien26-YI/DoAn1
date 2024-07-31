<?php
$sql = "SELECT 
            sanpham.id,
            sanpham.ten_nuochoa,
            sanpham.gia_nuochoa,
            sanpham.hinh_anh,
            sanpham.id_danhmuc,
            danhmuc.id,
            danhmuc.name
        FROM
            sanpham
        INNER JOIN
            danhmuc ON sanpham.id_danhmuc = danhmuc.id
        ;";
$stmt = $conn->prepare($sql);
$stmt->execute();
$danhSachSp = $stmt->fetchAll();

// echo "<pre>";
// print_r($danhSachSp);
?>

<!--slider area start-->
<div class="slider_area slider_four">
    <div class="slider_active owl-carousel">
        <div class="single_slider slider_seven">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="slider_content">
                            <h4>view our</h4>
                            <h1>coat hoody</h1>
                            <p>products now</p>
                            <a href="#">shop the collection</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single_slider slider_eight">
            <div class="container">
                <div class="row align-items-center p-0">
                    <div class="col-lg-12 text-center">
                        <div class="slider_content content_four">
                            <h4>view our</h4>
                            <h1>coat hoody</h1>
                            <p>products now</p>
                            <a href="#">shop the collection</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--slider area end-->
<!--banner section area-->
<div class="banner_section section_four">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="single_banner">
                    <a href="#"><img src="<?= PATH_FOLDER ?>/public/nuochoa/assets/img/banner/banner10.jpg" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="single_banner">
                    <a href="#"><img src="<?= PATH_FOLDER ?>/public/nuochoa/assets/img/banner/banner11.jpg" alt=""></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single_banner">
                    <a href="#"><img src="<?= PATH_FOLDER ?>/public/nuochoa/assets/img/banner/banner12.jpg" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--banner section end-->
<!--new product start-->
<div class="new_product_area">
    <div class="container">
        <?php
        $sql = "SELECT * FROM danhmuc LIMIT 10";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $danhSachDanhMuc = $stmt->fetchAll();
        ?>
        <div class="product_tab_button">
            <ul class="nav" role="tablist">
                <?php
                foreach ($danhSachDanhMuc as $key => $dm) {
                    ?>
                    <li>
                        <a class="<?= $key === 0 ? 'active' : '' ?>" data-bs-toggle="tab" href="#featured<?= $dm['id'] ?>"
                            role="tab" aria-controls="featured<?= $dm['id'] ?>" aria-selected="true"><?= $dm['name'] ?></a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <div class="tab-content tab_four">
            <?php
            foreach ($danhSachDanhMuc as $key => $danhMuc) {
                $sql = "SELECT * FROM sanpham WHERE id_danhmuc = :id_danhmuc";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':id_danhmuc', $danhMuc['id']);
                $stmt->execute();
                $danhSachSp = $stmt->fetchAll();
                ?>
                <div class="tab-pane fade <?= $key === 0 ? 'show active' : '' ?>" id="featured<?= $danhMuc['id'] ?>"
                    role="tabpanel">
                    <div class="row">
                        <div class="product_active owl-carousel">
                            <?php
                            foreach ($danhSachSp as $sp) {
                                ?>
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a href="?url=chi-tiet-san-pham&id_sp=<?= $sp['id'] ?>">
                                                <img style="object-fit: cover;height: 350px;" class="primary_img"
                                                    src="../image/<?= $sp['hinh_anh'] ?>" alt="Product Image">
                                                <img style="object-fit: cover;height: 350px;" class="secondary_img"
                                                    src="../image/<?= $sp['hinh_anh'] ?>" alt="">
                                            </a>
                                            <div class="product_action">
                                                <ul>
                                                    <li><a href="#" data-bs-toggle="tooltip" data-placement="top"
                                                            title="add to cart">+ add to cart</a></li>
                                                    <li><a href="#" data-bs-toggle="tooltip" data-placement="top"
                                                            title="Compare"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                                                    </li>
                                                    <li><a href="#" data-bs-toggle="tooltip" data-placement="top"
                                                            title="Add to wishlist"><i class="fa fa-heart-o"
                                                                aria-hidden="true"></i></a></li>
                                                    <li><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                            data-placement="top" title="Quick View"><i
                                                                class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <div class="product_name">
                                                <h2><a
                                                        href="?url=chi-tiet-san-pham&id_sp=<?= $sp['id'] ?>"><?= $sp['ten_nuochoa'] ?></a>
                                                </h2>
                                            </div>
                                            <div class="product_meta">
                                                <div class="product_price">
                                                    <span
                                                        class="current_price"><?= number_format($sp['gia_nuochoa'], 0, '.', ',') ?>
                                                        VNĐ</span>
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
                            ?>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>

        </div>
    </div>
</div>
<!--new product start-->

<!--newsletter area start-->
<!-- <div class="newsletter_area news_four">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="newsletter_content">
                    <h2>Get <span>10%</span> Discount</h2>
                    <p>Subscribe to the Beeta mailing list to receive an update on special<br> promotions, new products,
                        other discount information and more</p>
                    <form action="#">
                        <input placeholder="Your email address" type="text">
                        <button type="submit">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!--newsletter area end-->
<!--blog area start-->
<!-- <div class="blog_area blog_four">
    <div class="container">
        <div class="section_title">
            <div class="row">
                <div class="col-12">
                    <h2>From Our Blog</h2>
                    <p>Consequat magna massa vel suspendisse morbi aliquam faucibus ligula ante ipsum ac nulla.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="blog_active owl-carousel">
                <div class="col-lg-4">
                    <div class="single_blog">
                        <div class="blog_thumb">
                            <a href="blog-details.html"><img
                                    src="<?= PATH_FOLDER ?>/public/nuochoa/assets/img/blog/blog6.jpg" alt=""></a>
                        </div>
                        <div class="blog_content">
                            <div class="blog_title">
                                <h3><a href="blog-details.html">Blog image post</a></h3>
                            </div>
                            <div class="blog_meta">
                                <i class="fa-calendar fa"></i>
                                <span class="post_date">october 10, 2018</span>
                                <span class="comment"> <a href="#">3 comments</a></span>
                            </div>
                            <div class="blog_desc">
                                <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean
                                    posuere libero eu augue condimentum rhoncus. Praesent</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single_blog">
                        <div class="blog_thumb">
                            <a href="blog-details.html"><img
                                    src="<?= PATH_FOLDER ?>/public/nuochoa/assets/img/blog/blog7.jpg" alt=""></a>
                        </div>
                        <div class="blog_content">
                            <div class="blog_title">
                                <h3><a href="blog-details.html">Post with Gallery</a></h3>
                            </div>
                            <div class="blog_meta">
                                <i class="fa-calendar fa"></i>
                                <span class="post_date">october 10, 2018</span>
                                <span class="comment"> <a href="#">3 comments</a></span>
                            </div>
                            <div class="blog_desc">
                                <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean
                                    posuere libero eu augue condimentum rhoncus. Praesent</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single_blog">
                        <div class="blog_thumb">
                            <a href="blog-details.html"><img
                                    src="<?= PATH_FOLDER ?>/public/nuochoa/assets/img/blog/blog8.jpg" alt=""></a>
                        </div>
                        <div class="blog_content">
                            <div class="blog_title">
                                <h3><a href="blog-details.html">Post with Audio</a></h3>
                            </div>
                            <div class="blog_meta">
                                <i class="fa-calendar fa"></i>
                                <span class="post_date">october 10, 2018</span>
                                <span class="comment"> <a href="#">3 comments</a></span>
                            </div>
                            <div class="blog_desc">
                                <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean
                                    posuere libero eu augue condimentum rhoncus. Praesent</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single_blog">
                        <div class="blog_thumb">
                            <a href="blog-details.html"><img
                                    src="<?= PATH_FOLDER ?>/public/nuochoa/assets/img/blog/blog9.jpg" alt=""></a>
                        </div>
                        <div class="blog_content">
                            <div class="blog_title">
                                <h3><a href="blog-details.html">Post with Video</a></h3>
                            </div>
                            <div class="blog_meta">
                                <i class="fa-calendar fa"></i>
                                <span class="post_date">october 10, 2018</span>
                                <span class="comment"> <a href="#">3 comments</a></span>
                            </div>
                            <div class="blog_desc">
                                <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean
                                    posuere libero eu augue condimentum rhoncus. Praesent</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single_blog">
                        <div class="blog_thumb">
                            <a href="blog-details.html"><img
                                    src="<?= PATH_FOLDER ?>/public/nuochoa/assets/img/blog/blog7.jpg" alt=""></a>
                        </div>
                        <div class="blog_content">
                            <div class="blog_title">
                                <h3><a href="blog-details.html">Maecenas ultricies</a></h3>
                            </div>
                            <div class="blog_meta">
                                <i class="fa-calendar fa"></i>
                                <span class="post_date">october 10, 2018</span>
                                <span class="comment"> <a href="#">3 comments</a></span>
                            </div>
                            <div class="blog_desc">
                                <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean
                                    posuere libero eu augue condimentum rhoncus. Praesent</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!--blog area end-->
