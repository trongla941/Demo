
                <div class="row mb">
                    <div class="boxtitle">BRAND</div>
                    <div class="boxcontent2 menudoc">
                        <ul>
                            <?php
                            foreach ($dsdm as $dm) {
                               extract($dm);
                               $linkdm ="index.php?act=sanpham&iddm=".$id;
                               echo '<li><a href="'.$linkdm.'">'.$name.'</a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="row mb">
                    <div class="boxtitle">TOP 10 SẢN PHẨM YÊU THÍCH</div>
                    <div class="row boxcontent">
                        <?php 
                        foreach ($dstop10 as $sp) {
                            extract($sp);
                            $linksp="index.php?act=sanphamct&idsp=".$id;
                            $img=$img_path.$img;
                            echo '<div class="row mb10 top10">
                            <a href="'.$linksp.'"><img src="'.$img.'" alt=""></a>
                            <a href="'.$linksp.'">'.$name.'</a>
                        </div>';
                        }
                        ?>
                    </div>
                </div>

                <div class="pt30"></div>
                <div class="row mb">
                    <div class="boxtitle1"><i class="ti-announcement"></i> CHƯƠNG TRÌNH KHUYẾN MÃI</div>
                    <div class="row boxcontent">
                       <p><i class="ti-hand-point-right"></i> Phí vận chuyến <strong>30.000đ</strong>/đơn hàng. Miến phí vận chuyển cho đơn hàng có giá trị từ <strong>750.000đ</strong>.</p>
                       <p><i class="ti-hand-point-right"></i> Đối với đơn hàng thứ hai mua tại shop được khuyến mãi 20% giá trị đơn hàng. </p>
                       <p><i class="ti-hand-point-right"></i> Tặng Quà hấp dẫn kèm theo mỗi đơn hàng.</p>
                       <p><i class="ti-hand-point-right"></i> Xem thông tin <a href="https://www.facebook.com/baokhanh.diep.35">chi tiết</a> tại fanpage  <strong><a href="https://www.facebook.com/baokhanh.diep.35"><i class="ti-facebook"></i>Facebook</a></strong> .</p>
                    </div>
                </div>



                <div class="row mb">
                    <div class="boxtitle">VỀ CHÚNG TÔI</div>
                    <div class="row boxcontent textchu">
                        <p>GIỚI THIỆU CHUYENGIAYSNEAKER.COM</p>
                        &nbsp;&nbsp;&nbsp;&nbsp;Một danh nhân đã từng nói: “Một đôi giầy có thể thay đổi cuộc đời bạn”. Quả thật, một đôi giày tốt sẽ làm bạn thoải mái, một đôi giày đẹp sẽ khiến bạn tự tin hơn rất nhiều. <br><br>

                        &nbsp;&nbsp;&nbsp;&nbsp;1 Đôi giày thể thao và 1 đôi giày da bạn sẽ chọn cái nào, Nhiều bạn làm ở văn phong quy định ở công ty bắt buộc phải mang những đôi giày da rất là đau chân, điều này làm cho bạn luôn trong tình trạng khó chịu dẫn đến hiệu quả công việc không được cao. <br><br>

                        &nbsp;&nbsp;&nbsp;&nbsp;Đôi với bạn nữ, bạn đấy có thể 1 chọn đôi giày cao gót để lịch sự hơn và phong thái hơn 1 đôi giày thể thao để đi làm. <br><br>

                        &nbsp;&nbsp;&nbsp;&nbsp;Có người bảo chọn giày đúng site sẽ không bi đau chân, nhưng nếu chọn đúng đi vẫn đau chân là chuyện bình thường, có những đôi giày chỉ để đẹp nhưng nó rất là đau, bạn có thể chịu đựng để chọn cho mình cái đẹp, nhiều người chọn êm ái trên đôi chân của mình để vững chãi hơn trên con đường mình chọn,<br><br>
                    </div>
                </div>

<?php 
if(!isset($_SESSION['luotruycap'])) $_SESSION['luotruycap']=0;
else $_SESSION['luotruycap']+=1;
?>
                <div class="row mb">
                    <div class="boxtitle"> LƯỢT TRUY CẬP</div>
                    <div class="row boxcontent">
                        <p id="clock" style="text-align:center; color:blue;font-weight: bold; font-size: 20px;"></p>
                    <p class="soluottruycap"> 
                    <?php 
                        if(isset($_SESSION['luotruycap'])){
                            echo $_SESSION['luotruycap'];
                        }
                      
                        ?>
                    </p>
                       
                    </div>
                </div>



                <script>
        function updateTime() {
            // Đặt múi giờ cho Hochiminh (UTC+7)
            var currentTime = new Date();
            var timeZoneOffset = currentTime.getTimezoneOffset(); // Để trừ giá trị múi giờ hiện tại, nếu cần thiết
            var hochiminhTime = new Date(currentTime.getTime() + (timeZoneOffset + 420) * 60 * 1000); // UTC+7 là 420 phút (7 giờ)

            var hours = hochiminhTime.getHours().toString().padStart(2, '0');
            var minutes = hochiminhTime.getMinutes().toString().padStart(2, '0');
            var seconds = hochiminhTime.getSeconds().toString().padStart(2, '0');
            var day = hochiminhTime.getDate().toString().padStart(2, '0');
            var month = (hochiminhTime.getMonth() + 1).toString().padStart(2, '0');
            var year = hochiminhTime.getFullYear();

            var formattedTime = hours + ':' + minutes + ':' + seconds + ' ' + day + '/' + month + '/' + year;

            document.getElementById('clock').textContent = formattedTime;
        }

        // Cập nhật giờ mỗi giây
        setInterval(updateTime, 1000);

        // Cập nhật giờ lần đầu khi trang được tải
        updateTime();
    </script>