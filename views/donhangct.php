<div class="breadcrumb-section cart_bread mt-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index.html">Trang chủ</a></li>
                        <li class="active">Đơn hàng chi tiết</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->
<!--shopping cart area start -->
<div class="shopping_cart_area">
    <div class="container">
        <?php
        $sql = "SELECT
                    donhang_chitiet.id,
                    donhang_chitiet.id_donhang,
                    donhang_chitiet.id_sanpham,
                    donhang_chitiet.gia,
                    donhang_chitiet.soluong,
                    sanpham.id,
                    sanpham.ten_nuochoa,
                    sanpham.hinh_anh,
                    donhang.id,
                    donhang.id_user
                FROM
                    donhang_chitiet
                INNER JOIN
                    sanpham ON donhang_chitiet.id_sanpham = sanpham.id
                INNER JOIN
                    donhang ON donhang_chitiet.id_donhang = donhang.id
                WHERE
                    donhang_chitiet.id_donhang = :id_donhang
                AND
                    donhang.id_user = :id_user

        ";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_donhang', $_GET['id_dh']);
        $stmt->bindParam(':id_user', $_SESSION['userID']);
        $stmt->execute();
        $chiTietDonHang = $stmt->fetchAll();

        if (!empty($chiTietDonHang)) {

        ?>
            <div class="row">
                <div class="col-7">
                    <div class="table_desc">
                        <div class="cart_page table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="">STT</th>
                                        <th class="product_thumb">Tên sản phẩm</th>
                                        <th class="product_name">Ảnh</th>
                                        <th class="product-price">Giá</th>
                                        <th class="product_quantity">Số lượng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($chiTietDonHang as $key=>$donHang_ct) {
                                    ?>
                                        <tr>
                                            <td>
                                                <?= $key + 1 ?>
                                            </td>
                                            <td class="product_thumb"><?= $donHang_ct['ten_nuochoa'] ?></td>
                                            <td class="product_thumb">
                                                <img width="100px" height="100px" src="<?= PATH_FOLDER ?>/image/<?= $donHang_ct['hinh_anh'] ?>" alt="">
                                            </td>
                                            <td class="product_thumb"><?= number_format($donHang_ct['gia'], 0, ',', '.') ?> VNĐ</td>
                                            <td class="product_thumb"><?= $donHang_ct['soluong'] ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
            
        <?php
        } else {
        ?>
            <div class="d-flex justify-content-center align-items-center p-5">
                <div class="d-flex flex-column">
                    <h3>Bạn chưa có sản phẩm nào</h3>
                    <a href="?url=trang-chu" class="btn btn-success">Mua hàng</a>
                </div>
            </div>
        <?php
        }
        ?>

    </div>
</div>
<!--shopping cart area end -->