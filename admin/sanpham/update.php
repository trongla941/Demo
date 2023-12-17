
<style>
  .row{
            padding-left: 20px;
        }
</style>
<header class="w3-container w3-blue">
                <h1>UPDATE PRODUCT</h1>
            </header>
<div class="row">

           <div class="row formcontent">
           <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
               <div class="row mb10">
               <select name="iddm" id="">
                    <?php
                    foreach ($listdanhmuc as $danhmuc) {
                        extract($danhmuc);
                        if($iddm==$id) $s="selected"; else $s="";
                        echo '<option value="'.$id.'" name="" '.$s.'>'.$name.'</option>';
                    }
                    if(is_array($sanpham)){
                        extract($sanpham);
                    }
                    $hinhpath = "../upload/".$img;
                    if(is_file($hinhpath)){
                     $hinh="<img src='".$hinhpath."' height='80'";
                    }else{
                     $hinh="no photo";
                    }
                    ?>
                </select>
               </div>
                <div class="row mb10">
                    Tên sản phẩm <br>
                <input type="text" name="tensp" id="" value="<?=$name?>">
                </div>
                <div class="row mb10">
                    Giá <br>
                <input type="text" name="giasp" id="" value="<?=$price?>">
                </div>
                <div class="row mb10">
                    Hình <br>
                    <input type="file" name="hinh">
                    <?=$hinh?>
                   
                </div>
                <div class="row mb10">
                    Mô tả <br>
                    <textarea name="mota" id="" cols="30" rows="10"><?=$mota?></textarea>
                </div>
            
                <div class="row mb10">
                    <input type="hidden" name="id" value="<?=$id?>">
                    <input type="submit" name="capnhat" value="Cập Nhật">
                    <input type="reset" value="Nhập Lại">
                    <a href="index.php?act=listsp"><input type="button" value="Danh Sách"></a>
                </div>
            <?php 
            if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
            ?>
            </form>
           </div>
        </div>
        </div>