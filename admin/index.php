<?php
    session_start();

    include "../env.php";

    include "../models./connect.php";
       
    $sql="SELECT * FROM users WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $_SESSION['userID']);
    $stmt->execute();
    $ketQua = $stmt->fetch();

    if($ketQua['role'] == 'user' ){
        header('location: ../index.php');
    }

    include "./block/header.php";

    include "./block/sidebar.php";

    $url = $_GET['url'] ?? null;

    switch($url){
        case 'trangchu':
            include "trangchu.php";
            break;
        case 'danh-sach-san-pham':
            include "./sanpham/danhsach.php";
            break;
        case 'them-san-pham':
            include "./sanpham/themsanpham.php";
            break;
        case 'sua-san-pham':
            include "./sanpham/suasanpham.php";
            break;
/////////////////////////////////////
        case 'danh-sach-danh-muc':
            include "./danhmuc/danhsach.php";
            break;
        case 'them-danh-muc':
            include "./danhmuc/themdanhmuc.php";
            break;
        case 'sua-danh-muc':
            include "./danhmuc/suadanhmuc.php";
            break;
//////////////////////////////////////
        case 'danh-sach-tai-khoan':
            include "./taikhoan/danhsach.php";
            break;
//////////////////////////////////////            
        case 'danh-sach-don-hang':
            include "./donhang/danhsach.php";
            break;
        case 'chi-tiet-don-hang':
            include "./donhang/chitiet.php";
            break;
        case 'sua-don-hang':
            include "./donhang/suadonhang.php";
            break;           
        default:
            include "trangchu.php";          
            break;
}

    include "./block/footer.php";



 

   

