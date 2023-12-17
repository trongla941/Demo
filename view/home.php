<div class="row mb">
            <div class="boxtrai mr">
                <div class="row mb">
                    <!-- Slideshow container -->
<div class="slideshow-container">
    <!-- Full-width images with number and caption text -->
    <div class="mySlides fade">
      <div class="numbertext">1 / 3</div>
      <img src="view/img/slider/slder1.jpg" style="width:100%">
      <div class="text">Caption Text</div>
    </div>
  
    <div class="mySlides fade">
      <div class="numbertext">2 / 3</div>
      <img src="view/img/slider/02.png" style="width:100%">
      <div class="text">Caption Two</div>
    </div>
  
    <div class="mySlides fade">
      <div class="numbertext">3 / 3</div>
      <img src="view/img/slider/03.jpg" style="width:100%">
      <div class="text">Caption Three</div>
    </div>
  
    <!-- Next and previous buttons -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  </div>
  <br>
  
  <!-- The dots/circles -->
  <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
  </div>

                </div>
                <div class="row mb">
                    <div class="row">
                    <div class="padd">
                <p class="pp"><i class="ti-heart"></i> Sản Phẩm Bán Chạy <i class="ti-heart"></i></p>
            </div>
            <div class="pt"></div>
                        <?php
                        function formatPrice($price) {
                            return number_format($price, 0, ',', '.');
                        }
                        $i=0;
                        foreach ($spnew as $sp) {
                            extract($sp);
                            $formattedPrice = formatPrice($price);
                            $linksp="index.php?act=sanphamct&idsp=".$id;
                            $hinh=$img_path.$img;
                            if($i==2||$i==5||$i==8){
                                $mr="mr";
                            } else{
                                $mr="";
                            }
                            echo '<div class=" boxsp '.$mr.'">
                            <div class="row img">
                            <a href="'.$linksp.'"><img src="'.$hinh.'" alt=""></a>
                            </div>
                            <div class="row imgcontent">
                            <p class="gia"> <span>'.$formattedPrice.'₫</span></p>
                                <a href="'.$linksp.'">'.$name.'</a>
                                <div class="row btnaddtocart">
    <form action="index.php?act=addtocart" method="post">
      <input type="number" name="soluong" id="" min="1" max="10" value="1">
      <input type="number" name="size" id="" min="'.$size.'" max="42" value="'.$size.'">
        <input type="hidden" name="id" value="'.$id.'">
        <input type="hidden" name="name" value="'.$name.'">
        <input type="hidden" name="img" value="'.$img.'">
        <input type="hidden" name="price" value="'.$price.'">
        <input type="submit" value="Thêm vào giỏ hàng" name="addtocart">
        </form>
</div>
                            </div>
                        </div>';
                        }

                        ?>
                    </div>
                </div>
                <div class="pt1200"></div>
                <div class="pt1200"></div>
                <div class="pt30"></div>
                <div class="padd">
                <p class="pp"><i class="ti-heart"></i> Đánh Giá Khách Hàng <i class="ti-heart"></i></p>
            </div>
            <div class="pt"></div>

<!-- ........DANH GIA KHACH HANG....... -->
                 <div class="rowdanhgia mr">
                    <img src="view/img/kh1.jpg" alt="">
                    <div class="ngoisao"><i class="ti-star"></i><i class="ti-star"></i><i class="ti-star"></i><i class="ti-star"></i><i class="ti-star"></i></div>
                    <p class="noidung2">Mình tìm các shop giày sneaker trên mạng vô tình thấy được shop đăng hình các mẫu rất thực tế & giá cũng hợp lý nên mua thử. Ai dè rất là thích chất lượng & cách tư vấn nhiệt tình của shop lun ạ.</p>
                    <p class="tenkhachhang">Bảo Khánh / Quận 5 - TP. HCM</p>
                </div>
                <div class="rowdanhgia mr">
                    <img src="view/img/kh2.jpg" alt="">
                    <div class="ngoisao"><i class="ti-star"></i><i class="ti-star"></i><i class="ti-star"></i><i class="ti-star"></i><i class="ti-star"></i></div>
                    <p class="noidung2">Đây là lần đầu em mua giày trên mạng không ngờ là chất lượng lại đẹp như vậy. Trong tương lai sẽ sắm thêm vài đôi nữa đi cho phong phú.</p>
                    <p class="tenkhachhang">Gia Trọng / Sinh viên</p>
                </div>
                <div class="rowdanhgia">
                    <img src="view/img/kh3.jpg" alt="">
                    <div class="ngoisao"><i class="ti-star"></i><i class="ti-star"></i><i class="ti-star"></i><i class="ti-star"></i><i class="ti-star"></i></div>
                    <p class="noidung2">Các mẫu Balenciaga của shop quá chất lun shop. Nhìn không phân biệt được hàng real hay Rep luôn ak. Rất hài lòng khi tìm được 1 shop uy tín để có thể mua hàng online như vậy. Thanks !!!</p>
                    <p class="tenkhachhang">Thầy Nghĩa / STU</p>
                </div>

           <!-- ........ END DANH GIA KHACH HANG....... -->
              <!-- ........ VE CHUNG TOI....... -->

              <div class="boxtrai1 mr">
                    <p>Về Chúng Tôi</p>
                    <div class="boxtieude1">chuyengiaysneaker.com™</div>
                    <p class="noidungbox1">Uy tín lâu năm chuyên cung cấp giày thể thao sneaker nam, nữ hàng Replica 1:1 – Like Auth với chất lượng đảm bảo và giá tốt nhất. Shop có sẵn hàng tại TP HCM</p><br>
                    <p class="noidungbox1">Bạn đang cần tìm một đôi giày thể thao sneaker đẹp và hợp thời trang và đang hot Trends đến từ các thương hiệu lớn nhưng lại không đủ hầu bao để sắm được hàng chính hãng? Hãy đến với shopgiayreplica.com – nơi bạn thỏa lòng mong ước
                        mà chỉ phải chi ra 1 phần nhỏ so với dòng chính hãng ngoài store mà vẫn sắm cho mình được một đôi chất lượng từ rep 1:1 đến siêu cấp like auth.</div>
                <div class="boxphai1">
                    <img src="view/img/slider/01.png" alt="">
                </div>
                <div class="row700"></div>
                <!-- <div class="padd"></div> -->
                <div class="pt30"></div>
                <div class="rownho1">
                    <img src="view/img/srv_1.png" alt="">
                </div>
                <div class="rowphainho1 mr mr">
                    <div class="rowtitle">Giao hàng cực nhanh</div>
                    <p>Miễn phí giao hàng trên toàn quốc.</p>
                </div>
                <div class="rownho1">
                    <img src="view/img/srv_2.png" alt="">
                </div>
                <div class="rowphainho1 mr mr">
                    <div class="rowtitle">Giao hàng cực nhanh</div>
                    <p>Miễn phí giao hàng trên toàn quốc.</p>
                </div>
                <div class="rownho1">
                    <img src="view/img/srv_3.png" alt="">
                </div>
                <div class="rowphainho1">
                    <div class="rowtitle">Giao hàng cực nhanh</div>
                    <p>Miễn phí giao hàng trên toàn quốc.</p>
                </div>

<!-- ........END VE CHUNG TOI....... -->
<div class="pt30"></div>
           <div class="pt1300"></div>
           <div class="padd">
                <p class="pp"><i class="ti-heart"></i> Kiến thức & Mẹo Vặt <i class="ti-heart"></i></p>
                <div class="pt30"></div>
                <p class="headerpp">Phối đồ với giày Converse Run Star Hike cá tính phong cách thời trang</p>
                <div class="tintucpp"><p class="chupp">&nbsp;&nbsp;&nbsp;&nbsp;Converse Run Star Hike là cái tên đã gây chấn động cộng đồng sneakerheads trên toàn thế giới và cả Việt Nam cũng không ngoại lệ. Đôi giày Converse mới này nổi bật với phần kiểu dáng vô cùng độc đáo, đế giày đặc biệt giúp hack chiều cao đáng kể cũng là một trong những điểm thu hút sự chú ý. Vậy thì với một đôi giày có thiết kế độc đáo như vậy thì chúng ta nên chọn cách phối đồ với Converse Run Star Hike như thế nào để thật nổi bật và thu hút nhỉ? Hãy cùng Chuyengiaysneaker.com tìm hiểu xem mọi người phối đồ với Converse Run Star Hike như thế nào nhé!</p></div>
                <div class="tintucpp2">
                    <img src="view/img/slider/chupp.jpeg">
                </div>
                <div class="tintucpp"><p class="chupp">&nbsp;&nbsp;&nbsp;&nbsp;Phiên bản Converse Run Star Hike rep 1 1 được trình làng với hai màu cơ bản là đen và trắng. Là 2 gam màu rất dễ sử dụng và dễ bán nhất. Được lấy cảm hứng từ những đôi giày thể thao nên Converse Run Star Hike được thiết kế rất chắc chắn và ôm chân.

Mẫu giày này vẫn sử dụng bộ đế răng cưa nhô cao giúp bạn có thể “ăn gian” chiều cao một cách đáng kể đấy nhé. Đây là một điểm cộng to lớn cho thiết kế lần này. Giày Run Star Hike được thiết kế đặc biệt khác hẳn những người anh em đã ra mắt trước nó với phần cổ và dây giày thấp, sẽ tạo cho bạn một cảm giác thoải mái và bạn có thể tự do vận động ở vùng mắt cá chân.</p></div>
            </div>
            </div>
            <div class="boxphai">
               <?php include "boxphai.php"; ?>
                </div>
            </div>