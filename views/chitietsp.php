<?php
$sql = "SELECT * FROM sanpham WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $_GET['id_sp']);
$stmt->execute();
$chitietsanpham = $stmt->fetch();

//  echo"<pre>";
//  print_r($chitietsanpham);

?>

<!--breadcrumbs area start-->
<div class="breadcrumb-section product_section mt-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="/">Trang chủ</a></li>
                        <li class="active"><?= $chitietsanpham['ten_nuochoa'] ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--product details start-->
<div class="product_details">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-6">
                <div class="product-details-tab">

                    <div id="img-1" class="zoomWrapper single-zoom">
                        <a href="#">
                            <img id="zoom1" src="<?= PATH_FOLDER ?>/image/<?= $chitietsanpham['hinh_anh'] ?>"
                                data-zoom-image="<?= PATH_FOLDER ?>/image/<?= $chitietsanpham['hinh_anh'] ?>"
                                alt="big-1">
                        </a>
                    </div>

                    <div class="single-zoom-thumb mt-20">
                        <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                            <li>
                                <a href="#" class="elevatezoom-gallery active" data-update=""
                                    data-image="<?= PATH_FOLDER ?>/image/<?= $chitietsanpham['hinh_anh'] ?>"
                                    data-zoom-image="<?= PATH_FOLDER ?>/image/<?= $chitietsanpham['hinh_anh'] ?>">

                                    <img src="<?= PATH_FOLDER ?>/image/<?= $chitietsanpham['hinh_anh'] ?>"
                                        alt="zo-th-1" />
                                </a>

                            </li>
                            <li>
                                <a href="#" class="elevatezoom-gallery active" data-update=""
                                    data-image="<?= PATH_FOLDER ?>/image/<?= $chitietsanpham['hinh_anh'] ?>"
                                    data-zoom-image="<?= PATH_FOLDER ?>/image/<?= $chitietsanpham['hinh_anh'] ?>">
                                    <img src="<?= PATH_FOLDER ?>/image/<?= $chitietsanpham['hinh_anh'] ?>"
                                        alt="zo-th-1" />
                                </a>

                            </li>
                            <li>
                                <a href="#" class="elevatezoom-gallery active" data-update=""
                                    data-image="<?= PATH_FOLDER ?>/image/<?= $chitietsanpham['hinh_anh'] ?>"
                                    data-zoom-image="<?= PATH_FOLDER ?>/image/<?= $chitietsanpham['hinh_anh'] ?>">
                                    <img src="<?= PATH_FOLDER ?>/image/<?= $chitietsanpham['hinh_anh'] ?>"
                                        alt="zo-th-1" />
                                </a>

                            </li>
                            <li>
                                <a href="#" class="elevatezoom-gallery active" data-update=""
                                    data-image="<?= PATH_FOLDER ?>/image/<?= $chitietsanpham['hinh_anh'] ?>"
                                    data-zoom-image="<?= PATH_FOLDER ?>/image/<?= $chitietsanpham['hinh_anh'] ?>">
                                    <img src="<?= PATH_FOLDER ?>/image/<?= $chitietsanpham['hinh_anh'] ?>"
                                        alt="zo-th-1" />
                                </a>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-6">
                <div class="product_d_right">
                    <div class="product_nav">
                        <h1><?= $chitietsanpham['ten_nuochoa'] ?></h1>
                      
                    </div>
                    <div class="product_ratting mb-10">
                        <ul>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>

                        </ul>
                    </div>
                    <div class="product_desc">
                        <p><?= $chitietsanpham['mota'] ?></p>
                    </div>
                    <div class="product_price">
                        <span class="current_price"><?= number_format($chitietsanpham['gia_nuochoa'], 0, ',', '.') ?>
                            VNĐ</span>
                    </div>
                    <div class="box_quantity">
                     <?php
                         if($_SERVER['REQUEST_METHOD']=='POST'){
                            if(isset($_SESSION['userID'])){
                                $id_sanpham=$_POST['id_sanpham'];
                                $soluong=$_POST['soluong'];
    
                                $sql="SELECT * FROM giohang WHERE id_sanpham = :id_sanpham AND id_taikhoan = :id_taikhoan";
                                $stmt = $conn->prepare($sql);
                                $stmt->bindParam(':id_sanpham',$id_sanpham);
                                $stmt->bindParam(':id_taikhoan',$_SESSION['userID']);
                                $stmt->execute();
                                $checksanpham = $stmt->fetch();
    
                                if($checksanpham){
                                    $sql= " UPDATE giohang SET `soluong` = soluong + :soluongMoi Where id =:id AND id_taikhoan = :id_taikhoan";
                                    $stmt=$conn->prepare($sql);
                                    $stmt->bindParam(':id',$checksanpham['id']);
                                    $stmt->bindParam(':soluongMoi', $soluong);
                                    $stmt->bindParam(':id_taikhoan',$_SESSION['userID']);
                                    $stmt->execute();
    
                                    echo "<script>alert('Cập nhật số lượng thành công')</script>";  
    
                                }else{
                                    $sql= "INSERT INTO giohang (`id_sanpham`,`id_taikhoan`,`gia`,`soluong`) VALUES (:id_sanpham,:id_taikhoan,:gia,:soluong)";
                                    $stmt=$conn->prepare($sql);
                                    $stmt->bindParam(':id_sanpham',$id_sanpham);
                                    $stmt->bindParam(':id_taikhoan',$_SESSION['userID']);
                                    $stmt->bindParam(':gia',$chitietsanpham['gia_nuochoa']);
                                    $stmt->bindParam(':soluong',$soluong);
                                    $stmt->execute();
    
                                    echo "<script>alert('Thêm vào giỏ hàng thành công')</script>";  
    
                                }
                            }else{
                                echo "<script>alert('Vui lòng đăng nhập')</script>";
                                echo "<script>window.location.href='?url=auth'</script>";   
                            }
                            
                         }
                     ?>
                        <form action="" method="POST">
                            <input type="hidden" value="<?= $chitietsanpham['id'] ?>" name="id_sanpham">
                            <label>Số lượng</label>
                            <input min="0" max="100" name="soluong" value="1" type="number">
                            <button type="submit">Thêm giỏ hàng</button> 
                        </form>
                        
                    </div>
                    <!-- <div class="product_d_action">
                        <ul>
                            <li><a href="#" data-bs-toggle="tooltip" data-placement="top" title="Add to wishlist"><i
                                        class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" data-placement="top"
                                    title="Quick View"><i class="fa fa-eye"></i></a></li>
                        </ul>
                    </div> -->

                    <div class="priduct_social">
                        <h4>Chia sẻ:</h4>
                        <ul>
                            <li><a href="#"><i class="fa fa-rss"></i></a></li>
                            <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                            <li><a href="#"><i class="fa fa-tumblr"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!--product details end-->
<!--product info start-->
<div class="product_d_info">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product_d_inner">
                    <div class="product_info_button">
                        <ul class="nav" role="tablist">
                            <!-- <li>
                                <a class="active" data-bs-toggle="tab" href="#info" role="tab" aria-controls="info"
                                    aria-selected="false"></a>
                            </li> -->
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="info" role="tabpanel">
                            <div class="product_info_content">
                                <p></p>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="sheet" role="tabpanel">
                            <div class="product_d_table">
                                <form action="#">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="first_child">Compositions</td>
                                                <td>Polyester</td>
                                            </tr>
                                            <tr>
                                                <td class="first_child">Styles</td>
                                                <td>Girly</td>
                                            </tr>
                                            <tr>
                                                <td class="first_child">Properties</td>
                                                <td>Short Dress</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                            <div class="product_info_content">
                                <p></p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="reviews" role="tabpanel">
                            <div class="product_info_content">
                                <p></p>
                            </div>
                            <div class="product_info_inner">
                                <div class="product_ratting mb-10">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    </ul>
                                    <strong>Posthemes</strong>
                                    <p>09/07/2018</p>
                                </div>
                                <div class="product_demo">
                                    <strong>demo</strong>
                                    <p>That's OK!</p>
                                </div>
                            </div>
                            <div class="product_review_form">
                                <form action="#">
                                    <h2>Add a review </h2>
                                    <p>Your email address will not be published. Required fields are marked </p>
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="review_comment">Your review </label>
                                            <textarea name="comment" id="review_comment"></textarea>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <label for="author">Name</label>
                                            <input id="author" type="text">

                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <label for="email">Email </label>
                                            <input id="email" type="text">
                                        </div>
                                    </div>
                                    <button type="submit">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--product info end-->
