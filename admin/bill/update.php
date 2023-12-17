<?php
if(is_array($dm)){
    extract($dm);
}
?>
 <style>  .row {
           padding: 0 20px;
        }</style>
<table>
<header class="w3-container w3-blue">
                <h1>UPDATE ORDERS</h1>
            </header>
<div class="row">

           <div class="row formcontent">
            <form action="index.php?act=update_dh" method="post">
               <div class="row mb10">
                Tên Khách Hàng <br>
                <input type="text" name="bill_name" id="" value="<?=$bill_name?>">
               </div>
               <div class="row mb10">
                Số điện thoại <br>
                <input type="text" name="bill_tel" id="" value="<?=$bill_tel?>">
               </div>
                <div class="row mb10">
                    Địa chỉ nhận hàng <br>
                <input type="text" name="bill_address" id="" value="<?=$bill_address?>">
                </div>
                <div class="row mb10">
                    Địa chỉ Email <br>
                <input type="text" name="bill_email" id="" value="<?=$bill_email?>">
                </div>
            
                <div class="row mb10">
                    Hình thức thanh toán <p><strong>1 - thanh toán trực tiếp 2 -thanh toán chuyển khoản 3 - thanh toán online</strong>	</p><br>
                <input type="text" name="bill_pttt" id="" value="<?=$bill_pttt?>">
                </div>
                <div class="row mb10">
                    Trạng thái đơn hàng <p><strong>	0 - đơn hàng mới 1 - Đang xử lý 2 - đang giao hàng 3 - đã giao hàng</strong></p><br>
                <input type="text" name="bill_status" id="" value="<?=$bill_status?>">
                </div>
                <div class="row mb10">
                    Tổng tiền <br>
                <input type="text" name="toltal" id="" value="<?=$toltal?>">
                </div>
                <div class="row mb10">
                    Trạng thái thanh toán <p><strong>	1 - chưa thanh toán 0 - Đã thanh toán</strong></p><br>
                <input type="text" name="TrangThaiThanhToan" id="" value="<?=$TrangThaiThanhToan?>">
                </div>

                <div class="row mb10">
                    <input type="hidden" name="id" value="<?php if(isset($id)&&($id>0)) echo $id?>">
                    <input type="submit" name="capnhat_dh" value="Cập nhật">
                    <input type="reset" value="Nhập lại">
                    <a href="index.php?act=listbill"><input type="button" value="Danh sách"></a>
                </div>
            <?php 
            if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
            ?>
            </form>
           </div>
        </div>
        </div>


