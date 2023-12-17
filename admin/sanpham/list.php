<style>
        .row{
            padding:20px;
        }
    </style>
    <header class="w3-container w3-blue">
                <h1>LIST PRODUCT</h1>
            </header>
<div class="row">

           <div class="row formcontent">
            <div class="row mb10 formdsloai">
            <form action="index.php?act=listsp" method="post">
    <input type="text" name="kyw">
    <select name="iddm" id="">
    <option value="0" selected>Tất cả</option>
                    <?php
                    foreach ($listdanhmuc as $danhmuc) {
                        extract($danhmuc);
                        echo '<option value="'.$id.'" name="">'.$name.'</option>';
                        // $namedm=$danhmuc['name'];
                    }
                    ?>
                </select>
                <input type="submit" value="SEARCH" name="lickok">
</form><br>
              <table>
                <tr>
                    <th></th>
                    <th>STT</th>
                    <!-- <th>Tên loại</th> -->
                    <th>Tên sản phẩm</th>
                    <th>Hình</th>
                    <th>Giá</th>
                    <th>Lượt xem</th>
                    <th></th>
                </tr>
                <?php 
                
                $i=0;
                foreach ($listsanpham as $sanpham) {
                        // extract($danhmuc);
                   extract($sanpham);
                    $suasp="index.php?act=suasp&id=".$id;
                    $xoasp="index.php?act=xoasp&id=".$id;
                   $hinhpath = "../upload/".$img;
                   if(is_file($hinhpath)){
                    $hinh="<img src='".$hinhpath."' height='80'";

                   }else{
                    $hinh="no photo";
                   }
                    echo '<tr>
                   <td><input type="checkbox" name="" id=""></td>
                   <td>'.($i+1).'</td>
                   <td>'.$name.'</td>
                   <td>'.$hinh.'</td>
                   <td>'.$price.'</td>
                   <td>'.$luotxem.'</td>
                   <td><a href="'.$suasp.'"><input type="button" value="Sửa"></a>  <a href="'.$xoasp.'"><input type="button" value="Xóa"></a></td>
               </tr>';
               $i+=1;
                }


                ?>
               
              </table>
               </div>
                <div class="row mb10">
                    <input type="button" value="Chọn tất cả">
                    <input type="button" value="Bỏ chọn tất cả">
                    <input type="button" value="Xóa các mục đã chọn">
                    <a href="index.php?act=addsp"><input type="button" value="Nhập Thêm"></a>

               
                </div>
           </div>
        </div>