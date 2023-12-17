<div class="row mb">
     
            <div class="row">
            <div class="row mb">
                    </div>
                </div>

                

                <div class="row mb">
                    <div class="boxtitle">LỊCH SỬ MUA HÀNG</div>
                    <h1 style="color:blue; padding-left: 20px;padding-top: 20px;">Nếu bạn đã <a style="color:red;">thanh toán Chuyển khoản</a>, tình trạng Thanh toán của đơn hàng sẽ sớm được cập nhật từ nhà bán hàng. Cảm ơn quý khách!</h1>
                <div class="row boxcontent cart">
                <div class="row mb10 formdsloai">
                <table>
                <tr>
                     <th>STT</th>
                    <th>Mã đơn hàng</th>
                    <th>Ngày đặt</th>
                    <th>Số lượng mặt hàng</th>
                    <th>Tổng giá trị đơn hàng</th>
                    <th>Tình trạng đơn hàng</th>
                    <th>Phương thức thanh toán</th>
                    <th>Tình trạng Thanh toán</th>
        
                    <th></th>
                </tr>
                <?php  
                  function formatPrice($price) {
                    return number_format($price, 0, ',', '.');
                    
                }
               
                $i=0;
                if(is_array($listbill)){
                    foreach ($listbill as $bill) {
                        extract($bill);
                        $ttdh=get_ttdh($bill['bill_status']);
                        $count=loadall_cart_count($bill['id']);
                        $tttt=get_tttt($bill['TrangThaiThanhToan']);
                        $pttt=get_pttt($bill['bill_pttt']);
                        $formattedtong = formatPrice($bill['toltal']);
                       echo '<tr>
                       <td>'.($i+1).'</td>
                         <td><a href="index.php?act=ctdh&id='.$bill['id'].'">DAM-'.$bill['id'].'</a></td>
                       <td>'.$bill['ngaydathang'].'</td>
                       <td>'.$count.'</td>
                       <td><strong>'.$formattedtong.' VND</strong></td>
                       <td>'.$ttdh.'</td> 
                       <td>'.$pttt.'</td> 
                       <td>'.$tttt.'</td>';
                       
if($bill['bill_status']<=1){
echo '<td><a href="index.php?act=huydh&id='.$bill['id'].'">Hủy Đơn hàng</a></td>';
}
if($bill['bill_status']==3){
    echo '<td>Đã nhận hàng</td>';
}
if($bill['bill_status']==2){
    echo '<td>Chờ giao hàng</td>';
}
                      

                  echo'</tr>';
                  $i+=1;
                    }
                }


                 ?>
                <!-- <tr>
                     <td>STT</td>
                     <td>STT</td>
                     <td>STT</td>
                     <td>STT</td>
                     <td>STT</td>
                     <td>STT</td>
                </tr> -->
</table>
                </div>
                
                    </div>
                </div>
            </div>
         