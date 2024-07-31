            <!--breadcrumbs area start-->
            <div class="breadcrumb-section cart_bread mt-4">
                <div class="container">   
                    <div class="row">
                        <div class="col-12">
                            <div class="breadcrumb_content">
                                <ul>
                                    <li><a href="/">Trang chủ</a></li>
                                    <li class="active">Đăng ký / Đăng nhập</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
            <!--breadcrumbs area end-->
           <!-- customer login start -->
            <div class="customer_login">
                <div class="container">
                    <div class="row">
                    <?php
                        if(isset($_POST['dangnhap'])) {
                            $sql = "SELECT * FROM `users` WHERE email = :email AND matkhau = :matkhau";
                            $stmt = $conn->prepare($sql);
                            $stmt->bindParam(':email', $_POST['email']);
                            $stmt->bindParam(':matkhau', $_POST['password']);
                            $stmt->execute();
                            $ketQua = $stmt->fetch();
                            // echo "<pre>";
                            // print_r($ketQua);
                            if(!$ketQua) {
                                $_SESSION['error'] = "Tài khoản hoặc mật khẩu không chính xác vui lòng thử lại";
                            } else {
                                $_SESSION['userID'] = $ketQua['id'];
                                echo "<script>window.location.href='?url=trang-chu'</script>";
                            }
                        }
                    ?>
                       <!--login area start-->
                        <div class="col-lg-6 col-md-6">
                        <?php
                             if(!empty($_SESSION['error'])){
                                ?>
                            <div class="alert alert-danger">
                                <h4><?=$_SESSION['error']?></h4>
                            </div>
                                <?php
                            }
                            unset($_SESSION['error']);
                        ?>
                            <div class="account_form">
                                <h2>Đăng nhập</h2>
                                <form action="" method="post">
                                    <p>   
                                        <label>Email <span>*</span></label>
                                        <input type="email" value="<?= !empty($_POST['email']) ? $_POST['email'] : '' ?>" name="email" required>
                                     </p>
                                     <p>   
                                        <label>Mật khẩu <span>*</span></label>
                                        <input type="password" value="<?= !empty($_POST['password']) ? $_POST['password'] : '' ?>" name="password" required>
                                     </p>   
                                    <div class="login_submit">
                                        <button type="submit" name="dangnhap">Đăng nhập</button>
                                        <label for="remember">
                                            <input id="remember" type="checkbox">
                                            Ghi nhớ
                                        </label>
                                        <a href="#">Quên mật khẩu?</a>
                                    </div>

                                </form>
                             </div>    
                        </div>
                        <!--login area start-->
                <?php
                    if(isset($_POST['dangky'])){

                        $sql = "INSERT INTO `users`(`hoten`, `email`, `matkhau`) VALUES (:hoten,:email,:matkhau)";
                        $stmt = $conn->prepare($sql);
                        $stmt->bindParam(':hoten', $_POST['hoten']);
                        $stmt->bindParam(':email', $_POST['email']);
                        $stmt->bindParam(':matkhau', $_POST['password']);
                        $stmt->execute();

                        $_SESSION['success'] = "Đăng ký tài khoản thành công";
                    }
                ?>
                        <!--register area start-->
                        <div class="col-lg-6 col-md-6">
                        <?php
                             if(!empty($_SESSION['success'])){
                                ?>
                            <div class="alert alert-success">
                                <h4><?=$_SESSION['success'] ?></h4>
                            </div>
                                <?php
                                unset($_SESSION['success']);
                            }
                        ?>
                            <div class="account_form register">
                                <h2>Đăng ký</h2>
                                <form action="" method="post">
                                    <p>   
                                        <label>Họ và tên<span>*</span></label>
                                        <input type="text" name="hoten" placeholder="Nhập họ và tên..." required>
                                     </p>
                                     <p>   
                                        <label>Email<span>*</span></label>
                                        <input type="email" name="email" placeholder="Nhập email..." required>
                                    <p>   
                                        <label>Mật khẩu</label><span>*</span></label>
                                        <input type="password" name="password" placeholder="Nhập mật khẩu..."required>
                                     </p>    
                                     </p>
                                    <div class="login_submit">
                                        <button type="submit" name="dangky">Đăng ký</button>
                                    </div>
                                </form>
                            </div>    
                        </div>
                        <!--register area end-->
                    </div>
                </div>    
            </div>
            <!-- customer login end -->