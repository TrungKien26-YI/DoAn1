<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $tenDm = $_POST['ten_dm'];

        $sql = "INSERT INTO danhmuc (`name`) VALUES (:name)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $tenDm);
        $ketQua = $stmt->execute();

        if($ketQua) {
            echo "<script>alert('Thêm mới danh mục thành công')</script>";
            echo "<script>window.location.href='?url=danh-sach-danh-muc'</script>";
        } else {
            echo "<script>alert('Lỗi khi thêm mới danh mục')</script>";
        }
    }
?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Thêm danh mục</h4>
                            <div class="flex-shrink-0">
                                <div class="form-check form-switch form-switch-right form-switch-md">
                                    <label for="vertical-form-showcode" class="form-label text-muted">Show Code</label>
                                    <input class="form-check-input code-switcher" type="checkbox" id="vertical-form-showcode">
                                </div>
                            </div>
                        </div><!-- end card header -->
                        <div class="card-body">
                            <div class="live-preview">
                                <form action="" method="post">
                                    <div class="mb-3">
                                        <label for="employeeName" class="form-label">Tên danh mục</label>
                                        <input type="text" class="form-control" name="ten_dm" placeholder="Nhập tên danh mục..." required>
                                    </div>
                                    <div class="">
                                        <a href="?url=danh-sach-danh-muc" class="btn btn-danger">Quay lại</a>
                                        <button type="submit" class="btn btn-primary">Thêm</button>
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