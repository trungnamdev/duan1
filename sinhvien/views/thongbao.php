<style>
.box-right {
    width: 30%;
    height: 100%;
    overflow-y: scroll;
}

/* width */
.box-right::-webkit-scrollbar {
  width: 5px;
}

/* Track */
.box-right::-webkit-scrollbar-track {
  background: #fff; 
}
 
/* Handle */
.box-right::-webkit-scrollbar-thumb {
  background: #efefef; 
}

/* Handle on hover */
.box-right::-webkit-scrollbar-thumb:hover {
  background: #999; 
}
</style>
<div class="header-box">
    <div class="tieude h1">THÔNG BÁO</div>
</div>
<div class="thongbao mt-5">
    <?php
        foreach ($tb as $thongbao) {
            $nd=date("d-m-Y",strtotime($thongbao['ngaydang']));
            if(strlen($thongbao['tdtb'])>=60)
                $thongbao['tdtb'] = substr($thongbao['tdtb'], 0, 60)."...";
    ?>
    <div class="item mb-2">
        <a href="index.php?act=thongbao&idtb=<?=$thongbao['idtb']?>" class="tieude-tb"><?= $thongbao['tdtb'] ?></a>
        <div class="text-secondary info mt-2 pb-3">
            <div class="mr-5">
                <i class="uim uim-user-nurse "></i>
                <span class="ml-1"><?=$thongbao['hoten']?></span>
            </div>
            <div>
                <i class="uim uim-clock"></i>
                <span class="ml-1"><?= $nd ?></span>
            </div>
        </div>
    </div>
    <?php }?>


</div>
</div>
</div>
<div class="boxthongbao-right">
    <!-- <div class="boxthongbao-chitiet">
        <i class="fas fa-stream"></i>
        <p class="text-secondary">Chọn một thông báo để xem</p>
    </div> -->
<?php
if (isset($_GET['idtb'])) {?>
 <div class="boxthongbao-chitiet2">
        <h4><?=$tbct['tdtb']?></h4>
        <!-- <p class="d-tb-red">THÔNG BÁO NHÓM ĐANG KÍ DỰ ÁN TỐT GHIỆP KÌ SPRING 2021</p>
        <p class="d-tb-ml20">Hạn đăng kí : 03-25/11/2020</p>
        <p class="d-tb-ml20 d-mt3">Yêu cầu đăng kí</p>
        <div class="d-tb-text">
            <p>Thành viên nhóm từ 4-5 người</p>
            <p>Riêng ngành Quan hệ công chúng 4-7 người</p>
            <p>Links đăng kí: <a
                    href="https://drive.google.com/drive/folders/11ZT5jeqJ0biaFcQaqvbN1_yCLh1fXRR7?usp=sharing">https://drive.google.com/drive/folders/11ZT5jeqJ0biaFcQaqvbN1_yCLh1fXRR7?usp=sharing</a>
            </p>
        </div>
        <p class="d-tb-ml20 d-mb-2 d-mt1">Lưu ý :</p>
        <div class="d-tb-text">
            <p>Đối với các nhóm chưa đủ thành viên, dư thành viên hoặc đăng kí cá nhân thì theo sự sắp xếp của bộ môn
            </p>
            <p>Điều kiện kiên quyết <a
                    href="https://drive.google.com/drive/folders/11ZT5jeqJ0biaFcQaqvbN1_yCLh1fXRR7?usp=sharing">https://drive.google.com/drive/folders/11ZT5jeqJ0biaFcQaqvbN1_yCLh1fXRR7?usp=sharing</a>
            </p>
        </div>
        <p class="d-tb-ml20 d-mt2">Lưu ý: Sau khi kiểm tra điều kiện tiên quyết, các bạn nếu không pass các môn tiên
            quyết sẽ bị loại ra khỏi nhóm</p> -->
            <p style="margin-top: 50px;"><?=$tbct['noidung']?></p>
        <div class="d-tb-info">
            <p>Người đăng: <?=$tbct['hoten']?></p>
            <p>Ngày đăng: <?=$tbct['ngaydang']?></p>
        </div>
    </div>
    <?php
} else {
   echo ' <div class="boxthongbao-chitiet">
   <i class="fas fa-stream"></i>
   <p class="text-secondary">Chọn một thông báo để xem</p>
</div>';
}

?>
   
</div>