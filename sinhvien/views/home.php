<div class="header-box">
    <div class="tieude h1">TỔNG QUAN</div>
</div>
<div class="box-slide mt-4">
    <p class="h4 mb-3">Bài tập được giao</p>
    <!-- Swiper -->
    <div class="slide swiper-container">
        <div class="swiper-wrapper">
            <!-- Start box -->
            <?php
            foreach ($ttsv as $sv) {
                $ttgv = thongtingv($sv['idlop']);
                if (strtotime(date("Y-m-d")) <= strtotime($sv['ngayhethan'])) {
                    $nhh = date("d-m-Y", strtotime($sv['ngayhethan']));
                    // var_dump($ttgv);
            ?>
                    <div class="card mb-3 swiper-slide thongbao-shadow">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="<?= showfile($sv['hinhbt']) ?>" onerror="erroimg(this)" class="card-img" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-0">
                                    <div class="info">
                                        <div class="aut">
                                            <img src="<?= showfile($ttgv['hinh']) ?>" alt="">
                                            <a href="#"><?= $ttgv['hoten'] ?></a>
                                        </div>
                                        <div class="mon mr-2 text-secondary"><?= $sv['tenkhoa'] ?></div>
                                    </div>
                                    <h5 class="card-title mb-1 mt-1"><a href="index.php?act=nopbaitap&idbt=<?= $sv['idbaitap'] ?>"><?= $sv['tenbaitap'] ?></a></h5>
                                    <p class="text-secondary dealine m-0">Hạn chót: <?= $nhh ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

            <?php }
            } ?>
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

    <div class="border thongbao-box mt-4 thongbao-box1 p-4 thongbao-shadow">
        <p class="title h2 mb-3 mb-5">Thông báo</p>
        <div class="thongbao">

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

    <div class="border thongbao-box mt-4 p-4 thongbao-shadow">
        <p class="title h2 mb-3 mb-5">Thông báo</p>
        <div class="thongbao">
            <div class="item mb-3">
                <a href="#" class="h5">Về việc hoàn thành học phí kì Fall 2020</a>
                <div class="info mt-2 text-secondary">
                    <div class="mr-3">
                        <i class="uim uim-user-nurse "></i>
                        <span class="ml-1">Hoàng Khải</span>
                    </div>
                    <div>
                        <i class="uim uim-clock"></i>
                        <span class="ml-1">06/11/2020</span>
                    </div>
                </div>
            </div>

            <div class="item mb-3">
                <a href="#" class="h5">Về việc hoàn thành học phí kì Fall 2020</a>
                <div class="info mt-2 text-secondary">
                    <div class="mr-3">
                        <i class="uim uim-user-nurse "></i>
                        <span class="ml-1">Hoàng Khải</span>
                    </div>
                    <div>
                        <i class="uim uim-clock"></i>
                        <span class="ml-1">06/11/2020</span>
                    </div>
                </div>
            </div>

            <div class="item mb-3">
                <a href="#" class="h5">Về việc hoàn thành học phí kì Fall 2020</a>
                <div class="info mt-2 text-secondary">
                    <div class="mr-3">
                        <i class="uim uim-user-nurse "></i>
                        <span class="ml-1">Hoàng Khải</span>
                    </div>
                    <div>
                        <i class="uim uim-clock"></i>
                        <span class="ml-1">06/11/2020</span>
                    </div>
                </div>
            </div>

            <div class="item mb-3">
                <a href="#" class="h5">Về việc hoàn thành học phí kì Fall 2020</a>
                <div class="info mt-2 text-secondary">
                    <div class="mr-3">
                        <i class="uim uim-user-nurse "></i>
                        <span class="ml-1">Hoàng Khải</span>
                    </div>
                    <div>
                        <i class="uim uim-clock"></i>
                        <span class="ml-1">06/11/2020</span>
                    </div>
                </div>
            </div>
        </div>
    </div>