<header class="w3-container w3-blue">
<h1>LIST COMMENT</h1>
            </header>
            <style>
        .row{
            padding:20px;
        }
    </style>
<div class="row">
<header class="w3-container w3-blue">
               
            </header>
           <div class="row formcontent">
            <div class="row mb10 formdsloai">
              <table>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>NỘI DUNG</th>
                    <th>ID_USER</th>
                    <th>ID_PRODUCT</th>
                    <th>NGÀY BÌNH LUẬN</th>
                    <th></th>
                </tr>
                <?php 
                foreach ($listbinhluan as $BINHLUAN) {
                   extract($BINHLUAN);
                
                    $xoabl="index.php?act=xoabl&id=".$id;
                   echo '<tr>
                   <td><input type="checkbox" name="" id=""></td>
                   <td>'.$id.'</td>
                   <td>'.$noidung.'</td>
                   <td>'.$iduser.'</td>
                   <td>'.$idpro.'</td>
                   <td>'.$ngaybinhluan.'</td>
                   <td><a href="'.$xoabl.'"><input type="button" value="Xóa"></a></td>
               </tr>';
                }


                ?>
               
              </table>
               </div>
                <div class="row mb10">
                    <input type="button" value="Chọn tất cả">
                    <input type="button" value="Bỏ chọn tất cả">
                    <input type="button" value="Xóa các mục đã chọn">
                   

               
                </div>
           </div>
        </div>