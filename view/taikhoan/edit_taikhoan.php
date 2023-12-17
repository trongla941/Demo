<div class="row mb">
    <div class="boxtrai mr">
        <div class="row">
            <div class="row mb">
                    <div class="boxtitle">THÔNG TIN TÀI KHOẢN</div>
                    <div class="row boxcontent formtaikhoan">
                        <?php
                        if(isset($_SESSION['user'])&&(is_array($_SESSION['user']))){
                            extract($_SESSION['user']);
                        }
                          ?>
                    <form action="index.php?act=edit_taikhoan" method="post">
                    <div class="row capnhattt">
                    <div class="row mb10">
                            Email <br>
                            <input type="email" name="email" value="<?=$email?>">
                    </div>
                    <div class="row mb10">
                            User <br>
                            <input type="text" name="user" value="<?=$user?>">
                    </div>
                    <!-- <div class="row mb10"> -->
                             <!-- <br> -->
                            <input type="hidden" name="pass" value="<?=$pass?>">
                    <!-- </div> -->
                    <div class="row mb10">
                            Địa Chỉ <br>
                            <input type="text" name="diachi" value="<?=$diachi?>">
                    </div>
                    <div class="row mb10">
                            Số điện thoại <br>
                            <input type="text" name="sdt" value="0<?=$sdt?>">
                    </div>
                    <div class="row">
                             <input type="hidden" name="id" value="<?=$id?>">
                            <input type="submit" value="Cập Nhật" name="capnhat">
                    </div>
                    </div>

                    </form>
                    <h2 class="thongbao">
                    <?php
                    if(isset($thongbao)&&($thongbao!="")){
                        echo $thongbao;
                    }

                    ?>
                    </h2>
                    </div>
                </div>
                       
            </div>
        </div>
        <div class="boxphai">
            <?php include "view/boxphai.php"; ?>
            </div>
