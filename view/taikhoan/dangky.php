<div class="row mb">
    <div class="boxtrai mr">
        <div class="row">
            <div class="row mb">
                    <div class="boxtitle">ĐĂNG KÝ THÀNH VIÊN</div>
                    <div class="row boxcontent formtaikhoan">
                    <form action="index.php?act=dangky" method="post">
                    <div class="row mb10">
                           Email <br>
                            <input type="email" name="email">
                    </div>
                    <div class="row mb10">
                            User <br>
                            <input type="text" name="user">
                    </div>
                    <div class="row mb10">
                            Mật khẩu <br>
                            <input type="password" name="pass">
                    </div>
                    <div class="row">
                            <input type="submit" value="Đăng ký" name="dangky">
                            <input type="reset" value="Nhập lại">
                    </div>

                    </form>
                    <h2 class="thongbao">
                    <p>Nếu bạn đã có tài khoản vui lòng <a href="index.php?act=dangnhapform">đăng nhập</a></p> 
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
