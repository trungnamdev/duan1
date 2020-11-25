    <!-- tiêu dề đặt trên đầu mỗi trang view cần tiêu đề -->
    <!-- <div class="header-box">
                <div class="tieude h1">Tổng quan</div> -->
    <!-- Tùy trang mới dùng đến option-box -->
    <!-- <div class="option-box">
                    <a href="#" class="active">Tất cả</a>
                    <a href="#">Đã nộp</a>
                    <a href="#">Chưa nộp</a>
                </div> -->
    <!-- </div> -->

    <!-- bình chia layout xong khóa lại ai cần thì copy vào page mình nha -->
<a href="#">
    <div class="addnew rounded-circle Regular shadow">
    
       <a href="index.php?act=giaobt"> <i class="fas fa-plus"></i></a>
        
    </div>
    <div class="noidung">

        <div class="header-box">
        
            <div class="tieude h1">BÀI TẬP</div>
        </div>
        <div class="d-row">
            <?php
            if(isset($idlop)){
            foreach ($idlop as $id) {
                $baitap = GV_getBaiTapByID($id);
                $tenlop = tenlop($id);
                $kh = getKHByIDLop($id);
                
                $slbt = countlop($id);        // tổng số thành viên
                foreach ($baitap as $bt) {
                    $nhh = date("d-m-Y", strtotime($bt['ngayhethan']));
                   
                    $btdn = getBTDaNop($bt['idbaitap'])['slbt'];             // bài tập đã nộp

            ?>
            
            <div class="d-div3">
                <div class="d-div3-img">
                    <img src="<?= showfile($bt['hinh']) ?>" alt="" onerror="erroimg(this)">
                </div>
                <br>
                <div class="d-info">
                    <div class="d-row100 sb">
                        <div class="d-info1 text-span">
                        <?=$kh['tenkhoa']?>
                        </div>
                        <div class="d-nb ">
                            <a href="index.php?act=suabt&id=<?=$bt['idbaitap']?>" class="btn btn-outline-info mr-1"><i class="fas fa-pen"></i></a>
                            <a href="index.php?act=xoabt&id=<?=$bt['idbaitap']?>" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                </div>
                <div class="d-info">
                    <div class="d-row1 noidung">
                        <p><?= $bt['tenbaitap'] ?></p>
                        <span class="limit2"><?= xoatag($bt['motabt']) ?></span>

                    </div>
                </div>

                <div class="d-info">
                    <div class="d-row100 box-bot w-100">
                        <div class="d-info1 d-hc">
                            <span>Hạn chót: <br> <?=$bt['ngayhethan']?> </span>
                        </div>
                        
                        <div class="d-info2 d-nb w-75">
                            <a href="index.php?act=chambai&id=<?=$bt['idbaitap']?>" class="btn btn-outline-success">Đã nộp: <?=$btdn?>/<?=$slbt['tong'] ?></a>

                        </div>
                    </div>
                </div>

            </div>
            <?php } }}else{?>
            <div class="emty-box">
                <img src="../system/img/nodata.svg" alt="">
                <p class="text-muted mt-4">Chưa có bài tập nào được giao</p>
            </div>
            
        </div>
    </div>
            <?php } ?>