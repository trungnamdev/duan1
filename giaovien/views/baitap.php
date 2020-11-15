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
                    <img src="../uploads/<?=$bt['hinh']?>" alt="" onerror="erroimg(this)">
                </div>
                <br>
                <div class="d-info">
                    <div class="d-row100">
                        <div class="d-info1 text-span">
                        <?=$kh['tenkhoa']?>
                        </div>
                    </div>
                </div>
                <div class="d-info">
                    <div class="d-row1 text-truncate">
                        <p><?= $bt['tenbaitap'] ?></p>
                        <span><?= $bt['motabt'] ?></span>

                    </div>
                </div>

                <div class="d-info">
                    <div class="d-row100 box-bot">
                        <div class="d-info1 d-hc">
                            <a>Hạn chót: <br> <?=$bt['ngayhethan']?> </a>
                        </div>
                        <div class="d-info2 d-nb w-75 d-mr-3">
                            <a href="index.php?act=xoabt&id=<?=$bt['idbaitap']?>" class="btn btn-outline-success">Xóa</a>

                        </div>
                        <div class="d-info2 d-nb w-75">
                            <a href="index.php?act=chambai&id=<?=$bt['idbaitap']?>" class="btn btn-outline-success">Đã nộp: <?=$btdn?>/<?=$slbt['tong'] ?></a>

                        </div>
                    </div>
                </div>

            </div>
            <?php } }?>
        </div>
    </div>