<div class="row mb">
            <div class="boxtrai mr">
            <div class="row">
            <div class="row mb">
                <?php 
                extract($onesp);
                function formatPrice($price) {
                    return number_format($price, 0, ',', '.');
                    
                }
                ?>
                    <div class="boxtitle">Chi tiết sản phẩm </div>
                    <div class="row boxcontent">
                    <div class="boxtraictsp mr">
                       <?php
                       $hinh=$img_path.$img;
                       echo '<div class="row mb spct"><img src="'.$hinh.'"> </div>';
                       ?>
                    </div>
                    <div class="boxphaictsp">
                    <p><?=$name?></p>
                        <p style="color:#eb4d5c; font-weight: bold;"><?php $formattedPrice = formatPrice($price); echo $formattedPrice;?>₫</p>
                        <div class="boxphaiboxphaimota">
                        <?php
                       echo'
                       <div class="row btnaddtocartctsp">
                       <form action="index.php?act=addtocart" method="post">
                      <input type="number" name="soluong" id="" min="1" max="10" value="1">
                      <input type="number" name="size" id="" min="'.$size.'" max="42" value="'.$size.'">
                     <input type="hidden" name="id" value="'.$id.'">
                     <input type="hidden" name="name" value="'.$name.'">
                    <input type="hidden" name="img" value="'.$img.'">
                    <input type="hidden" name="price" value="'.$price.'">
                   <input type="submit" value="THÊM VÀO GIỎ HÀNG" name="addtocart">
                         </form>
                     </div>
              ';
                      ?>
                      <ul>

                        <?=$mota?>
                        <br>
                        <img src="view/img/CHECK.svg" alt="" style="width:15px; height:15px"> Tặng kèm vớ/tất cổ ngắn khử mùi<br>
                        <img src="view/img/CHECK.svg" alt="" style="width:15px; height:15px"> Đóng box carton kèm chống sốc, bảo vệ hộp giày nguyên vẹn

                      </ul>
                      </div>
                      
                         </div>
                    </div>
                </div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
                    <script>
                       $(document).ready(function(){
                            $("#binhluan").load("view/binhluan/binhluanform.php", {idpro: <?=$id?>});
                           });
                     </script>
                <div class="row" id="binhluan">
                </div>
                <div class="row mb">
                    <div class="boxtitle">SẢN PHÂM CÙNG LOẠI</div>
                    <div class="row boxcontent">
                        <?php
                        ?>
                       <?php 
                       foreach ($sanpham_cungloai as $sanpham_cungloai) {
                        extract($sanpham_cungloai);
                        $linksp="index.php?act=sanphamct&idsp=".$id;
                        $img=$img_path.$img;
                    echo '<div class=" boxsp ">
                    <div class="row img">
                    <a href="'.$linksp.'"><img src="'.$img.'" alt=""></a>
                    </div>
                    <div class="row imgcontent">
                        <p class="gia"> <span>'.$formattedPrice.'₫</span></p>
                        <a href="'.$linksp.'">'.$name.'</a>
                    </div>
                </div>';
                       }


                        ?>

<!-- .............. -->


                    </div>
                </div>
            </div>
            </div>
            <div class="boxphai">
            <?php include "boxphai.php"; ?>
            </div>
            </div>