<div class="noidung lop">

<div class="header-box">
    <div class="tieude h1">Bài Tập</div>
</div>
<div class="d-row">

<?php 
    if(isset($lopdangday)){
        foreach ($lopdangday as $lop) {
            $id=$lop['idlopd'];
            $countlop=dembtlop($id);
            
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
                    <a>Đã giao <?=$countlop['tong']?> bài tập </a>
                </div>
                <div class="d-info2">
                    <a href="index.php?act=baitaplop&idlop=<?= $lop['idlopd'] ?>" class="btn btn-primary">Xem Bài Tập</a>
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