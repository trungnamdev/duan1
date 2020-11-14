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

            <i class="fas fa-plus"></i>

        </div>
    </a>
    <div class="noidung">

        <div class="header-box">
            <div class="tieude h1">BÀI TẬP  </div>
            <div class="option-box">
                <a href="index.php?act=baitap&sx=all" class="active">Tất cả (4)</a>
                <a href="index.php?act=baitap&sx=done" class="">Đã chấm (2)</a>
                <a href="index.php?act=baitap&sx=not" class="">Chưa chấm (2)</a>

            </div>
        </div>
        <div class="d-row">
            <?php
            foreach ($idlop as $id) {
                $baitap = GV_getBaiTapByID($id); 
                $kh = getKHByIDLop($id); 
                foreach ($baitap as $bt) {
                    $nhh = date("d-m-Y", strtotime($bt['ngayhethan']));           // bài tập đã nộp

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
                    <div class="d-row1">
                        <p><?= $bt['tenbaitap'] ?></p>
                        <span><?= $bt['motabt'] ?></span>

                    </div>
                </div>

                <div class="d-info">
                    <div class="d-row100 box-bot">
                        <div class="d-info1 d-hc">
                            <a>Hạn chót:   <?=$bt['ngayhethan']?> </a>
                        </div>
                        <!-- <div class="d-info2 d-nb w-75">
                            <a href="index.php?act=nopbaitap&amp;idbt= " class="btn btn-outline-success">Đã nộp:  </a>

                        </div> -->
                    </div>
                </div>

            </div>
            <?php } }?>

            <!-- <div class="d-div3">
                <div class="d-div3-img">
                    <img src="../uploads/mysql.png" alt="" onerror="erroimg(this)">
                </div>
                <br>
                <div class="d-info">
                    <div class="d-row100">
                        <div class="d-info1 text-span">
                            MYSQL cơ bản
                        </div>
                    </div>
                </div>
                <div class="d-info">
                    <div class="d-row1">
                        <p>LAB 1 DEMO VỀ DELETE MYSQL</p>
                        <span>demo về delete trong mysql</span>

                    </div>
                </div>
                <div class="d-info">
                    <div class="d-row100 box-bot">


                        <div class="d-info1 d-hc">
                            <a>Hạn chót: <br> 2020-11-10 </a>
                        </div>
                        <div class="d-info2 d-nb w-75">
                            <a href="index.php?act=nopbaitap&amp;idbt=12" class="btn btn-outline-success">Đã nộp:
                                15/36</a>

                        </div>
                    </div>
                </div>
            </div>



            <div class="d-div3">
                <div class="d-div3-img">
                    <img src="../uploads/php.png" alt="" onerror="erroimg(this)">
                </div>
                <br>
                <div class="d-info">
                    <div class="d-row100">
                        <div class="d-info1 text-span">
                            PHP cơ bản
                        </div>
                    </div>
                </div>
                <div class="d-info">
                    <div class="d-row1">
                        <p>LAB 1 - FUNC TRONG PHP</p>
                        <span>thuc tap php function</span>

                    </div>
                </div>

                <div class="d-info">
                    <div class="d-row100 box-bot">


                        <div class="d-info1 d-hc">
                            <a>Hạn chót: <br> 2020-11-10 </a>
                        </div>
                        <div class="d-info2 d-nb w-75">
                            <a href="index.php?act=nopbaitap&amp;idbt=12" class="btn btn-outline-success">Đã nộp: 15/36</a>

                        </div>
                    </div>
                </div>
            </div>



            <div class="d-div3">
                <div class="d-div3-img">
                    <img src="../uploads/php.png" alt="" onerror="erroimg(this)">
                </div>
                <br>
                <div class="d-info">
                    <div class="d-row100">
                        <div class="d-info1 text-span">
                            PHP cơ bản
                        </div>
                    </div>
                </div>
                <div class="d-info">
                    <div class="d-row1">
                        <p>LAB 2 - MAILER TRONG PHP</p>
                        <span>thuc tap gui mail trong php</span>

                    </div>
                </div>
                <div class="d-info">
                    <div class="d-row100 box-bot">


                        <div class="d-info1 d-hc">
                            <a>Hạn chót: <br> 2020-11-10 </a>
                        </div>
                        <div class="d-info2 d-nb w-75">
                            <a href="index.php?act=nopbaitap&amp;idbt=12" class="btn btn-outline-success">Đã nộp: 15/36</a>

                        </div>
                    </div>
                </div>
            </div>



            <div class="d-div3">
                <div class="d-div3-img">
                    <img src="../uploads/mysql.png" alt="" onerror="erroimg(this)">
                </div>
                <br>
                <div class="d-info">
                    <div class="d-row100">
                        <div class="d-info1 text-span">
                            MYSQL cơ bản
                        </div>
                    </div>
                </div>
                <div class="d-info">
                    <div class="d-row1">
                        <p>LAB 2 DEMO VỀ IN MYSQL</p>
                        <span>demo về IN trong mysql</span>

                    </div>
                </div>
                <div class="d-info">
                    <div class="d-row100 box-bot">


                        <div class="d-info1 d-hc">
                            <a>Hạn chót: <br> 2020-11-10 </a>
                        </div>
                        <div class="d-info2 d-nb w-75">
                            <a href="index.php?act=nopbaitap&amp;idbt=12" class="btn btn-outline-success">Đã nộp: 15/36</a>

                        </div>
                    </div>
                </div>
            </div> -->


        </div>
    </div>