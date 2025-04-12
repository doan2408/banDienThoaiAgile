<?php
require_once 'layout/header.php';
require_once 'layout/navbar.php';
?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <?php require_once 'layout/topbar.php'?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
            </div>

            <!-- Content Row -->
            <div class="row">
                <!-- code ở đây -->
                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">BIỂU ĐỒ</h1>

                    <div id="chart-section" class="container-fluid">
                        <div id="piechart"></div>
                        <div id="chart_total"></div>
                        <div id="chart_detail"></div>
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
                        foreach ($thongkesk as $key => $value) {
                            echo "['{$value['name_cat']}', {$value['total_revenue']}],";
                        }
                        ?>
                    ]);

                    // Options for Total Revenue Bar Chart
                    var optionsTotal = {
                        title: 'Biểu đồ doanh thu tổng theo danh mục',
                        chartArea: {width: '50%'},
                        hAxis: {
                            title: 'Doanh thu (VND)',
                            minValue: 0
                        },
                        vAxis: {
                            title: 'Danh mục'
                        },
                        colors: ['#4CAF50']
                    };

                    // Render Total Revenue Bar Chart
                    var chartTotal = new google.visualization.ColumnChart(document.getElementById('chart_total'));
                    chartTotal.draw(dataTotal, optionsTotal);

                    // Data for Detailed Revenue Line Chart
                    var dataDetail = google.visualization.arrayToDataTable([
                        ['Danh mục', 'Doanh thu ngày', 'Doanh thu tuần', 'Doanh thu tháng', 'Doanh thu năm'],
                        <?php
                        foreach ($thongkesk as $key => $value) {
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
                        colors: ['#FF5733', '#33C3FF', '#FFC300', '#4CAF50']
                    };

                    // Render Detailed Revenue Line Chart
                    var chartDetail = new google.visualization.LineChart(document.getElementById('chart_detail'));
                    chartDetail.draw(dataDetail, optionsDetail);
                }
            </script>
        </div>
    </div>
</div>
