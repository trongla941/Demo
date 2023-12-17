<div class="row footer">
<div class="footertrai">
<img src="view/img/footer.jpeg">
</div>
<div class="ml ml footerfootergiua">
<STRONG><i class="ti-blackboard"></i> GIỚI THIỆU</STRONG>
                <li><a href="index.php?act=gioithieu">Về chúng tôi</a></li>
                <li><a href="">Hướng dẫn mua hàng</a></li>
                <li><a href="">Chính sách giao hàng</a></li>
</div>
<div class="footerfooterphai">
<STRONG><i class="ti-cup"></i> THƯƠNG HIỆU</STRONG><?php
                            foreach ($dsdm as $dm) {
                               extract($dm);
                               $linkdm ="index.php?act=sanpham&iddm=".$id;

                               echo '<li><a href="'.$linkdm.'">'.$name.'</a></li>';
                            }

                            ?></li>
</div>
<div class="footertrai">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.5321960913075!2d106.64453807481904!3d10.847067157887254!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529973c2d408b%3A0xda31da83233b2dc6!2zMTU4IFBo4bqhbSBWxINuIENoacOqdSwgUGjGsOG7nW5nIDksIEfDsiBW4bqlcCwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1690897918849!5m2!1svi!2s" width="300" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
        </div>
    </div>
    <div class="row footer2"> @doanchuyennganh copyright</div>
    <script src="index.js"></script>
</body>

</html>
