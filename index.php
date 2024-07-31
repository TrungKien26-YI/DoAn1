<?php
session_start();
     include "env.php";

     include "./models/connect.php";

     $sql="SELECT * FROM users WHERE id=:id";
     $stmt = $conn->prepare($sql);
     $stmt->bindParam(':id', $_SESSION['userID']);
     $stmt->execute();
     $user = $stmt->fetch();

     include "./views/block/header.php";

     $url = $_GET['url'] ?? null;

     switch($url){
          case 'trangchu':
               include "./views/trangchu.php";
               break;
          case 'chi-tiet-san-pham':
               include "./views/chitietsp.php";
               break;
          case 'danh-muc':
               include "./views/danhmuc.php";
               break;
          case 'auth':
               include "./views/auth.php";
               break;
          case 'dangxuat':
               unset($_SESSION['userID']);
               echo "<script>window.location.href='?url=trang-chu'</script>";
               break;
          case 'giohang':    
               if(!isset($_SESSION['userID'])){
               echo "<script>alert('Vui lòng đăng nhập')</script>";
               echo "<script>window.location.href='?url=auth'</script>";       
               }else {
               include './views/giohang.php';
               }
               break;               
          case 'deleteCart':
               if(isset($_GET['id_cart']) && $_GET['id_cart'] > 0){
                    $sql = "DELETE FROM giohang WHERE id = :id";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':id',$_GET['id_cart']);
                    $stmt->execute();

                    echo "<script>window.location.href='".$_SERVER['HTTP_REFERER']."'</script>";
               }
          case 'don-hang':
               include "./views/donhang.php";
               break;
          case 'don-hang-ct':
               include "./views/donhangct.php";
               break;                 
          default:
               include "./views/trangchu.php";
               break;
     }

     include "./views/block/footer.php";
 

             

            



