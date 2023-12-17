let slideIndex = 0;
showSlides();

function showSlides() {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) { slideIndex = 1 }
    slides[slideIndex - 1].style.display = "block";
    setTimeout(showSlides, 2000); // Change image every 2 seconds
}


function validatePaymentMethod() {
    var paymentMethods = document.getElementsByName("pttt");
    var isChecked = false;

    for (var i = 0; i < paymentMethods.length; i++) {
        if (paymentMethods[i].checked) {
            isChecked = true;
            break;
        }
    }

    if (!isChecked) {
        alert("Vui lòng chọn phương thức thanh toán.");
    }


}

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