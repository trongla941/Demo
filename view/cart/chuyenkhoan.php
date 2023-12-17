<div class="row mb">

        <div class="row">
        <div class=" mb">
        <div class="boxtitle2" style="text-align:center">Đặt hàng thành công! Cảm ơn <?=$bill['bill_name']?> đã đặt Hàng!</div>

                    </div>

                </div>
                <div class="row mb">
<div class="boxtitlebill">THÔNG TIN CHUYỂN KHOẢN</div>
<div class="container">
  <img class="centered-image" src="view/img/stkkk.jpg">
</div>

</div>
<?php 
               function formatPrice($price) {
                return number_format($price, 0, ',', '.');
                
            }
            ?>
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
                $formattedPrice = formatPrice($bill['toltal']);
                ?>
            <div class="row mb">
                    <div class="boxtitlebill"> ĐƠN HÀNG</div>
                    <div class="row boxcontent1 formtaikhoan">
                    <h1>Mã đơn hàng: NFVD-00-<?=$bill['id']?></h1>
                    <h1>Ngày đặt hàng: <?=$bill['ngaydathang']?></h1>
                    <h1>Tổng đơn hàng: <?=$formattedPrice?> VND</h1>
                    <h1>Phương thức thanh toán: <?=$PTTT?></h1>
                    <div class="abc "></div>
                    <h1 style="padding-top: 10px;">Người nhận hàng: <?=$bill['bill_name']?></h1>
                    <h1>Ngày đặt hàng: <?=$bill['ngaydathang']?></h1>
                    <h1>Địa chỉ: <?=$bill['bill_address']?> </h1>
                    <h1>Email: <?=$bill['bill_email']?> </h1>
                    <h1>Số Điện Thoại: <?=$bill['bill_tel']?> </h1>
                    
                    </div>
                </div>
                <div class="row mb">
                    
                <div class="row mb">
                    <div class="boxtitle">THÔNG TIN SẢN PHẨM TRONG ĐƠN HÀNG CỦA BẠN</div>
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
                  $formattedthanhtien = formatPrice($thanhtien);
                  $formattedtong = formatPrice($tong);
                  $formatted = formatPrice($cart[3]);
                echo '
                <tr>
                  <td>'.($i+1).'</td>
                  <td><img src="'.$hinh.'" alt="" height="80px"></td>
                  <td>'.$cart[1].'</td>
                  <td>'.$cart[6].'</td>
                  <td>'.$formatted.'</td>
                  <td>'.$cart[4].'</td>
                  <td>'.$formattedthanhtien.'</td>
                  
              </tr>';
              $i+=1;
               }
               echo '<tr>
               <td colspan="4">Tổng Đơn Hàng</td>
               <td colspan="3"><strong>'.$formattedtong.' VND</strong></td>
              
           </tr>';
           
?>
     
</table>
               </div>
               
                    </div>
                  
                </div>  
            </div>
     