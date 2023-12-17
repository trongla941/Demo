<header class="w3-container w3-blue">
                <h1>LIST ORDERS</h1>
            </header>
<div class="row">

           <div class="row formcontent">
            <div class="row mb10 formdsloai">
            <form action="index.php?act=listbill" method="post" class="mb10" style="padding-top:20px">
    <input type="text" name="kyw" placeholder="Nhập mã đơn hàng">
    <input type="submit" name="listok"value="OK">
            </form>
            <div class="">
              <table>
                <tr>
                    <th></th>
                    <th>Mã Đơn hàng</th>
                    <th>Khách hàng</th>
                    <th>Giá trị đơn hàng</th>
                    <th>Ngày đặt hàng</th>
                    <th>Phương thức thanh toán</th>
                    <th>Tình trạng đơn hàng</th>
                    <th>Trạng Thái Thanh toán</th>
                    <th>Thao tác</th>
                </tr>
                <?php 
                foreach ($listbill as $bill) {
                    extract($bill);
                    $kh=$bill["bill_name"].'
                    <br>'.$bill["bill_address"].'
                    <br>'.$bill["bill_tel"].'
                    <br>'.$bill["bill_email"].'';
                    $suadh="index.php?act=suadh&id=".$id;
                    $xoadh="index.php?act=xoadh&id=".$id;
                    $ttdh=get_ttdh($bill['bill_status']);
                    $pttt=get_pttt($bill['bill_pttt']);
                    $tttt=get_tttt($bill['TrangThaiThanhToan']);
                    echo '<tr>
                    <td><input type="checkbox" name="" id=""></td>
                    <td>DAM-'.$bill['id'].'</td>
                    <td>'.$kh.'</td>
                    <td>'.$bill['toltal'].'</td>
                    <td>'.$bill['ngaydathang'].'</td>
                    <td>'.$pttt.'</td>
                    <td>'.$ttdh.'</td>
                    <td>'.$tttt.'</td>
                    <td><a href="'.$suadh.'"><input type="button" value="Sửa"></a>  <a href="'.$xoadh.'"><input type="button" value="Xóa"></a></td>
                </tr>';
                }
                ?>
               

              </table>
               </div>
                <div class="row mb10">
                    <input type="button" value="Chọn tất cả">
                    <input type="button" value="Bỏ chọn tất cả">
                    <input type="button" value="Xóa các mục đã chọn">
                    <!-- <a href="index.php?act=addsp"><input type="button" value="Nhập Thêm"></a> -->

               
                </div>
           </div>
        </div>
              </div>
              <style>  .row {
           padding: 0 20px;
        }</style>