<?php

include_once('include/header.php');
include_once('include/navbar.php');
if (!isset($_SESSION['userid'])) {
  header("Location: login.php");
};
?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Quản lý bán hàng điện thoại di động</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Doanh thu tháng này</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php
                $query = "select sum(DonGia)as TongTien from CTHD,HoaDon where month(NgayLap)=month(CURRENT_TIMESTAMP)and HoaDon.MaHD=CTHD.MaHD and year(NgayLap)=year(CURRENT_TIMESTAMP)";
                $result = mysqli_query($connect, $query);
                $row = mysqli_fetch_assoc($result);
                echo $english_format_number = number_format($row['TongTien']);

                ?>
                VND</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Tổng Doanh Thu</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php
                $query = "select sum(DonGia)as TongTien from CTHD";
                $result = mysqli_query($connect, $query);
                $row = mysqli_fetch_assoc($result);
                echo $english_format_number = number_format($row['TongTien']);
                ?>VND </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tỉ lệ Hóa Đơn đã thanh toán</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <?php
                  $sql_ThanhToan = "select count(*) as SL from HoaDon where TinhTrang='Thanh toan'";
                  $sql_tongHD = "select count(*) as SL from HoaDon ";
                  $result = mysqli_query($connect, $sql_ThanhToan);
                  $ma = mysqli_fetch_array($result);
                  $TongTT = $ma['SL'];
                  $result = mysqli_query($connect, $sql_tongHD);
                  $ma = mysqli_fetch_array($result);
                  $TongHD = $ma['SL'];
                  $PhanTram = round(($TongTT / $TongHD) * 100, 2);
                  echo '<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">' . $PhanTram . '%</div>
                </div>
                <div class="col">
                  <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-info" role="progressbar" style="width: ' . $PhanTram . '%" aria-valuenow="' . $PhanTram . '" aria-valuemin="0" aria-valuemax="100"></div>';
                  ?>
                </div>
              </div>
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-file-invoice fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Pending Requests Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Số lượng sản phẩm trong kho</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
              <?php
              $query = "select sum(SoLuongTon)as TongTonKho from TonKho";
              $result = mysqli_query($connect, $query);
              $row = mysqli_fetch_assoc($result);
              echo $english_format_number = number_format($row['TongTonKho']);

              ?> Sản Phẩm</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-warehouse fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Content Row -->

<div class="row">

  <!-- Area Chart -->
  <div class="col-xl-8 col-lg-7">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Bảng thống kê theo tháng <input type="number" min="1" max="12" step="1" value="<?php echo date("m"); ?>"> </h6>
        <div class="dropdown no-arrow">
          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
            <div class="dropdown-header">Dropdown Header:</div>
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </div>
      </div>
      <!-- Card Body -->
      <div class="card-body">
        <div class="chart-area">
          <canvas id="myAreaChart"></canvas>
        </div>
      </div>
    </div>
  </div>
  <script src="vendor/chart.js/Chart.min.js"></script>
<script>

  // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec",],
    datasets: [{
      label: "Tổng tiền",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: [0, 10000, 5000, 15000, 10000, 20000, 15000, 25000, 20000, 30000, 25000, 40000],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return number_format(value) +' VNĐ ' ;
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': ' + number_format(tooltipItem.yLabel)+' VNĐ ';
        }
      }
    }
  }
});

</script>





  
  <!-- Pie Chart -->
  <div class="col-xl-4 col-lg-5">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Số lượng bán ra theo từng Hãng</h6>
        <div class="dropdown no-arrow">
          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
            <div class="dropdown-header">Thêm:</div>
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </div>
      </div>
      <!-- Card Body -->
      <div class="card-body">
        <div class="chart-pie pt-4 pb-2">
          <canvas id="myPieChart"></canvas>
        </div>
        <div class="mt-4 text-center small">
          <span class="mr-2">
            <i class="fas fa-circle text-primary"></i> Apple
          </span>
          <span class="mr-2">
            <i class="fas fa-circle text-success"></i> Huawei
          </span>
          <span class="mr-2">
            <i class="fas fa-circle text-info"></i> Oppo
          </span>
          <span class="mr-2">
            <i class="fas fa-circle text-oppo"></i> SamSung
          </span>
          <span class="mr-2">
            <i class="fas fa-circle text-xiaomi"></i> XiaoMi
          </span>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
$query = mysqli_query($connect, "SELECT TenNSX,sum(SoLuong)as sum 
    from cthd,DienThoai,nhasanxuat
    where cthd.MaDT=dienthoai.MaDT
    and dienthoai.MaNSX=nhasanxuat.MaNSX
    group by TenNSX
    order by TenNSX asc");

?>
<script src="vendor/chart.js/Chart.min.js"></script>
<script src="vendor/datatables/jquery.dataTables.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.js"></script>
<script>
  // Set new default font family and font color to mimic Bootstrap's default styling
  Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#858796';

  // Pie Chart Example
  var ctx = document.getElementById("myPieChart");
  var myPieChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: [
        <?php if ($query)
          while ($row = mysqli_fetch_array($query)) {
            echo '"' . $row['TenNSX'] . '",';
          }
        ?>
      ],
      datasets: [{
        data: [<?php

                $query_sum = mysqli_query($connect, "SELECT TenNSX,sum(SoLuong)as sum 
           from cthd,DienThoai,nhasanxuat
           where cthd.MaDT=dienthoai.MaDT
           and dienthoai.MaNSX=nhasanxuat.MaNSX
           group by TenNSX
           order by TenNSX asc");


                if ($query_sum)
                  while ($row = mysqli_fetch_array($query_sum)) {
                    echo $row['sum'] . ',';
                  } ?>],
        backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#ff1f1f', 'rgb(52, 252, 60)'],
        hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
        hoverBorderColor: "rgba(234, 236, 244, 1)",
      }],
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
      },
      legend: {
        display: false
      },
      cutoutPercentage: 80,
    },
  });
</script>



<?php
include('AllPhone.php');
include_once('include/script.php');
include_once('include/footer.php');
?>