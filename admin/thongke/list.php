<div class="row90 ">
<header class="w3-container w3-blue">
                <h1>DASHBOARD</h1>
            </header>
            <?php  
$formattedNumber = number_format($loadall_thongke_sales);
 // Kết quả: 72,286,690
            ?>
<style>
.mt{
  margin-top: 20px;
}
</style>
<div class="mt "></div>
<body>
<div class="w3-row mb w3-mobile">
<div class="rowtrai w3-card-4 ml w3-mobile mb" style="height: 100px;">
            <img src="../view/img/dola.png" style="height:100px; width:100px; padding-left: 10px; float:left; border-radius: 50%;">
            <p style="font-weight: bold; font-size: 1.0vw; padding-left: 10px;">Toltal Sales</p>
            <p style="font-weight: bold; font-size: 1.0vw;"><?php echo $formattedNumber;?></p>
            </div>

            <div class="rowtrai w3-card-4 ml w3-mobile mb" style="height: 100px;">
            <img src="../view/img/donhang.png" style="height:100px; width:100px; padding-left: 10px; float:left; border-radius: 50%;">
            <p style="font-weight: bold; font-size: 1.0vw;padding-left: 10px; ">New orders</p>
            <p style="font-weight: bold; font-size: 1.0vw;"><?=$loadall_thongke_orders?></p>
            </div>

            <div class="rowtrai w3-card-4 ml w3-mobile mb" style="height: 100px;">
            <img src="../view/img/pd2.png" style="height:100px; width:100px; padding-left: 10px; float:left; border-radius: 50%;">
            <p style="font-weight: bold; font-size: 1.0vw; padding-left: 10px;">Toltal products</p>
            <p style="font-weight: bold; font-size: 1.0vw;"><?=$loadall_thongke_product?></p>
            </div>

        </div>

        <div class="w3-row mb w3-mobile">
            <div class="rowtrai1 w3-card-4 ml w3-mobile mb" style="min-height: 400px;">
            <div class="row mb10 formdsloai">
              <table style="width:100%; margin:0 auto;" class="w3-mobile">
                <tr>
                    <th>MÃ DANH MỤC</th>
                    <th>NAME</th>
                    <th>SỐ LƯỢNG</th>
                    <th>GIÁ THẤP NHẤT</th>
                    <th>GIÁ CAO NHẤT</th>
                    <th>TRUNG BÌNH</th>
                    
                </tr>
                <?php 
                foreach ($listthongke as $list) {
                    extract($list);
                    echo'<tr>
                    <td>'.$madm.'</td>
                    <td>'.$tendm.'</td>
                    <td>'.$countsp.'</td>
                    <td>'.$minprice.'</td>
                    <td>'.$maxprice.'</td>
                    <td>'.$avgsanpham.'</td>
                </tr>';
                }
             
                ?>
               

              </table>
               </div>
            </div>


          
            <div class="rowtrai1 w3-card-4 ml w3-mobile mb" style="height: 400px;">
            
            <head>
    <title>Biểu đồ tròn</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div style="width: 350px; margin: auto;">
        <canvas id="pieChart" width="100" height="100"></canvas>
    </div>

    <?php
    // Gọi hàm để lấy dữ liệu thống kê từ CSDL
    $listthongke = loadall_thongke();

    // Tạo mảng dữ liệu cho biểu đồ tròn
    $data = [];
    $labels = [];
    foreach ($listthongke as $thongke) {
        $labels[] = $thongke['tendm'];
        $data[] = $thongke['countsp'];
    }
    ?>

    <script>
    // Chuyển đổi dữ liệu PHP thành mảng JavaScript
    var chartLabels = <?php echo json_encode($labels); ?>;
    var chartData = <?php echo json_encode($data); ?>;

    // Sử dụng Chart.js để vẽ biểu đồ tròn
    var ctx = document.getElementById('pieChart').getContext('2d');
    var pieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: chartLabels, // Tên các mục trong biểu đồ
            datasets: [{
                data: chartData, // Dữ liệu biểu đồ
                backgroundColor: [
                    'red', 'green', 'blue', 'orange', 'brown'
                    // Bạn có thể thay đổi các màu sắc ở đây tùy ý
                ],
                borderColor: 'white', // Màu viền cho các phần tử trong biểu đồ
                borderWidth: 1
            }]
        },
        options: {
            responsive: true, // Đảm bảo biểu đồ thích nghi với kích thước của khung chứa
            legend: {
                display: true, // Hiển thị chú thích
                position: 'bottom' // Vị trí chú thích (top, bottom, left, right)
            },
            title: {
                display: true,
                text: 'Biểu đồ thống kê số lượng sản phẩm theo danh mục' // Tiêu đề biểu đồ
            }
        }
    });
    </script>
</body>
   </div>

</body>



<style>
    .onthird {
            width: 200px;
        }
        
        .rowtrai {
            float: left;
            width: 30%;
        }
        
        .rowtrai1 {
            float: left;
            width: 46%;
        }
        
        .ml {
            margin-left: 2%;
            ;
        }
        
        .mr {
            margin-right: 2%;
        }
        
        .demo {
            background-color: yellow;
            min-height: 200px;
        }
        
        .mb {
            margin-bottom: 20px;
        }
</style>