<div class="row90">
<?php
if(is_array($dm)){
    extract($dm);
}
?>
<table>
    <style>
        .row90{
            padding-left: 20px;
        }
    </style>
<header class="w3-container w3-blue">
                <h1>UPDATE CUSTOMMER</h1>
            </header>
<div class="row90">

           <div class="row formcontent">
            <form action="index.php?act=updatekh" method="post">
               <div class="row mb10">
                Username <br>
                <input type="text" name="user" id="" value="<?=$user?>">
               </div>
                <div class="row mb10">
                    Địa chỉ <br>
                <input type="text" name="diachi" id="" value="<?=$diachi?>">
                </div>
                <div class="row mb10">
                    Email <br>
                <input type="text" name="pass" id="" value="<?=$pass?>">
                </div>
                <div class="row mb10">
                    Password <br>
                <input type="text" name="email" id="" value="<?=$email?>">
                </div>
                <div class="row mb10">
                    Số điện thoại <br>
                <input type="text" name="sdt" id="" value="<?=$sdt?>">
                </div>
                <div class="row mb10">
                    ROLE <br>
                <input type="text" name="role" id="" value="<?=$role?>">
                </div>
                <div class="row mb10">
                    <input type="hidden" name="id" value="<?php if(isset($id)&&($id>0)) echo $id?>">
                    <input type="submit" name="capnhat" value="Cập nhật">
                    <input type="reset" value="Nhập lại">
                    <a href="index.php?act=listkh"><input type="button" value="Danh sách"></a>
                </div>
            <?php 
            if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
            ?>
            </form>
           </div>
        </div>
        </div>
</div>