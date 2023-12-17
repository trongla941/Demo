<div class="row mb">

        <div class="row">
                </div>
            <?php 
               function formatPrice($price) {
                return number_format($price, 0, ',', '.');
                
            }
            ?>
            <div class="row mb">
                    <div class="boxtitlebill"> ĐƠN HÀNG</div>
                    <div class="row boxcontent1 formtaikhoan">
                    <h1>Mã đơn hàng: NFVD-00-<?=$bill['id']?></h1>
                    <h1>Ngày đặt hàng: <?=$bill['ngaydathang']?></h1>
                    <h1>Tổng đơn hàng: <?php $formattedPrice = formatPrice($bill['toltal']); echo $formattedPrice;?> VND</h1>
                    <div class="abc "></div>
                    <h1 style="padding-top: 10px;">Người nhận hàng: <?=$bill['bill_name']?></h1>
                    <h1>Ngày đặt hàng: <?=$bill['ngaydathang']?></h1>
                    <h1>Địa chỉ: <?=$bill['bill_address']?> </h1>
                    <h1>Email: <?=$bill['bill_email']?> </h1>
                    <h1>Số Điện Thoại: 0<?=$bill['bill_tel']?> </h1>
                    
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
               foreach ($one_bill as $billone) {
                extract($billone);
                  $hinh=$img_path.$img;
                  $tong+=$thanhtien;
                  $fomatgia = formatPrice($price);
                  $formattedthanhtien = formatPrice($thanhtien);
                echo '
                <tr>
                  <td>'.($i+1).'</td>
                  <td><img src="'.$hinh.'" alt="" height="80px"></td>
                  <td>'.$name.'</td>
                  <td>'.$size.'</td>
                  <td>'.$fomatgia.'</td>
                  <td>'.$soluong.'</td>
                  <td>'.$formattedthanhtien.'</td>
                  
              </tr>';
              $i+=1;
               }
               $fomatfomattong = formatPrice($tong);
               echo '<tr>
               <td colspan="4">Tổng Đơn Hàng</td>
               <td colspan="3"><strong>'.$fomatfomattong.' VND</strong></td>
              
           </tr>';
           
?>
                   <?php
 $phivanchuyen =0;
 if($tong<=750000){
  $phivanchuyen =30000;
 }
 else{
  $phivanchuyen =0;
 }
 $tongtienhang=$phivanchuyen+$tong;
 $formattedphivanchuyen = formatPrice($phivanchuyen);
 $formattedtongtienhang = formatPrice($tongtienhang);
 echo '<h1 class="theh3">Phí vận chuyển '.$formattedphivanchuyen.' VND</h1>';
 echo '<h1 class="theh2">Tổng tiền cần thanh toán khi nhận hàng: '.$formattedtongtienhang.' VND<br>';
?>
</table>
               </div>
               
                    </div>
                  
                </div>  
            </div>
     