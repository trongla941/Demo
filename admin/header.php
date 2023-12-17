<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../view/style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="website icon" type="png" href="../view/img/logoweb.jpg">
<link rel="stylesheet" href="/admin_css/style_admin.css">
<link rel="stylesheet" href="/admin/style_admin.css">
   
</head>
<body>
<div class="w3-sidebar w3-bar-block w3-card w3-animate-left w3-mobile" style="display:none" id="mySidebar">
        <button class="w3-bar-item w3-button w3-large" onclick="w3_close()"><img src="" alt=""><i class="fa fa-bars w3-right w3-large"></i></button>
        <a href="index.php?act=thongke" class="w3-bar-item w3-button w3-mobile">Dashboard</a>
        <a href="index.php?act=adddm" class="w3-bar-item w3-button w3-mobile">Danh mục</a>
        <a href="index.php?act=addsp" class="w3-bar-item w3-button w3-mobile">Sản Phẩm</a>
        <a href="index.php?act=listbill" class="w3-bar-item w3-button w3-mobile">Đơn hàng</a>
        <a href="index.php?act=dsbl" class="w3-bar-item w3-button w3-mobile">Bình Luận</a>
        <a href="index.php?act=dskh" class="w3-bar-item w3-button w3-mobile">Khách Hàng</a>
        <a href="../index.php?act=thoat" class="w3-bar-item w3-button w3-mobile">Đăng Xuất</a>
        
        
    </div>

    <div id="main">

        <div class="w3-teal">
            <button id="openNav" class="w3-button w3-teal w3-xlarge w3-mobile" onclick="w3_open()">&#9776;</button>
            <div class="w3-container w3-mobile">
                <h1 style="text-align: center;">TRANG QUẢN TRỊ</h1>
            </div>
        </div>
      <script>
            function w3_open() {
                document.getElementById("main").style.marginLeft = "25%";
                document.getElementById("mySidebar").style.width = "25%";
                document.getElementById("mySidebar").style.display = "block";
                document.getElementById("openNav").style.display = 'none';
            }

            function w3_close() {
                document.getElementById("main").style.marginLeft = "0%";
                document.getElementById("mySidebar").style.display = "none";
                document.getElementById("openNav").style.display = "inline-block";
            }
        </script>