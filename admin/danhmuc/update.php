<?php
if(is_array($dm)){
    extract($dm);
}
?>

<div class="row">
<header class="w3-container w3-blue">
                <h1>UPDATE BRAND</h1>
            </header>
           <div class="row formcontent">
            <form action="index.php?act=updatedm" method="post">
               <div class="row mb10">
                Mã loại Hàng <br>
                <input type="text" name="maloai" id="" disable>
               </div>
                <div class="row mb10">
                    Tên Loại Hàng <br>
                <input type="text" name="tenloai" id="" value="<?php if(isset($name)&&($name!="")) echo $name?>">
                </div>
                <div class="row mb10">
                    <input type="hidden" name="id" value="<?php if(isset($id)&&($id>0)) echo $id?>">
                    <input type="submit" name="capnhat" value="Cập nhật">
                    <input type="reset" value="Nhập lại">
                    <a href="index.php?act=listdm"><input type="button" value="Danh sách"></a>
                </div>
            <?php 
            if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
            ?>
            </form>
           </div>
        </div>
        </div>