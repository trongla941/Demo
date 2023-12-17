<div class="row">
    <div class="row headerAdmin">GIỎ HÀNG</div>

    <div class="row mb">
        <div class="row formcontent">
            <div class="row mb10 formdsloai">
                <table id="giohang-table">
                    <tr>
                        <th>STT</th>
                        <th>Hình</th>
                        <th>Sản Phẩm</th>
                        <th>size</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Thành Tiền</th>
                        <th>Thao Tác</th>
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
                        
                        $formatteddongia = formatPrice($cart[3]);
                        echo '
                        <tr>
                            <td>'.($i+1).'</td>
                            <td><img src="'.$hinh.'" alt="" height="80px"></td>
                            <td>'.$cart[1].'</td>
                            <td>'.$cart[6].'</td> 
                            <td>'.$formatteddongia.'</td>
                            <td>'.$cart[4].'</td>
                            <td id="thanhtien-'.$i.'">'.$formattedthanhtien.'</td>
                            <td><a href="index.php?act=delcart&i='.$i.'">Xóa</a></td>
                        </tr>';
                        $i+=1;
                    }
                    $formattedtong = formatPrice($tong);
                    echo '<tr>
                            <td colspan="4">Tổng Đơn Hàng</td>
                            <td colspan="3" id="tongdonhang"><strong>'.$formattedtong.' VND</strong></td>
                            <td colspan="3" id="tongdonhang"></td>
                          </tr>';
                    ?>
                </table>
            </div>
            <div class="row mb10">
                <a href="index.php?act=bill"><input type="submit" value="ĐỒNG Ý ĐẶT HÀNG"></a>
                <a href="index.php?act=delcart"><input type="button" value="XÓA GIỎ HÀNG"></a>
                <a href="index.php?act=luugiohang"><input type="button" value="TIẾP TỤC MUA HÀNG"></a>
            </div>
        </div>
    </div>
</div>