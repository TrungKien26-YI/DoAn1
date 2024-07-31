<?php
    $sql = "SELECT
                *
            FROM
                donhang
            WHERE
                id = :id
            ";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $_GET['id_dh']);
    $stmt->execute();
    $donHang = $stmt->fetch();
?>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Cập nhật trạng thái đơn hàng</h4>
                            <div class="flex-shrink-0">
                                <div class="form-check form-switch form-switch-right form-switch-md">
                                    <label for="vertical-form-showcode" class="form-label text-muted">Show Code</label>
                                    <input class="form-check-input code-switcher" type="checkbox" id="vertical-form-showcode">
                                </div>
                            </div>
                        </div><!-- end card header -->
                        <div class="card-body">
                            <?php
                                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                                    $trangThai = $_POST['trang_thai'];

                                    $sql = "UPDATE donhang SET trangThai = :trangThai WHERE id = :id";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->bindParam(':trangThai', $trangThai);
                                    $stmt->bindParam(':id', $_GET['id_dh']);
                                    $stmt->execute();

                                    echo "<script>window.location.href='?url=danh-sach-don-hang';</script>";

                                }
                            ?>
                            <div class="live-preview">
                                <form action="" method="post">
                                    <div class="mb-3">
                                        <label for="employeeName" class="form-label">Trạng thái</label>
                                        <select class="form-select w-25" name="trang_thai" id="">
                                            <option value="Đã đặt hàng" <?= $donHang['trangThai'] == 'Đã đặt hàng' ? 'selected' : '' ?>>Đã đặt hàng</option>
                                            <option value="Đã xác nhận" <?= $donHang['trangThai'] == 'Đã xác nhận' ? 'selected' : '' ?>>Đã xác nhận</option>
                                            <option value="Người bán đang chuẩn bị hàng" <?= $donHang['trangThai'] == 'Người bán đang chuẩn bị hàng' ? 'selected' : '' ?>>Người bán đang chuẩn bị hàng</option>
                                            <option value="Đang vận chuyển" <?= $donHang['trangThai'] == 'Đang vận chuyển' ? 'selected' : '' ?>>Đang vận chuyển</option>
                                            <option value="Đang giao" <?= $donHang['trangThai'] == 'Đang giao' ? 'selected' : '' ?>>Đang giao</option>
                                            <option value="Đã giao hàng" <?= $donHang['trangThai'] == 'Đã giao hàng' ? 'selected' : '' ?>>Đã giao hàng</option>
                                        </select>
                                    </div>
                                    <div class="">
                                        <a href="?url=danh-sach-don-hang" class="btn btn-danger">Quay lại</a>
                                        <button type="submit" class="btn btn-primary">Cập nhật</button>
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
                                    &lt;/form&gt;</code>
                                </pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
</div>