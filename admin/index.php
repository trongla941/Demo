<?php 
session_start();
include "model/pdo.php";
include "model/danhmuc.php";
include "model/sanpham.php";
include_once(__DIR__ . '/model/taikhoan.php');
include_once(__DIR__ . '/model/cart.php');
include_once(__DIR__ . '/model/binhluan.php');
include "header.php";
// controller

if(isset($_GET['act'])){
    $act=$_GET['act'];
    switch ($act) {
        case 'adddm':
            if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
           $tenloai=$_POST['tenloai'];
           insert_danhmuc($tenloai);
            $thongbao="Thêm Thành Công!";
        }
            include "danhmuc/add.php";
            break;
        case 'listdm':
            $listdanhmuc = loadall_danhmuc();
                include "danhmuc/list.php";
                 break;
        case 'xoadm':
            if(isset($_GET['id'])&&($_GET['id']>0)){
                delete_sanphamByIDDM($_GET['id']);
                delete_danhmuc($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();
                include "danhmuc/list.php";
                 break;




                 case 'ctdh':
                    if(isset($_GET['id'])&&($_GET['id']>0)){
                      $id=$_GET['id'];
                      $bill=loadone_bill($_GET['id']);
                      $one_bill = loadone_cart($_GET['id']);
                      extract($bill);
                      include "../view/cart/chitietdonhang.php";
                  }else{
                      include "../view/home.php";
                  }
                  break;
        
// để hiện ra thông tin của sp cần sửa => chưa sửa được chỉ thấy thôi 
        case 'suadm': 
            if(isset($_GET['id'])&&($_GET['id']>0)){
               $dm = loadone_danhmuc($_GET['id']);
            }
            include "danhmuc/update.php";
            break;

            case 'suatk': 
                if(isset($_GET['id'])&&($_GET['id']>0)){
                   $dm = loadone_taikhoan($_GET['id']);
                }
                include "taikhoan/update.php";
                break;
    

        case 'updatedm':
            if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                $tenloai=$_POST['tenloai'];
                $id=$_POST['id'];
                update_danhmuc($id,$tenloai);
                 $thongbao="Cập nhật Thành Công!";
             }
             $listdanhmuc = loadall_danhmuc();
                include "danhmuc/list.php";
                 break;
// -----------------------đơn hàng----------------
case 'suadh': 
    if(isset($_GET['id'])&&($_GET['id']>0)){
       $dm = loadone_bill($_GET['id']);
    }
    include "bill/update.php";
    break;
case 'update_dh':
    if(isset($_POST['capnhat_dh'])&&($_POST['capnhat_dh'])){
        $id=$_POST['id'];
        $bill_name=$_POST['bill_name'];
        $bill_tel=$_POST['bill_tel'];
        $bill_email=$_POST['bill_email'];
        $bill_address=$_POST['bill_address'];
        $toltal=$_POST['toltal'];
        $bill_pttt=$_POST['bill_pttt'];
        $bill_status=$_POST['bill_status'];
        $TrangThaiThanhToan=$_POST['TrangThaiThanhToan'];
        update_bill($id,$bill_name,$bill_tel,$bill_email,$bill_address,$toltal,$bill_pttt,$bill_status,$TrangThaiThanhToan);
         $thongbao="Cập nhật Thành Công!";
     }
     $listbill = loadall_bill("",0);
        include "bill/listbill.php";
         break;

         case 'listbill': 
            if(isset($_POST['kyw'])&&($_POST['kyw']!="")){
                $kyw=$_POST['kyw'];
            }
            else{
                $kyw="";
            }
$listbill = loadall_bill($kyw,0);
                        include "bill/listbill.php";
                        break;           
            
                     case 'xoadh':
                            if(isset($_GET['id'])&&($_GET['id']>0)){
                                delete_bill($_GET['id']);
                            }
                            $listbill = loadall_bill("",0);
                            include "bill/listbill.php";
                                 break;

// -----------------------tai khoan khach hang----------------
case 'xoatk':
    if(isset($_GET['id'])&&($_GET['id']>0)){
        delete_cartById($_GET['id']);
        delete_binhluanById($_GET['id']);
        delete_taikhoan($_GET['id']);
    }
    $listtaikhoan = loadall_taikhoan();
        include "taikhoan/list.php";
         break;

                 case 'updatetk': 
                    if(isset($_GET['id'])&&($_GET['id']>0)){
                       $dm = loadone_taikhoan($_GET['id']);
                    }
                    include "taikhoan/update.php";
                    break;
         case 'updatekh':
                    if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                        $id=$_POST['id'];
                        $user=$_POST['user'];
                        $pass=$_POST['pass'];
                        $email=$_POST['email'];
                        $diachi=$_POST['diachi'];
                        $sdt=$_POST['sdt'];
                        $role=$_POST['role'];
                        update_taikhoan($id,$user,$pass,$email,$diachi,$sdt,$role);
                         $thongbao="Cập nhật Thành Công!";
                     }
                     $listtaikhoan = loadall_taikhoan();
                        include "taikhoan/list.php";
                         break;
            case 'dskh': 
                if(isset($_POST['kyw'])&&($_POST['kyw']!="")){
                    $kyw=$_POST['kyw'];
                }
                else{
                    $kyw="";
                }
                $listtaikhoan = loadall_taikhoan();
                        //    $listtaikhoan = loadall_taikhoan($kyw,0);
                           include "taikhoan/list.php";
                            break;           
                            // $listtaikhoan = loadall_taikhoan(); 
                    
                            // break;
// --------------controller binhluan--------------

case 'xoabl':
    if(isset($_GET['id'])&&($_GET['id']>0)){
        delete_binhluan($_GET['id']);
    }
    $listbinhluan = loadall_binhluan(0);
        include "binhluan/list.php";
         break;
        // --------------controller sanpham--------------
        case 'addsp':
            if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
        $iddm=$_POST['iddm'];
        $tensp=$_POST['tensp'];
           $giasp=$_POST['giasp'];
           $mota=$_POST['mota'];
           $hinh=$_FILES['hinh']['name'];
           $target_dir = "../upload/";
           $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
           if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["hinh"]["name"])). " has been uploaded.";
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
           insert_sanpham($tensp,$giasp,$hinh,$mota,$iddm);
            $thongbao="Thêm Thành Công!";
        }
        $listdanhmuc = loadall_danhmuc();
            include "sanpham/add.php";
            break;
case 'listsp':
            if(isset($_POST['lickok'])&&($_POST['lickok'])){
                $kyw=$_POST['kyw'];
                $iddm=$_POST['iddm'];

            }
            else{
                $kyw="";
                $iddm=0;
            }
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham($kyw,$iddm);
                include "sanpham/list.php";
                 break;

                 
        case 'xoasp':
            if(isset($_GET['id'])&&($_GET['id']>0)){
                delete_sanpham($_GET['id']);
            }
            $listsanpham = loadall_sanpham("",0);
                include "sanpham/list.php";
                 break;

        case 'suasp': 
            if(isset($_GET['id'])&&($_GET['id']>0)){
               $sanpham = loadone_sanpham($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();
            include "sanpham/update.php";
            break;

        case 'updatesp':
            if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                   $id=$_POST['id'];
                   $iddm=$_POST['iddm'];
                   $tensp=$_POST['tensp'];
                   $giasp=$_POST['giasp'];
                   $mota=$_POST['mota'];
                   $hinh=$_FILES['hinh']['name'];
                   $target_dir = "../upload/";
                   $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                   if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                   // echo "The file ". htmlspecialchars( basename( $_FILES["hinh"]["name"])). " has been uploaded.";
                  } else {
                   // echo "Sorry, there was an error uploading your file.";
                  }
                update_sanpham($id,$iddm,$tensp,$giasp,$mota,$hinh);
                 $thongbao="Cập nhật Thành Công!";
             }
             $listdanhmuc = loadall_danhmuc(); 
             $listsanpham = loadall_sanpham("",0);
                include "sanpham/list.php";
                
                
               

                    case 'dsbl': 
                        $listbinhluan = loadall_binhluan(0); 
                        
                        include "binhluan/list.php";
                        break;
                case 'thongke': 
                        $listthongke = loadall_thongke(); 
                        $loadall_thongke_sales = loadall_thongke_sales();
                        $loadall_thongke_orders = loadall_thongke_orders();
                        $loadall_thongke_product = loadall_thongke_product();
                        $listdanhmuc = loadall_danhmuc();
                        include "thongke/list.php";
                        break;
                
                case 'logout':
                    unset($_SESSION['admin']);

                    header("Location: xamsneaker/index.php");
                    break;

            
       
        default:
        include "home.php";
            break;
    }
}
else{
    include "home.php";
}




include "footer.php";
?>