<?php
include 'D:\wamp64\www\xamsneaker\admin\model\pdo.php';
include 'D:\wamp64\www\xamsneaker\admin\model\binhluan.php';

$idpro = $_REQUEST['idpro'];
session_start();
$dsbl = loadall_binhluan($idpro);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../view/style.css">
</head>
<body>
    <div class="row mb">
        <!-- <div class="boxtitle">BÌNH LUẬN</div> -->
        <p style="padding-left: 10px; font-weight: bold; padding-bottom: 10px; font-size: 1.5vw; text-align: center;">BÌNH LUẬN</p>
        <!-- <p style="border-bottom: 1px #ccc solid;"></p> -->
        <div class=" menudoc">
            <ul>
                <?php
                foreach ($dsbl as $bl) {
                    extract($bl);
                    $name = load_ten_taikhoan($iduser);
                    echo '<h1 style="padding:20px">'. $name .': '.$noidung.'</h1>';
                }
                ?>
            </ul>
        </div>
        <div class="boxfooter searchbox binhluanform">
        <?php 
                 foreach ($dsbl as $bl) {
                    extract($bl);
                    // $name = load_ten_taikhoan($iduser); echo '<p>Gửi bình luận</p>';
                }
                    ?><br>
                    <div class="binhluanformmm"><form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                <input type="hidden" name="idpro" value="<?=$idpro?>">
                <input type="text" name="noidung" id="" placeholder="Gửi bình luận công khai" style="padding-left:10px;color:#333; border-bottom-left-radius: 20px;border-top-left-radius: 20px;">
               <input type="submit" value="Gửi bình luận" name="guibinhluan" style="height: 35px; border-radius: none;">
            </form>
        </div>
        </div>
    </div>

    <?php
    if(isset($_SESSION['user'])){
        if(isset($_POST['guibinhluan']) && ($_POST['guibinhluan'])){
            $noidung = $_POST['noidung'];
            $idpro = $_POST['idpro'];
            $iduser = $_SESSION['user']['id'];
            $ngaybinhluan = date("h:i:sa d/m/Y");
            
            insert_binhluan($noidung, $iduser, $idpro, $ngaybinhluan);
            header("Location: ".$_SERVER["HTTP_REFERER"]);
        }
    } else {
        echo '<h1>Vui lòng đăng nhập!</h1>';
    }
    ?>
</body>
</html>
