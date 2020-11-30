<div class="header-box">
    <div class="tieude h1">TỔNG QUAN</div>
</div>
<div class="box-slide mt-4">
    <p class="h4 mb-3">Bài tập đã giao</p>
    <!-- Swiper -->
    <div class="slide swiper-container">
        <div class="swiper-wrapper">
            <!-- Start box -->
            <?php
            if(isset($idlop)) {
                foreach ($idlop as $id) {
                    $baitap = GV_getBaiTapByID($id);
                    $tenlop=tenlop($id);
                    foreach ($baitap as $bt) {
                    $nhh = date("d-m-Y", strtotime($bt['ngayhethan']));
            ?>
            <div class="card mb-3 swiper-slide thongbao-shadow">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img class="card-img" src="<?= showfile($bt['hinh']) ?>" onerror="erroimg(this)">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body p-0">
                            <div class="info">
                                <div class="aut">
                                    <div class="mon mr-2 text-secondary"><?=$tenlop['tenlop']?></div>
                                </div>
                            </div>
                            <h5 class="card-title mb-1 mt-1"><a href="index.php?act=chambai&id=<?= $bt['idbaitap'] ?>"><?= $bt['tenbaitap'] ?></a></h5>
                            <p class="text-secondary dealine m-0">Hạn chót: <?= $nhh ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php                         
                    }
                }} ?>
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

    <div class="lop-box mt-4">
        <p class="h4 mb-3">Các lớp đang dạy <span class="badge badge-pill badge-light"><?= $dem = (isset($lopdangday)) ? count($lopdangday) : 0 ; ?></span></p>
        <div class="box-content">
        <?php 
            if(isset($lopdangday)){
                foreach ($lopdangday as $lop) {
                    $id=$lop['idlopd'];
                    $countlop=countlop($id);
                    
            ?>
         <div class="d-div3">
                <div class="d-div3-img">
                    <img src="<?= showfile($lop['hinh']) ?>" alt="" onerror="erroimg(this)">
                </div>
                <br>
                <div class="d-info">
                    <div class="d-row1">
                        <p class="mt-3"><?= $lop['tenlop'] ?> <br> <?= $lop['tenkhoa'] ?></p>
                    </div>
                </div>
                <div class="d-info">
                    <div class="d-row100 box-bot">
                        <div class="d-info1">
                            <a><?=$countlop['tong']?> thành viên </a>
                        </div>
                        <div class="d-info2">
                            <a href="index.php?act=lopct&idlop=<?= $lop['idlopd'] ?>" class="btn btn-primary">Xem </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } } else {?>
            <div class="emty-box">
                <img src="../system/img/no_class.svg" alt="">
                <p class="text-muted mt-4">Chưa có lớp nào được giao</p>
            </div>
        </div>
    </div>
    <?php } ?>

        </div>
    </div>

    <div class=" thongbao-box p-4 ">
        <p class="h4 mb-3">Thông báo</p>
        <div class="thongbao border thongbao-shadow p-4 rounded">
           
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