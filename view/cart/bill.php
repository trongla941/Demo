
<div class="row mb">
    <div class="">
        <div class="row">
        <form action="index.php?act=billconform" method="post">
            <div class="row mb">
                    <div class="boxtitlebill">THÔNG TIN ĐẶT HÀNG</div>
                    <div class="row formtaikhoan boxcontent1">
                    <table>
                        <?php
                        if(isset($_SESSION['user'])){
                            $name=$_SESSION['user']['user'];
                            $diachi=$_SESSION['user']['diachi'];
                            $email=$_SESSION['user']['email'];
                            $sdt=$_SESSION['user']['sdt'];
                        }else{
                            $name="";
                            $diachi="";
                            $email="";
                            $sdt="";
                        }


                         ?>
    <tr>
        <td>Người nhận hàng</td>
        <td><input type="text" name="name" id="" value="<?=$name?>"></td>
    </tr>
    <tr>
        <td>Địa chỉ</td>
        <td><input type="text" name="diachi" id="" value="<?=$diachi?>"></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><input type="text" name="email" id="" value="<?=$email?>"></td>
    </tr>
    <tr>
        <td>Số điện thoại</td>
        <td><input type="text" name="sdt" id="" value="<?=$sdt?>"></td>
    </tr>
</table>
                <p style="font-weight: bold;">PHƯƠNG THỨC THANH TOÁN</p>
                    <div class="row boxcontent formtaikhoan">
                    <input type="radio" value="1" name="pttt" id=""> Thanh toán khi nhận hàng <br>
                    <input type="radio" value="2" name="pttt" id=""> Chuyển khoản ngân hàng (Theo thông tin chuyển khoản) <br>
                    <a link="index.php?act=vnpayPay"><input type="radio" value="3" name="pttt" id=""> Thanh toán online (Thanh toán qua Cổng thanh toán VNPAY)</a>

                    </div>
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
                    function formatPrice($price) {
                        return number_format($price, 0, ',', '.');
                        
                    }
                   
                    $tong = 0;
                    $i = 0;
                    $cartItems = $_SESSION['mycart']; // Lấy dữ liệu giỏ hàng từ session

                    foreach ($cartItems as $cart) {
                        $hinh = $img_path . $cart[2];
                        $thanhtien = $cart[3] * $cart[4];
                        $formattedthanhtien = formatPrice($thanhtien);
                        $tong += $thanhtien;
                        $formattedtong = formatPrice($tong);
                        $formatteddongia = formatPrice($cart[6]);
                        echo '
                        <tr>
                            <td>'.($i+1).'</td>
                            <td><img src="'.$hinh.'" alt="" height="80px"></td>
                            <td>'.$cart[1].'</td>
                            <td>'.$formatteddongia.'</td> 
                            <td>'.$cart[3].'</td>
                            <td>'.$cart[4].'</td>
                            <td id="thanhtien-'.$i.'">'.$formattedthanhtien.'</td>
                        </tr>';
                        $i+=1;
                    }
                    
                    echo '<tr>
                            <td colspan="4">Tổng Đơn Hàng</td>
                            <td colspan="3" id="tongdonhang"><strong>'.$formattedtong.' VND</strong></td>
                            
                          </tr>';
                    ?>

</table>
               </div>
                    </div>
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
 echo '<h1 class="theh3" style="padding-top:20px; margin-top:20px">Phí vận chuyển '.$formattedphivanchuyen.' VND</h1>';
 echo '<h1 class="theh2">Tổng tiền cần thanh toán khi nhận hàng: '.$formattedtongtienhang.' VND<br>';
?>
                    <div class="row mb10">
                <br>
                <a href="index.php?act=billconform" ><input type="submit" value="TIẾP TỤC ĐẶT HÀNG" name="dongydathang" onclick="validatePaymentMethod()"></a>  
       
                </div>
    </form>
 
                </div>  
            </div>
        </div>
        


<?php 
//include('C:\wamp64\www\xamsneaker\mail\send.php');
?>

        