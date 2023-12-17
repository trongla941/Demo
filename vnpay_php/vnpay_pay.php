
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Tạo mới đơn hàng</title>
    <!-- Bootstrap core CSS -->
    <link href="/vnpay_php/style.css" rel="stylesheet"/>
</head>

<body>
    <?php require_once(__DIR__ . '/config.php'); ?>

    <div class="row mb">
        <div class="boxtitle">CỔNG THANH TOÁN VNPAY</div>
        <div class="formtaikhoan">
            <div class="container1 mt100">
                <h3 style="color:red;font-weight: bold; font-size:2.0vw">THÔNG TIN ĐƠN HÀNG THANH TOÁN VNPAY</h3>

                <div class="table-responsive">
                    <?php  
                    extract($bill);
                    $tong=$bill['toltal'];
                    $id=$bill['id'];
                    ?>
                    
                    
                    <form action="./vnpay_php/vnpay_create_payment.php" id="frmCreateOrder" method="post" target="_blank">        
                        <div class="form-group">
                            <label for="amount"><strong style="font-size:1.0vw">Số tiền</strong></label>
                            <input class="form-control" data-val="true" data-val-number="The field Amount must be a number." data-val-required="The Amount field is required." id="amount" max="100000000" min="1" name="amount" type="number" readonly value="<?=$tong?>" /> <br>
                            <label for="amount"><strong style="font-size:1.0vw">Mã đơn hàng NFVD - 00 - </strong></label>
                            <strong style="font-size:1.0vw"><input class="form-control1" data-val="true" data-val-number="The field vnp_TxnRef must be a number." data-val-required="The vnp_TxnRef field is required." id="vnp_TxnRef" max="100000000" min="1" name="vnp_TxnRef" type="number" readonly value="<?=$id?>" /></strong>
                           
                        </div>
                        </div>
                        <br>
                        <h4 style="color:blue;font-weight: bold; font-size:1.2vw">Chọn phương thức thanh toán</h4>
                        <div class="form-group">
                            <h5>Cách 1: Chuyển hướng sang Cổng VNPAY chọn phương thức thanh toán</h5>
                            <input type="radio" Checked="True" id="bankCode" name="bankCode" value="">
                            <label for="bankCode">Cổng thanh toán VNPAYQR</label><br>
                            
                            <h5>Cách 2: Tách phương thức tại site của đơn vị kết nối</h5>
                            <input type="radio" id="bankCode" name="bankCode" value="VNPAYQR">
                            <label for="bankCode">Thanh toán bằng ứng dụng hỗ trợ VNPAYQR</label><br>
                            
                            <input type="radio" id="bankCode" name="bankCode" value="VNBANK">
                            <label for="bankCode">Thanh toán qua thẻ ATM/Tài khoản nội địa</label><br>
                            
                            <input type="radio" id="bankCode" name="bankCode" value="INTCARD">
                            <label for="bankCode">Thanh toán qua thẻ quốc tế</label><br>
                            
                        </div>
                        <div class="form-group">
                            <h5>Chọn ngôn ngữ giao diện thanh toán:</h5>
                            <input type="radio" id="language" Checked="True" name="language" value="vn">
                            <label for="language">Tiếng việt</label><br>
                            <input type="radio" id="language" name="language" value="en">
                            <label for="language">Tiếng anh</label><br>
                            
                        </div>
                        <button type="submit" class="btn-btn-default" name="add_vnpay">Thanh toán</button>
                    </form>
                </div>
            </div>
        </div>  
    </body>
    <style>
        .container1{
            padding-left: 450px;
            font-size: 1.5vw;
            width:100%; 
            border-left: 1px #CCC solid;
            border-right: 1px #CCC solid;
            border-bottom: 1px #CCC solid;
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
            min-height: 400px;
            padding: 20px;

        }
        .form-control{
            width:100px;
            height: 50px;
            font-size: 1.2vw;
            text-align: center;
            border: none;
            color: blue;
            font-weight: bold;
        }
        .form-control1{
            border: none;
            font-weight: bold;
            font-size:1.0vw;
            font-weight: bold;
        }
        .form-group{
            font-size: 1.4vw;
        }
        .btn-btn-default{
            margin-top: 30px;
            width:120px;
            height: 40px;
            background-color: #ccc;
            color:black;
            text-align: center;
        }
    </style>

</html>