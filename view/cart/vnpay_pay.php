<div class="row mb">

        <div class="row">
        <div class=" mb">
                    <div class="boxtitle2">Đặt hàng thành công! Cảm ơn <?=$bill['bill_name']?> đã đặt Hàng!</div>
                    


                    </div>
                </div>
                <?php 
                if(isset($bill)&&(is_array($bill))){
                    extract($bill);
                    $PTTT=$_POST['pttt'];
                    if($PTTT==0){
                        $PTTT="Thanh toán trực tiếp";
                    }
                    if($PTTT==1){
                        $PTTT="Thanh toán trực tiếp";
                    }
                    if($PTTT==2){
                        $PTTT="Thanh Toán chuyển Khoản";
                    }
                    if($PTTT==3){
                        $PTTT="Thanh toán online";
                    }
                }

                ?>
            <div class="row mb">
                    <div class="boxtitle"> ĐƠN HÀNG</div>
                    <div class="row boxcontent formtaikhoan">
                    <h1>Mã đơn hàng: NFVD-00-<?=$bill['id']?></h1>
                    <h1>Ngày đặt hàng: <?=$bill['ngaydathang']?></h1>
                    <h1>Tổng đơn hàng: <?=$bill['toltal']?> VND</h1>
                    <h1>Phương thức thanh toán: <?=$PTTT?></h1>
                    <h1>Phương thức thanh toán: <?=$PTTT?></h1>
                    


                    </div>
                </div>
                <div class="row mb">
                    
                    
            <!-- <div class="row boxcontent formtaikhoan"> -->
            <div class="row mb10">
            <div class="boxtitle">THÔNG TIN ĐẶT HÀNG</div>
                    <div class="row boxcontent formtaikhoan">
                    <h1>Người đặt hàng: <?=$bill['bill_name']?></h1>
                    <h1>Ngày đặt hàng: <?=$bill['ngaydathang']?></h1>
                    <h1>Địa chỉ: <?=$bill['bill_address']?> </h1>
                    <h1>Email: <?=$bill['bill_email']?> </h1>
                    <h1>Số Điện Thoại: <?=$bill['bill_tel']?> </h1>
                    </div>
                    </div>
      
                    </div>
               
                    
                </div>
                <div class="row mb">
                    <div class="boxtitle">THÔNG TIN GIỎ HÀNG</div>
                    <div class="row boxcontent formtaikhoan">
                    <div class="row mb10 formdsloai">
            <table>
                <tr>
                     <th>STT</th>
                    <th>Hình</th>
                    <th>Sản Phẩm</th>
                    <th>Size</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành Tiền</th>
                </tr>
                    
<?php
$tong=0;
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
                  <td>'.$cart[6].'</td>
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
?>

</table>
               </div>
               
                    </div>
                  
                </div>  
                <input type="submit" value="THANH TOÁN ONLINE" name="vnpayPay">
            </div>
     