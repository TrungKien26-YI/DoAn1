<!--breadcrumbs area start-->
<div class="breadcrumb-section cart_bread mt-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="/">Trang chủ</a></li>
                        <li class="active">Giỏ hàng</li>
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
                id_taikhoan = :id_taikhoan";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id_taikhoan', $_SESSION['userID']);
            $stmt->execute();
            $listGioHangByUser = $stmt->fetchAll(); 

        if(!empty($listGioHangByUser)){

            if($_SERVER['REQUEST_METHOD']=='POST'){
               $sql="INSERT INTO donhang(`id_user`,`ten`,`sdt`,`diachi`) VALUES (:id_user,:ten,:sdt,:diachi)";
               $stmt=$conn->prepare($sql);
               $stmt->bindParam(':id_user',$_SESSION['userID']);
               $stmt->bindParam(':ten',$_POST['ten']);
               $stmt->bindParam(':sdt',$_POST['sdt']);
               $stmt->bindParam(':diachi',$_POST['diachi']);
               $stmt->execute();
            $idDonhang=$conn->lastInsertId();

            foreach($listGioHangByUser as $item){
               $sql="INSERT INTO donhang_chitiet(`id_donhang`, `id_sanpham`, `gia`, `soluong`) VALUES (:id_donhang,:id_sanpham,:gia,:soluong)";
               $stmt=$conn->prepare($sql);
               $stmt->bindParam(':id_donhang',$idDonhang);
               $stmt->bindParam(':id_sanpham',$item['id_sanpham']);
               $stmt->bindParam(':gia',$item['gia_nuochoa']);
               $stmt->bindParam(':soluong',$item['soluong']);
               $stmt->execute();

               $sql="DELETE FROM giohang WHERE id=:id";
               $stmt=$conn->prepare($sql);
               $stmt->bindParam(':id',$item['id_cart']);
               $stmt->execute(); 
            }
            echo "<script>alert('Thanh toán thành công')</script>";
            echo "<script>window.location.href='?url=giohang'</script>";  
            }
        ?>
        <form action="" method="post">
            <div class="row">
                <div class="col-12">
                    <div class="table_desc">
                        <div class="cart_page table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product_remove">Thao tác</th>
                                        <th class="product_thumb">Hình ảnh</th>
                                        <th class="product_name">Tên sản phẩm</th>
                                        <th class="product-price">Gía</th>
                                        <th class="product_quantity">Số lượng</th>
                                        <th class="product_total">Tổng tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $tong = 0;
                                    $thanhtien = 0;
                                    foreach ($listGioHangByUser as $sanPham) {
                                        $tong = $sanPham['gia_nuochoa'] * $sanPham['soluong'];
                                        $thanhtien += $tong;
                                        ?>
                                    <tr>
                                        <td class="product_remove"><a href="?url=deleteCart&id_cart=<?=$sanPham['id_cart']?>"><i class="fa fa-trash-o"></i></a></td>
                                        <td class="product_thumb"><a href="#"><img width="120px"src="<?= PATH_FOLDER ?>/image/<?=$sanPham['hinh_anh']?>"
                                                    alt=""></a></td>
                                        <td class="product_name"><a href="#"><?=$sanPham['ten_nuochoa']?></a></td>
                                        <td class="product-price"><?= number_format($sanPham['gia_nuochoa'], 0, ',', '.') ?> VNĐ</td>
                                        <td class="product_quantity"><input min="0" max="100" value="<?=$sanPham['soluong']?>" type="number">
                                        </td>
                                        <td class="product_total"><?= number_format($tong, 0, ',', '.') ?> VNĐ</td>
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
            <!--coupon code area start-->
            <div class="coupon_area">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="coupon_code">
                            <h3>Nhập thông tin nhận hàng</h3>
                            <div class="coupon_inner">
                                <p>Để lại thông tin để nhận hàng</p>
                                <input placeholder="Tên người nhận..." name="ten" type="text" required>
                            </div>
                            <div class="coupon_inner">
                                <input placeholder="Số điện thoại..." name="sdt" type="number" required>
                            </div>
                            <div class="coupon_inner">
                                <p>Để lại thông tin để nhận hàng</p>
                                <input placeholder="Địa chỉ nhận hàng..." name="diachi" type="text" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="coupon_code">
                            <h3>Tổng tiền</h3>
                            <div class="coupon_inner">
                                <div class="cart_subtotal">
                                    <p>Tổng đơn hàng</p>
                                    <p class="cart_amount"><?= number_format($thanhtien, 0, ',', '.') ?> VNĐ</p>
                                </div>
                                <div class="checkout_btn">
                                    <button type="submit">Thanh toán</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--coupon code area end-->
        </form> 
        <?php
        }else{
        ?>
            <div class="d-flex justify-content-center align-items-center p-5">
                <div class="d-flex flex-column">
                    <h3>giỏ hàng không có sản phẩm</h3>
                    <a href="?url=trang-chu" class="btn btn-success" >Mua hàng</a>
                </div>
            </div>
        <?php    
        }
    ?>
    </div>
</div>
<!--shopping cart area end -->