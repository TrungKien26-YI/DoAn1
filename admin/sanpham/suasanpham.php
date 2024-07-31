<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <?php
                $sql = "SELECT * FROM `danhmuc`";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $listDanhMuc = $stmt->fetchAll();
           
                $sqlSp_ById = "SELECT * FROM `sanpham` WHERE id = :id";
                $stmt2 = $conn->prepare($sqlSp_ById);
                $stmt2->bindParam(':id', $_GET['id_sp']);
                $stmt2->execute();
                $sanPham = $stmt2->fetch();

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
                    $tenNuochoa = $_POST['ten_nuochoa'];
    
                    $giaNuochoa = $_POST['gia_nuochoa'];    

                    $mota = $_POST['mota'];
    
                    $danhMuc = $_POST['danh_muc'];
    
                    $hinhAnh = $_FILES['hinh_anh']['name'];
                    $duongDan = '../image/' . $hinhAnh;
                    move_uploaded_file($_FILES['hinh_anh']['tmp_name'], $duongDan);

                    $checkHinhAnh = $hinhAnh ? $hinhAnh : $sanPham['hinh_anh'];

                    $sqlUpdate = "UPDATE 
                                        sanpham 
                                    SET 
                                        ten_nuochoa = :ten_nuochoa,
                                        gia_nuochoa = :gia_nuochoa,  
                                        hinh_anh = :hinh_anh,
                                        mota = :mota,
                                        id_danhmuc = :id_danhmuc
                                    WHERE
                                        id = :id
                    ";
                    $stmt3 = $conn->prepare($sqlUpdate);

                    $stmt3->bindParam(':ten_nuochoa', $tenNuochoa);

                    $stmt3->bindParam(':gia_nuochoa', $giaNuochoa);

                    $stmt3->bindParam(':hinh_anh', $checkHinhAnh);

                    $stmt3->bindParam(':mota', $mota);

                    $stmt3->bindParam(':id_danhmuc', $danhMuc);

                    $stmt3->bindParam(':id', $_GET['id_sp']);
                        
                    $ketQua = $stmt3->execute();

                    if($ketQua) {
                        echo "<script>alert('Cập nhật sản phẩm thành công')</script>";
                        echo "<script>window.location.href='?url=danh-sach-san-pham'</script>";
                    } else {
                        echo "<script>alert('Lỗi khi cập nhật sản phẩm')</script>";
                    }
                }
            ?>
            <div class="row">
                <div class="col-xxl-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Sửa sản phẩm</h4>
                            <div class="flex-shrink-0">
                                <div class="form-check form-switch form-switch-right form-switch-md">
                                    <label for="vertical-form-showcode" class="form-label text-muted">Show Code</label>
                                    <input class="form-check-input code-switcher" type="checkbox" id="vertical-form-showcode">
                                </div>
                            </div>
                        </div><!-- end card header -->
                        <div class="card-body">
                            <div class="live-preview">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="employeeName" class="form-label">Tên nước hoa</label>
                                        <input type="text" class="form-control" value="<?= $sanPham['ten_nuochoa'] ?>" name="ten_nuochoa" id="employeeName" placeholder="Nhập tên nước hoa...">
                                    </div>
                                    <div class="mb-3">
                                        <label for="employeeUrl" class="form-label">Giá nước hoa</label>
                                        <input type="text" class="form-control" value="<?= $sanPham['gia_nuochoa'] ?>" name="gia_nuochoa" id="img" placeholder="Nhập giá nước hoa...">
                                    </div>
                                    <div class="mb-3">
                                        <label for="EndleaveDate" class="form-label">Ảnh nước hoa</label>
                                        <input type="file" onchange="document.getElementById('img').src = window.URL.createObjectURL(this.files[0])" class="form-control" name="hinh_anh">
                                    </div>
                                    <div>
                                        <img src="../image/<?= $sanPham['hinh_anh'] ?>" id="img" alt="" width="200px" style="margin: 0 0 20px 0;">
                                    </div>
                                    <div class="mb-3">
                                           <label for="EndleaveDate" class="form-label">Mô tả</label>
                                           <textarea class="form-control" name="mota" cols="30" id=""><?= $sanPham['mota'] ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="EndleaveDate" class="form-label">Danh mục</label>
                                        <select class="form-select" name="danh_muc" id="">
                                            <?php
                                            foreach ($listDanhMuc as $dm) {
                                            ?>
                                                <option <?= $dm['id'] == $sanPham['id_danhmuc'] ? 'selected' : '' ?> value="<?= $dm['id'] ?>"><?= $dm['name'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="">
                                        <a href="?url=danh-sach-san-pham" class="btn btn-danger">Quay lại</a>
                                        <button type="submit" name="capnhat" class="btn btn-primary">Cập nhật</button>
                                    </div>
                                </form>
                            </div>
                            <div class="d-none code-view">
                                <pre class="language-markup" style="height: 375px;">
<code>&lt;form action=&quot;&quot;&gt;
    &lt;div class=&quot;mb-3&quot;&gt;
        &lt;label for=&quot;employeeName&quot; class=&quot;form-label&quot;&gt;Employee Name&lt;/label&gt;
        &lt;input type=&quot;text&quot; class=&quot;form-control&quot; id=&quot;employeeName&quot; placeholder=&quot;Enter emploree name&quot;&gt;
    &lt;/div&gt;
    &lt;div class=&quot;mb-3&quot;&gt;
        &lt;label for=&quot;employeeUrl&quot; class=&quot;form-label&quot;&gt;Employee Department URL&lt;/label&gt;
        &lt;input type=&quot;url&quot; class=&quot;form-control&quot; id=&quot;employeeUrl&quot; placeholder=&quot;Enter emploree url&quot;&gt;
    &lt;/div&gt;
    &lt;div class=&quot;mb-3&quot;&gt;
        &lt;label for=&quot;StartleaveDate&quot; class=&quot;form-label&quot;&gt;Start Leave Date&lt;/label&gt;
        &lt;input type=&quot;date&quot; class=&quot;form-control&quot; id=&quot;StartleaveDate&quot;&gt;
    &lt;/div&gt;
    &lt;div class=&quot;mb-3&quot;&gt;
        &lt;label for=&quot;EndleaveDate&quot; class=&quot;form-label&quot;&gt;End Leave Date&lt;/label&gt;
        &lt;input type=&quot;date&quot; class=&quot;form-control&quot; id=&quot;EndleaveDate&quot;&gt;
    &lt;/div&gt;
    &lt;div class=&quot;mb-3&quot;&gt;
        &lt;label for=&quot;VertimeassageInput&quot; class=&quot;form-label&quot;&gt;Message&lt;/label&gt;
        &lt;textarea class=&quot;form-control&quot; id=&quot;VertimeassageInput&quot; rows=&quot;3&quot; placeholder=&quot;Enter your message&quot;&gt;&lt;/textarea&gt;
    &lt;/div&gt;
    &lt;div class=&quot;text-end&quot;&gt;
        &lt;button type=&quot;submit&quot; class=&quot;btn btn-primary&quot;&gt;Add Leave&lt;/button&gt;
    &lt;/div&gt;
&lt;/form&gt;</code></pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
</div>