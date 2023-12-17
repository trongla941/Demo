<?php
// session_start();
// $_SESSION['mycart']=[];
           function viewcart(){
            $tong=0;
            global $img_path;
            $i=0;
                           foreach ($_SESSION['mycart'] as $cart) {
                              $hinh=$img_path.$cart[2];
                              $thanhtien=$cart[3] * $cart[4];
                              $tong+=$thanhtien;
                            echo '
                            <tr>
                              <td>'.($i+1).'</td>
                              <td><img src="'.$hinh.'" alt="" height="80px"></td>
                              <td>'.$cart[1].'</td>
                              <td>'.$cart[3].'</td>
                              <td>'.$cart[4].'</td>
                              <td>'.$thanhtien.'</td>
                              
                          </tr>';
                          $i+=1;
                           }
                           echo '<tr>
                           <td colspan="4">Tổng Đơn Hàng</td>
                           <td colspan="3">'.$tong.'</td>
                          
                       </tr>';
           }
           function tongdonhang(){
           $tong=0;
                           foreach ($_SESSION['mycart'] as $cart) {
                    
                              $thanhtien=$cart[3] * $cart[4];
                              $tong+=$thanhtien;
                           }
                        return $tong;
           }
           function insert_bill($iduser,$name,$email,$diachi,$sdt,$pttt,$ngaydathang,$tongdonhang){
            $sql = "insert into bill(iduser,bill_name,bill_email,bill_address,bill_tel,bill_pttt,ngaydathang,toltal) values('$iduser','$name','$email','$diachi','$sdt','$pttt','$ngaydathang','$tongdonhang')";
            return pdo_execute_return_lastInsertID($sql);
        }

        function insert_cart($iduser,$idpro,$img,$name,$price,$soluong,$thanhtien,$idbill,$size){
            $sql="insert into cart(iduser,idpro,img,name,price,soluong,thanhtien,idbill,size) values('$iduser','$idpro','$img','$name','$price','$soluong','$thanhtien','$idbill','$size')";
            return pdo_execute_return_lastInsertID($sql);
        }
        function insert_GIOHANG($iduser,$idpro,$img,$name,$price,$soluong,$thanhtien,$size){
            $sql="insert into giohang(iduser,idpro,img,name,price,soluong,thanhtien,size) values('$iduser','$idpro','$img','$name','$price','$soluong','$thanhtien','$size')";
            return pdo_execute_return_lastInsertID($sql);
        }
        function loadone_bill($id){
            $sql = "select * from bill where id=".$id;
            $bill = pdo_query_one($sql);
            return $bill;
        }
        function loadone_bill_user($id){
            $sql = "select * from bill where iduser=".$id;
            $bill = pdo_query_one($sql);
            return $bill;
        }
        
        function loadone_giohang($id){
            $sql = "select * from giohang where idbill=".$id;
            $bill = pdo_query($sql);
            return $bill;
        }
        function loadone_giohang_user($id){
            $sql = "select * from giohang where iduser=".$id;
            $bill = pdo_query_one($sql);
            return $bill;
        }
        function loadone_cart($id){
            $sql = "select * from cart where idbill=".$id;
            $bill = pdo_query($sql);
            return $bill;
        }
        function loadall_cart($idbill){
            $sql = "select * from cart where idbill=".$idbill;
            $bill = pdo_query($sql);
            return $bill;
        }
        function loadall_cart_count($idbill){
            $sql = "select * from cart where idbill=".$idbill;
            $bill = pdo_query($sql);
            return sizeof($bill);
        }
        function loadall_bill($kyw="",$iduser=0){

            $sql = "select * from bill where 1";
            if($iduser>0)  $sql.=" AND iduser=".$iduser;
            if($kyw!="")  $sql.=" AND id like '%".$kyw."%'";
            $sql.=" order by id desc";
$bill = pdo_query($sql);
            return $bill;
        }
        function get_pttt($n){
            switch ($n) {
                case '1':
                    $tt="Thanh toán khi nhận hàng";
                    break;
                    case '2':
                        $tt="<p style='color:red; font-weight:bold;'>Chuyển khoản</p>";
                        break;
                        case '3':
                            $tt="<p style='color:blue; font-weight:bold;'>Thanh toán online</p>";
                            break;
                
                default:
                $tt="Thanh toán khi nhận hàng";
                break;
        }
        return $tt;
         }
         function get_tttt($n){
            switch ($n) {
                case '0':
                    $tt="<p style='color:red; font-weight:bold;'; >Đã Thanh Toán</p>";
                    break;
                    case '1':
                        $tt="Chưa Thanh Toán";
                        break;
                
                default:
                $tt="Chưa Thanh Toán";
                break;
        }
        return $tt;
         }

        function get_ttdh($n){
            switch ($n) {
                case '0':
                    $tt="Đơn hàng mới";
                    break;
                    case '1':
                        $tt="<p style='color:green; font-weight:bold;'>Đơn hàng đang xử lý</p>";
                        break;
                        case '2':
                            $tt="<p style='color:orange; font-weight:bold;'>Đang giao hàng</p>";
                            break;
                            case '3':
                                $tt="<p style='color:blue; font-weight:bold;'>Đã giao thành công</p>";
                                break;
                
                default:
                $tt="Đơn hàng mới";
                break;
            }
            return $tt;
        }
        function loadall_thongke(){
            $sql = "select danhmuc.id as madm, danhmuc.name as tendm, count(sanpham.id) as countsp, min(sanpham.price) as minprice, max(sanpham.price) as maxprice, avg(sanpham.price) as avgsanpham";
            $sql.=" from sanpham left join danhmuc on danhmuc.id=sanpham.iddm";
            $sql.=" group by danhmuc.id order by danhmuc.id desc";
            $listthongke = pdo_query($sql);
            return $listthongke;
        }
        function loadall_thongke_sales(){
            $sql = "SELECT SUM(toltal) AS tong FROM bill";
            $listthongke = pdo_query_one($sql);
            extract($listthongke);
            return $tong;
        }
        function loadall_thongke_orders(){
            $sql = "SELECT count(id) AS dem FROM bill";
            $listthongke = pdo_query_one($sql);
            extract($listthongke);
            return $dem;
        }
        function loadall_thongke_product(){
            $sql = "SELECT count(id)*20 AS sanphamdem FROM sanpham";
            $listthongke = pdo_query_one($sql);
            extract($listthongke);
            return $sanphamdem;
        }

        function delete_cart($id){
            $sql="delete from cart where idbill=".$id;
            pdo_execute($sql);
        }
        function delete_giohang($id){
            $sql="delete from giohang where iduser=".$id;
            pdo_execute($sql);
        }
        function delete_vnpay($id){
            $sql="delete from bill_vnpay where id_bill=".$id;
            pdo_execute($sql);
        }
      
        function delete_bill($id){
            $sql="delete from bill where id=".$id;
            pdo_execute($sql);
        }
        function updateslsp($id){
            $sql="update cart SET soluong where id=".$id;
            pdo_execute($sql);
        }
 
        function update_statusdh($id){
            $sql="update bill SET TrangThaiThanhToan=0  where id=".$id;
            pdo_execute($sql);
        }
        
    

        function  update_bill($id,$bill_name,$bill_tel,$bill_email,$bill_address,$toltal,$bill_pttt,$bill_status,$TrangThaiThanhToan){
            $sql="update bill set bill_name='".$bill_name."', bill_tel='".$bill_tel."', bill_email='".$bill_email."', bill_address='".$bill_address."', toltal='".$toltal."',bill_pttt='".$bill_pttt."', bill_status='".$bill_status."', TrangThaiThanhToan='".$TrangThaiThanhToan."' where id=".$id;
            pdo_execute($sql);
        }

        // function  update_giohang($id,$size,$soluong,$toltal){
        //     $sql="update giohang set where id=".$id;
        //     pdo_execute($sql);
        // }

        function  update_bill_ship($id,$toltal){
            $toltal2 = $toltal+30000;
            $sql="update bill set toltal='".$toltal2."' where id=".$id;
            pdo_execute($sql);
        }
        function delete_cartById_cart($id){
            $sql="delete from cart where iduser=".$id;
            pdo_execute($sql);
        }
        function delete_donhang($id){
            $sql="delete from bill where id=".$id;
            pdo_execute($sql);
        }
        function increaseQuantity($name) {
            foreach ($_SESSION['mycart'] as $cart) {
                if ($cart[1] == $name) {
                    return true; // Trả về true nếu tên sản phẩm trùng
                }
            }
            return false; // Trả về false nếu tên sản phẩm không trùng
        }
        function increaseQuantity_size($size) {
            foreach ($_SESSION['mycart'] as &$cart) {
                if ($cart[6] == $size) {
                    return true; // Trả về true nếu tên sản phẩm trùng
                }
            }
            return false; // Trả về false nếu tên sản phẩm không trùng
        }
        
        function increaseQuantity_update($name) {
            foreach ($_SESSION['mycart'] as &$cart) {
                if ($cart[1] == $name) {
                    $cart[4]++; // Tăng số lượng lên 1
                }
            }
        }
        
       
       
        function load_email($iduser){
            if($iduser>0){
             $sql = "select * from taikhoan where id=".$iduser;
             $dm = pdo_query_one($sql);
             extract($dm);
             return $email;
            }
            else{
             return "";
            }
         }
?>