<header class="w3-container w3-blue">
                <h1>ADD BRAND</h1>
            </header>
<div class="row">

          <style>  .row90 {
            padding-left: 20px;
        }</style>
            <div class="row90">
            <div class="row formcontent">
            <form action="index.php?act=adddm" method="post">
               <div class="row mb10">
                Mã loại Hàng <br>
                <input type="text" name="maloai" id="" disable>
               </div>
                <div class="row mb10">
                    Tên Loại Hàng <br>
                <input type="text" name="tenloai" id="">
                </div>
                <div class="row mb10">
                    <input type="submit" name="themmoi" value="Them Moi">
                    <input type="reset" value="Nhap Lai">
                    <a href="index.php?act=listdm"><input type="button" value="Danh Sach"></a>
                </div>
            <?php 
            if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
            ?>
            </form>
           </div>

        </div>
        </div>
        </div>