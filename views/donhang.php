<div class="breadcrumb-section cart_bread mt-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index.html">Trang chủ</a></li>
                        <li class="active">Đơn hàng</li>
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
                        *
                    FROM
                        donhang
                    WHERE
                        id_user = :id_user
                    ORDER BY
                        id
                        DESC
            ";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_user', $_SESSION['userID']);
        $stmt->execute();
        $danhSachDonHang = $stmt->fetchAll();

        if (!empty($danhSachDonHang)) {
        ?>
            <div class="row">
               <div class="col-11">
                    <div class="table_desc">
                        <div class="cart_page table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product_remove">Thao tác</th>
                                        <th class="product_thumb">Tên người đặt</th>
                                        <th class="product_name">Số điện thoại</th>
                                        <th class="product-price">Địa chỉ nhận</th>
                                        <th class="product_quantity">Ngày mua</th>
                                        <th class="product_quantity">Trạng thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $tong = 0;
                                    $thanhTien = 0;
                                    foreach ($danhSachDonHang as $donHang) {
                                    ?>
                                        <tr>
                                            <td>
                                                <div class="cart_submit">
                                                    <a href="?url=don-hang-ct&id_dh=<?= $donHang['id'] ?>" class="btn btn-danger">Xem</a>
                                                </div>
                                            </td>
                                            <td class="product_thumb"><?= $donHang['ten'] ?></td>
                                            <td class="product_thumb"><?= $donHang['sdt'] ?></td>
                                            <td class="product_thumb"><?= $donHang['diachi'] ?></td>
                                            <td class="product_thumb"><?= $donHang['ngayMua'] ?></td>
                                            <td class="product_thumb"><?= $donHang['trangThai'] ?></td>
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
                    <h3>Bạn chưa có đơn hàng nào</h3>
                    <a href="?url=trang-chu" class="btn btn-success">Mua hàng</a>
                </div>
            </div>
        <?php
        }
        ?>

    </div>
</div>
<!--shopping cart area end -->