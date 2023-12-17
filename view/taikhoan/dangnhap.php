<?php


if (isset($_GET['del']) && ($_GET['del'] == 1)) {
    setcookie("user", "", time() - 86400);
    setcookie("pass", "", time() - 86400);
}

$isLogin = 0;
if (isset($_SESSION['user'])) {
    extract($_SESSION['user']);
    $isLogin = 1;

      if ($role == 1) {
        
          header("Location: admin/index.php");
          exit();
      }
?>
    <div class="row mb10">
        <?php
        if (isset($messageCookie)) {
            echo $messageCookie;
        } else {
            echo "Đã ghi nhận cookie!<br>";
            ?>
            <li><a href="index.php?act=quenmk">Đổi mật khẩu</a></li>
            <li><a href="index.php?act=edit_taikhoan">Cập nhật thông tin cá nhân</a></li>
             <?php if($role==1){  ?>
            <li><a href="admin/index.php">Tài khoản với vai trò Quản trị => Đăng nhập admin</a></li>
             <?php } ?>
            <li><a href="index.php?act=thoat">Đăng xuất</a></li>
         </div>
             
<?php
    // Thêm logic xử lý cho trang khách hàng tại đây (nếu cần)
             }} else {
    $isLogin = 0;
?>
    <form action="index.php?act=dangnhap" method="post">
        <div class="row mmb10">
            Tên đăng nhập <br>
            <input type="text" name="user" id="" value="<?php echo isset($_COOKIE['user']) ? $_COOKIE['user'] : ''; ?>">
        </div>
        <div class="row mb10">
            Mật khẩu <br>
            <input type="password" name="pass" id="" value="<?php echo isset($_COOKIE['pass']) ? $_COOKIE['pass'] : ''; ?>">
        </div>
        <input type="checkbox" name="GHINHO" id="" <?php echo isset($_COOKIE['user']) ? 'checked' : ''; ?>> Ghi nhớ tài khoản ? <br>
        <input type="submit" value="Đăng Nhập" name="dangnhap">
    </form>
    <li><a href="index.php?act=quenmk">Quên mật khẩu</a></li>
    <li><a href="index.php?act=dangky">Đăng kí thành viên</a></li>
<?php } ?>