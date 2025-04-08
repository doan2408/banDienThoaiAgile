<?php
require_once 'layout/header.php';
require_once 'layout/navbar.php';
?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <?php require_once 'layout/topbar.php' ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-2 text-gray-800">Thống kê sản phẩm và doanh thu</h1>
            </div>

            <!-- Content Row -->
            <div class="row">

                <!-- Biểu đồ doanh thu tổng -->
                <div class="col-lg-6 mb-4">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Biểu đồ doanh thu tổng theo danh mục</h6>
                        </div>
                        <div class="card-body">
                            <div id="chart_total" style="height: 400px;"></div>
                        </div>
                    </div>
                </div>

                <!-- Biểu đồ chi tiết doanh thu -->
                <div class="col-lg-6 mb-4">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Biểu đồ chi tiết doanh thu</h6>
                        </div>
                        <div class="card-body">
                            <div id="chart_detail" style="height: 400px;"></div>
                        </div>
                    </div>
                </div>

                <!-- Biểu đồ số lượng sản phẩm -->
                <div class="col-lg-12 mb-4">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Biểu đồ số lượng sản phẩm</h6>
                        </div>
                        <div class="card-body">
                            <div id="piechart" style="height: 500px;"></div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <?php
    require_once 'layout/scripts.php';
    require_once 'layout/footer.php';
    ?>

    <!-- Chart Section -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        // Load Google Charts
        google.charts.load('current', {'packages': ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawCharts);

        function drawCharts() {
            // Data for Total Revenue Bar Chart
            var dataTotal = google.visualization.arrayToDataTable([
                ['Danh mục', 'Doanh thu tổng (VND)'],
                <?php
                foreach ($thongkedt as $key => $value) {
                    echo "['{$value['name_cat']}', {$value['total_revenue']}],";
                }
                ?>
            ]);

            // Options for Total Revenue Bar Chart
            var optionsTotal = {
                title: 'Biểu đồ doanh thu tổng theo danh mục',
                chartArea: {width: '70%'},
                hAxis: {
                    title: 'Doanh thu (VND)',
                    minValue: 0,
                },
                vAxis: {
                    title: 'Danh mục',
                },
                colors: ['#4CAF50'],
            };

            // Render Total Revenue Bar Chart
            var chartTotal = new google.visualization.ColumnChart(document.getElementById('chart_total'));
            chartTotal.draw(dataTotal, optionsTotal);

            // Data for Detailed Revenue Line Chart
            var dataDetail = google.visualization.arrayToDataTable([
                ['Danh mục', 'Doanh thu ngày', 'Doanh thu tuần', 'Doanh thu tháng', 'Doanh thu năm'],
                <?php
                foreach ($thongkedt as $key => $value) {
                    $daily_revenue = $value['total_revenue'] / 365;
                    $weekly_revenue = $daily_revenue * 7;
                    $monthly_revenue = $daily_revenue * 30;
                    $yearly_revenue = $value['total_revenue'];
                    echo "['{$value['name_cat']}', {$daily_revenue}, {$weekly_revenue}, {$monthly_revenue}, {$yearly_revenue}],";
                }
                ?>
            ]);

            // Options for Detailed Revenue Line Chart
            var optionsDetail = {
                title: 'Biểu đồ chi tiết doanh thu',
                curveType: 'function',
                legend: {position: 'bottom'},
                colors: ['#FF5733', '#33C3FF', '#FFC300', '#4CAF50'],
            };

            // Render Detailed Revenue Line Chart
            var chartDetail = new google.visualization.LineChart(document.getElementById('chart_detail'));
            chartDetail.draw(dataDetail, optionsDetail);

            // Data for Quantity Chart
            var dataQuantity = google.visualization.arrayToDataTable([
                ['Danh mục', 'Số lượng sản phẩm', 'Số lượng đã bán'],
                <?php
                foreach ($thongkesl as $key => $value) {
                    echo "['{$value['name_cat']}', {$value['total_quantity']}, {$value['sold_quantity']}]";
                    if ($key < count($thongkesl) - 1) echo ",";
                }
                ?>
            ]);

            // Options for Quantity Bar Chart
            var optionsQuantity = {
                title: 'Số lượng sản phẩm theo danh mục',
                chartArea: {width: '40%'},
                height: 500,
                hAxis: {
                    title: 'Số lượng sản phẩm',
                    minValue: 0,
                    textStyle: {color: '#3e3e3e', fontSize: 14}
                },
                vAxis: {
                    title: 'Danh mục',
                    textStyle: {color: '#3e3e3e', fontSize: 14},
                    slantedText: true,
                    slantedTextAngle: 0
                },
                colors: ['#4CAF50', '#FF9800'],
                backgroundColor: '#f4f4f4',
                is3D: true,
                animation: {
                    startup: true,
                    duration: 1000,
                    easing: 'out'
                },
                bar: {groupWidth: '75%'},
                legend: {position: 'top', alignment: 'end'}
            };

            // Render Quantity Chart
            var chartQuantity = new google.visualization.ColumnChart(document.getElementById('piechart'));
            chartQuantity.draw(dataQuantity, optionsQuantity);
        }
        
    </script>

</div>
