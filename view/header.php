<?php 
@ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view/img/fonts/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="website icon" type="png" href="./view/img/logoweb.jpg">
    <link rel="stylesheet" href="view/style.css">

    <title>Trang Chủ</title>
</head>
<body>
  
        <div class="row1">
        <div class="row1-left">
        <a href=""><i class="ti-facebook"></i><i class=""></i> Facebook</a>
<a href=""><i class="ti-instagram"></i><i class=""></i> Instagram</a>
<a href=""><i class="ti-email"></i><i class=""></i> Email</a>
</div>
<?php if(isset($_SESSION['user'])){ $a='index.php?act=edit_taikhoan'; }else $a='index.php?act=dangnhapform'; ?>
<div class="row1-right">
<a href="<?=$a?>"><i class="ti-user"></i><i class=""></i> Tài Khoản</a>
<a href="index.php?act=viewcart"><i class="ti-shopping-cart-full"></i><i class=""></i> Giỏ Hàng</a>
<a href="index.php?act=mybill"><i class="ti-flickr"></i><i class=""></i> Đơn hàng của bạn</a>
</div>
        </div>

        <div class="row1 mb">
    <div class="trai ">
        <img src="view/img/logo2.png" alt="">
    </div>
    <div class="giua">
        <div class="row1 row120">
            <div class="boxfooter searchbox searchnhanh">
                <form action="index.php?act=sanpham" method="post">
                    <input placeholder="Từ khóa tìm kiếm" type="text" name="kyw" id="">
                    <input type="submit" value="Tìm Kiếm" name="timkiem">
                </form>
            </div>
        </div>
    </div>
    <div class="phai">    
    <div class="phone" style="display: flex; justify-content: center; align-items: center;">
  <img src="view/img/lienhe.png" alt="">
  <a style="margin-left: 10px; padding-top: 20px;">Hotline <strong>0908 408 828</strong></a>
</div>

    </div>
</div>
        </div>
  
        <div class="row mb menu">
        <div class="row1-left">
            <ul>
                <li><a href="index.php"><i class="ti-home"></i> TRANG CHỦ</a></li>
                <li><a href="index.php?act=gioithieu"><i class="ti-agenda"></i> GIỚI THIỆU</a></li>
                <li><a href="index.php?act=gopy">GÓP Ý</a></li>
                <li><a href="index.php?act=hoidap">HỎI ĐÁP</a></li>
            </ul>
        </div>

        <div class="row1-right">
            <ul>
                
        <?php
                        if(isset($_SESSION['user'])){
                            extract($_SESSION['user']);
                            echo ' <li><a href="index.php?act=dangnhapform">Xin chào <strong>'.$user.' </strong> !</a> </li>';
                        } 
                        ?>
                   
        </ul>
        
        <?php
                          $isLogin=0;
                        if(isset($_SESSION['user'])){
                            extract($_SESSION['user']);
                            $isLogin=1;
                        ?>
                        
        <?php } ?>

                            <?php 
                            if(isset($_SESSION['user'])){
                                extract($_SESSION['user']);
                                if($role==1){  ?>
                            <?php }else ?>
                        <?php } ?>
        </div>
</div>
