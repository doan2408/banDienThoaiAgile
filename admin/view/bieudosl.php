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
                <h1 class="h3 mb-2 text-gray-800">THỐNG KÊ SỐ LƯỢNG SẢN PHẨM</h1>
            </div>

            <!-- Content Row -->
            <div class="row">
                <!-- Product Statistics Table -->
                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">BIỂU ĐỒ</h1>
                    <div id="piechart"></div>
                </div>

                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

                <script type="text/javascript">
                    // Load google charts
                    google.charts.load('current', {'packages':['corechart', 'bar']});
                    google.charts.setOnLoadCallback(drawChart);

                    // Draw the chart and set the chart values
                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                            ['Danh mục', 'Số lượng sản phẩm', 'Số lượng đã bán'],
                            <?php
                                foreach ($thongkesk as $key => $value) {
                                    echo "['{$value['name_cat']}', {$value['total_quantity']}, {$value['sold_quantity']}]";
                                    if ($key < count($thongkesk) - 1) echo ",";
                                }
                            ?>
                        ]);

                        // Set chart options
                        var options = {
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
                            colors: ['#4CAF50', '#FF9800'], // Change color for in-stock and sold quantities
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

                        // Draw the chart
                        var chart = new google.visualization.ColumnChart(document.getElementById('piechart'));
                        chart.draw(data, options);
                    }
                </script>

            </div>
             
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <?php
    require_once 'layout/scripts.php';
    require_once 'layout/footer.php';
    ?>
