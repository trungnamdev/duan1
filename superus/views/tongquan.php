<div class="header-box">
    <div class="tieude h1">TỔNG QUAN</div>
</div>
<div class="box-slide suser mt-4">
    <!-- Swiper -->
    <div class="slide swiper-container">
        <div class="swiper-wrapper">
            <!-- Start box -->

            <div id="card2" class="card pl-4 pr-4 swiper-slide thongbao-shadow" style="background-color: #dcf1ff">
                <div class="row no-gutters">
                    <div class="col-10">
                        <p class="h4">Sinh viên</p>
                        <span class="h1" style="color: #012e4c"><?= demnguoi(0)['tong'] ?></span>
                    </div>
                    <div class="col-2">
                        <i style="color: #012e4c" class="fa fa-users" aria-hidden="true"></i>
                    </div>
                </div>
            </div>

            <div id="card2" class="card pl-4 pr-4 swiper-slide thongbao-shadow" style="background-color: #d7d4ff">
                <div class="row no-gutters">
                    <div class="col-10">
                        <p class="h4">Giảng viên</p>
                        <span class="h1"><?= demnguoi(1)['tong'] ?></span>
                    </div>
                    <div class="col-2">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                </div>
            </div>

            <div id="card2" class="card pl-4 pr-4 swiper-slide thongbao-shadow" style="background-color: #ffe2e2">
                <div class="row no-gutters">
                    <div class="col-10">
                        <p class="h4">Khóa học</p>
                        <span class="h1"><?= demsoluong('khoahoc')['tong'] ?></span>
                    </div>
                    <div class="col-2">
                        <i class="fa fa-book" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div id="card2" class="card pl-4 pr-4 swiper-slide thongbao-shadow" style="background-color: #fffdbe">
                <div class="row no-gutters">
                    <div class="col-10">
                        <p class="h4">Chủ đề</p>
                        <span class="h1"><?= demsoluong('chude')['tong'] ?></span>
                    </div>
                    <div class="col-2">
                        <i class="fa fa-bookmark" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Initialize Swiper -->
    <script>
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 2.75,
        spaceBetween: 20,
        freeMode: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });
    </script>

    <div class=" thongbao-box thongke-box mt-5">
        <p class="h4 mb-3">Thống kê</p>
        <div class="thongbao border pt-5 pb-5 rounded">
            <canvas id="myChart"></canvas>
            <p class="text-muted text-center mt-3">Tỉ lệ sinh viên / giảng viên của trường</p>
        </div>
    </div>
    <div class=" thongbao-box mt-5">
        <p class="h4 mb-3">Thông báo</p>
        <div class="thongbao border thongbao-shadow rounded p-4">
           
        <?php
            foreach ($tb as $thongbao) {
                $nd = date("d-m-Y", strtotime($thongbao['ngaydang']));
            ?>
                <div class="item mb-3">
                    <a href="index.php?act=thongbao&idtb=<?= $thongbao['idtb'] ?>" class="h5"><?= $thongbao['tdtb'] ?></a>
                    <div class="info mt-2 text-secondary">
                        <div class="mr-3">
                            <i class="uim uim-user-nurse "></i>
                            <span class="ml-1"><?= $thongbao['hoten'] ?></span>
                        </div>
                        <div>
                            <i class="uim uim-clock"></i>
                            <span class="ml-1"><?= $nd ?></span>
                        </div>
                    </div>
                </div>
            <?php }
            ?>
        </div>
    </div>
    <!-- chart-js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script>
    var sv = <?php echo demnguoi(0)['tong'] ?>;
    var gv = <?php echo demnguoi(1)['tong'] ?>;
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'pie',

        // The data for our dataset
        data: {
            labels: ['Sinh viên', 'Giảng viên'],
            datasets: [{
                label: 'My First dataset',
                backgroundColor: ['rgb(255, 99, 132)','rgb(44, 99, 132)'],
                borderColor: ['rgb(255, 99, 132)','rgb(44, 99, 132)'],
                data: [sv, gv]
            }]
        },

        // Configuration options go here
        options: {
            color: [
                'red', // color for data at index 0
                'blue', // color for data at index 1
                'green', // color for data at index 2
                'black', // color for data at index 3
                //...
            ]
        }
    });
    </script>
    <!-- Load the AJAX API
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    // Load the Visualization API and the corechart package.
    google.charts.load('current', {
        'packages': ['corechart']
    });

    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawChart);

    // Callback that creates and populates a data table,
    // instantiates the pie chart, passes in the data and
    // draws it.
    function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        var sv = <?php echo $so ?>;
        var gv = <?php echo demnguoi(1)['tong'] ?>;
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
            // ['Giảng viên', gv],
            // ['Sinh viên', sv],
            ['Sinh viên', sv],
            ['Giảng viên', gv],
        ]);

        // Set chart options
        var options = {
            'title': 'Tỉ lệ học sinh/giảng viên của trường',
            'width': 600,
            'height': 400
        };

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
    </script> -->


    </html>