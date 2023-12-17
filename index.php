<?php
session_start();
include(__DIR__ . '/admin/model/pdo.php');
include(__DIR__ . '/admin/model/danhmuc.php');
include(__DIR__ . '/admin/model/sanpham.php');
include(__DIR__ . '/admin/model/taikhoan.php');
include(__DIR__ . '/admin/model/cart.php');
include(__DIR__ . '/admin/model/vnpay.php');
date_default_timezone_set('Asia/Ho_Chi_Minh');


include "global.php";
include "view/header.php";

if(!isset($_SESSION['mycart'])) $_SESSION['mycart']=[];
$spnew=loadall_sanpham_home();
$dsdm=loadall_danhmuc();
$dstop10 = loadall_sanpham_top10();

if(isset($_GET['act'])&&($_GET['act']!="")){
    $act=$_GET['act'];
    switch ($act) {
        case 'sanpham':
            if(isset($_POST['kyw'])&&($_POST['kyw']!="")){
               $kyw=$_POST['kyw'];
            }else{
                $kyw="";
            }
            if(isset($_GET['iddm'])&&($_GET['iddm']>0)){
                $iddm=$_GET['iddm'];
            }else{
                $iddm=0;
            }
            $dssp=loadall_sanpham($kyw,$iddm);
            $tendm=load_ten_danhmuc($iddm);
            include "view/sanpham.php";
            break;
        case 'sanphamct':
            
            if(isset($_GET['idsp'])&&($_GET['idsp']>0)){
                $id=$_GET['idsp'];
                $onesp=loadone_sanpham($id);
                updatesoluong($id);
                extract($onesp);
                $sanpham_cungloai=load_sanpham_cungloai($id,$iddm);
                include "view/sanphamct.php";
            }else{
                include "view/home.php";
            }
            break;
        case 'dangky':
            if(isset($_POST['dangky'])&&($_POST['dangky']!="")){
              $email=$_POST['email'];
              $user=$_POST['user'];
              $pass=$_POST['pass'];
              insert_taikhoan($email,$user,$pass);
              $thongbao = "Đã đăng ký thành công vui lòng đăng nhập để thực hiện các chức năng!";
            }
                include "view/taikhoan/dangky.php";
                break;
                case 'dangnhap':
                  if(isset($_POST['dangnhap']) && ($_POST['dangnhap']!="")){
                      $user=$_POST['user'];
                      $pass=$_POST['pass'];
                      $checkuser=checkuser($user,$pass);
                      if(is_array($checkuser)){
                          $_SESSION['user']=$checkuser;
                          // load lại trang
                          // $thongbao = "Đã đăng nhập thành công!";
                          if(isset($_POST['GHINHO']) && ($_POST['GHINHO'])){
                              setcookie("user",$user,time()+86400);
                              setcookie("pass",$pass,time()+86400);
                              $mesagecokie = 'Đã ghi nhận cookie trên hệ thống!';
                          }
              
                          // Kiểm tra nếu vai trò là admin thì chuyển hướng đến trang admin
                          if ($_SESSION['user']['role'] == 1) {
                              header('Location: admin/index.php');
                              exit();
                          }
              
                          // Nếu không phải admin, có thể thực hiện chuyển hướng hoặc hiển thị thông báo khác tùy thuộc vào logic của bạn
                          header('Location: index.php');
                          exit();
                      } else {
                          $thongbao = "Vui lòng nhập lại hoặc đăng ký tài khoản nếu chưa có!";
                      }
                  }
                  include "view/taikhoan/dangky.php";
                  break;
              
                    case 'dangnhapform':
                          include "view/taikhoan/dangnhap.php";
                          break;

                case 'xoacookie':
                    setcookie("user","",time()-86400);
                    setcookie("pass","",time()-86400);

                    include "view/taikhoan/dangnhap.php";
                    break;

         case 'edit_taikhoan':
                            if(isset($_POST['capnhat'])&&($_POST['capnhat']!="")){
                              $user=$_POST['user'];
                              $pass=$_POST['pass'];
                              $email=$_POST['email'];
                              $diachi=$_POST['diachi'];
                              $sdt=$_POST['sdt'];
                              $id=$_POST['id'];
                            update_taikhoanKH($id,$user,$email,$pass,$diachi,$sdt);
                            $_SESSION['user']=checkuser($user,$pass);
                            $thongbao = "Cập Nhật thành công!";
                              }
                                include "view/taikhoan/edit_taikhoan.php";
                                break;
        case 'quenmk':
                                    if(isset($_POST['guiemail'])&&($_POST['guiemail']!="")){
                                      $email=$_POST['email'];
                                     $checkemail= checkemail($email);
                                     if(is_array($checkemail)){
                                        $thongbao = "Mật khẩu của bạn là: ".$checkemail['pass'];
                                     }
                                     else{
                                        $thongbao = "Email không hợp lệ vui lòng nhập lại!";
                                     }
                                      }
                                        include "view/taikhoan/quenmk.php";
                                        break;
        case 'gioithieu':
            include "view/gioithieu.php";
            break;
            case 'thoat':
              unset($_SESSION['user']); // Xóa thông tin đăng nhập, nhưng giỏ hàng vẫn còn tồn tại
              header('Location: index.php');
              break;

        case 'addtocart':
          if(isset($_SESSION['user'])){
            if(isset($_POST['addtocart'])&&($_POST['addtocart']!="")){
                $id=$_POST['id'];
                $name=$_POST['name'];
                $img=$_POST['img'];
                $price=$_POST['price'];
                $soluong=$_POST['soluong'];
                $thanhtien=$soluong * $price;
                $size=$_POST['size'];
                // logic so luong tai day
                 
                if( increaseQuantity($name) && increaseQuantity_size($size)==true){
                  increaseQuantity_update($name);
                }
                else{
                  $spadd=[$id,$name,$img,$price,$soluong,$thanhtien,$size];
                  array_push($_SESSION['mycart'],$spadd);
                }    
            }
           
            include "view/cart/viewcart.php";}
            else{
              echo '<h1>Vui lòng đăng nhập để mua hàng!</h1>';
              include "view/taikhoan/dangnhap.php";
            }
                        break;


            case 'capnhatgiohang':
                          if(isset($_SESSION['user'])){
                            if(isset($_POST['capnhatgiohang'])&&($_POST['capnhatgiohang']!="")){
                                $id=$_POST['id'];
                                $name=$_POST['name'];
                                $img=$_POST['img'];
                                $price=$_POST['price'];
                                $soluong=$_POST['soluong'];
                                $thanhtien=$soluong * $price;
                                $size=$_POST['size'];
                                // logic so luong tai da
                                 
                                if( increaseQuantity($name) && increaseQuantity_size($size)==true){
                                  increaseQuantity_update($name);
                                }
                                else{
                                  $spadd=[$id,$name,$img,$price,$soluong,$thanhtien,$size];
                                  array_push($_SESSION['mycart'],$spadd);
                                }    
                            }
                           
                            include "view/cart/viewcart.php";}
                            else{
                              echo '<h1>Vui lòng đăng nhập để mua hàng!</h1>';
                              include "view/taikhoan/dangnhap.php";
                            }
                            break;
                       
        case 'delcart':
            if(isset($_GET['i'])&&($_GET['i']>0))
              {
                array_splice($_SESSION['mycart'],$_GET['i'],1);
              }
              else{
                $_SESSION['mycart']=[];
              }
              header('Location: index.php?act=viewcart');
                   
                
                break;

                
        case 'viewcart':
          if(isset($_SESSION['user'])){
            if($_SESSION['mycart']==[]){
              echo '<h1 style="color:red; text-align:center">Giỏ hàng của bạn trống!</h1><br>';
              include "view/cart/viewcart.php";
            }
            else{
              include "view/cart/viewcart.php";
            }
          }
          else{
            echo '<h1>Vui lòng đăng nhập để mua hàng!</h1>';
            include "view/taikhoan/dangnhap.php";
          }
            
                        break;
        case 'bill':
          if($_SESSION['mycart']==[]){
            echo '<h1 style="color:red;">Chưa có sản phẩm được chọn. Vui lòng chọn sản phẩm để đặt hàng!</h1><br>';
            include "view/cart/viewcart.php";
          }
          else{
            include "view/cart/bill.php";
          }
            
                        break;
        case 'thanhtoanonline':
                          include "view/cart/bill.php";
                                      break;


          case 'ctdh':
            if(isset($_GET['id'])&&($_GET['id']>0)){
              $id=$_GET['id'];
              $bill=loadone_bill($_GET['id']);
              $one_bill = loadone_cart($_GET['id']);
              extract($bill);
              include "view/cart/chitietdonhang.php";
          }else{
              include "view/home.php";
          }
          break;



        case 'billconform':
          if($_SESSION['mycart']!=[]){
            if(isset($_POST['dongydathang'])&&($_POST['dongydathang'])){
               if(isset($_SESSION['user'])) $iduser = $_SESSION['user']['id'];
               else $id = 0;
              $name=$_POST['name'];
                $email=$_POST['email'];
                $diachi=$_POST['diachi'];
                $sdt=$_POST['sdt'];
                $ngaydathang=date('h:i:sa d/m/y');
                $tongdonhang=tongdonhang();
                $PTTT=$_POST['pttt'];
                $idbill = insert_bill($iduser,$name,$email,$diachi,$sdt,$PTTT,$ngaydathang,$tongdonhang);
                foreach ($_SESSION['mycart'] as $cart) {
                    insert_cart($_SESSION['user']['id'],$cart[0],$cart[2],$cart[1],$cart[3],$cart[4],$cart[5],$idbill,$cart[6]);
                }
                if($tongdonhang<=750000){
                  update_bill_ship($idbill,$tongdonhang);
                }
                // $_SESSION['mycart']=[];
            }
            $bill=loadone_bill($idbill);
            $billct=loadall_cart($idbill);
            $load_email = load_email($_SESSION['user']['id']);
            include 'mail/send.php';
            switch($_POST['pttt']){
              case "1": 
                include "view/cart/billconform.php";
                updatettdonhang($idbill);
                break;
                case "2":
                  include "view/cart/chuyenkhoan.php";
                  updatettdonhang($idbill);
                  break;
                  case "3";
                  include "view/cart/billconform.php"; 
                  insert_vnpay($idbill,$tongdonhang);
                  include "vnpay_php/vnpay_pay.php";
                 
                  break;
            }
            $_SESSION['mycart']=[];
          }else{
            echo '<h1 style="color:red;">Chưa có sản phẩm được chọn. Vui lòng chọn sản phẩm để đặt hàng!</h1><br>';
            include "view/cart/viewcart.php";
          }
                        break;

// -----------vnpay--------------
case 'vnpayPay':
  if(isset($_POST['dongydathang'])&&($_POST['dongydathang'])){
     if(isset($_SESSION['user'])) $iduser = $_SESSION['user']['id'];
     else $id = 0;
    $name=$_POST['name'];
      $email=$_POST['email'];
      $diachi=$_POST['diachi'];
      $sdt=$_POST['sdt'];
      $ngaydathang=date('h:i:sa d/m/y');
      $tongdonhang=tongdonhang();
      $PTTT=$_POST['pttt'];
      $size=$_POST['size'];
      $idbill = insert_bill($iduser,$name,$email,$diachi,$sdt,$PTTT,$ngaydathang,$tongdonhang);
      foreach ($_SESSION['mycart'] as $cart) {
          insert_cart($_SESSION['user']['id'],$cart[0],$cart[2],$cart[1],$cart[3],$cart[4],$cart[5],$idbill,$size);
          
      } 
  }
  $bill=loadone_bill($idbill);
  $billct=loadall_cart($idbill);
  insert_vnpay($idbill,$tongdonhang);
  updatettdonhang($idbill);
  include "vnpay_php/vnpay_pay.php";
  $_SESSION['mycart']=[];
              break;



              case 'mybill':
                if(isset($_SESSION['user'])){
                  $listbill = loadall_bill("",$_SESSION['user']['id']);
                  include "view/cart/mybill.php";
                }
                else{
                  echo '<h1 color:red;>Vui lòng đăng nhập!</h1>';
                  include "view/taikhoan/dangnhap.php";
                                break;
                }

        case 'lienhe':
               
                break;
                case 'home':
                  include "view/home.php";
                       
                        break;
        case 'huydh':
          if(load_ttdh($_GET['id']) ==0){
            if(isset($_GET['id'])&&($_GET['id'])>0){
              delete_cart($_GET['id']);
              delete_vnpay($_GET['id']);
              delete_bill($_GET['id']);
            }
            $listbill = loadall_bill("",$_SESSION['user']['id']);
            include "view/cart/mybill.php";
          }
          else{
            echo '<h1 style="color:red;text-align:center;">Đơn hàng <strong>'.$_GET['id'].'</strong> đang được xử lý từ nhà bán hàng, vui lòng liên hệ để được hỗ trợ!</h1>';
            $listbill = loadall_bill("",$_SESSION['user']['id']);
            include "view/cart/mybill.php";
          }
         
          
          break;
        
        default:
        include "view/home.php";
            break;
    }
}else{
    include "view/home.php";
}

include "view/footer.php";

?>


