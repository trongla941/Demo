
<style> 
        .row{
            padding:20px;
        }
   
    </style>
        <header class="w3-container w3-blue">
                <h1>LIST CUSTOMMER</h1>
            </header>
<div class="row">

           <div class="row formcontent">
           <form action="index.php?act=dskh" method="post" class="mb10">
    <input type="text" name="kyw" placeholder="Nhập user">
    <input type="submit" name="listok"value="OK">
            </form>
            <div class="row mb10 formdsloai">
              <table>
                <tr>
                    <th></th>
                    <th>STT</th>
                    <th>ID</th>
                    <th>USERNAME</th>
                    <th>EMAIL</th>
                    <th>PASSWORD</th>
                    <th>DIACHI</th>
                    <th>SDT</th>
                    <th>ROLE</th>
                    <th></th>
                </tr>
                <?php 
                $i=0;
                foreach ($listtaikhoan as $taikhoan) {
                   extract($taikhoan);
                    $suatk="index.php?act=suatk&id=".$id;
                    $xoatk="index.php?act=xoatk&id=".$id;
                   echo '<tr>
                   <td><input type="checkbox" name="" id=""></td>
                   <td>'.($i+1).'</td>
                   <td>'.$id.'</td>
                   <td>'.$user.'</td>
                   <td>'.$email.'</td>
                   <td>'.$pass.'</td>
                   <td>'.$diachi.'</td>
                   <td>'.$sdt.'</td>
                   <td>'.$role.'</td>

                   <td><a href="'.$suatk.'"><input type="button" value="Sửa"></a>  <a href="'.$xoatk.'"><input type="button" value="Xóa"></a></td>
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
                    <a href="index.php?act=adddm"><input type="button" value="Nhập Thêm"></a>

               
                </div>
           </div>
        </div>