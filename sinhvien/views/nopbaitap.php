<div class="header-box">
    <div class="tieude h1"><?= $arrbt['tenbaitap'] ?></div>
     
    <div class="option-box1">
        <ul>
            <a class="text-primary"> <img class="avatagv mr-2" src="./views/img/avatar.jpg" alt=""><?= $arrbt['hoten'] ?></a>
            <a class=""> <i class='fas fa-book-open mr-2'></i><?= $arrbt['tenkhoa'] ?></a>
            <a class=""><i class="far fa-clock mr-2"></i> Hạn chót: <?= $arrbt['ngayhethan'] ?></a>
        </ul>
    </div>
</div>

<div class="container-flud m-0">
    <div class="ndbaitap"> 
<span>
<?= $arrbt['motabt'] ?>
    </span>
    </div>

    <div class="nopbaitap px-4 py-5 ">
        <p class="h4 font-weight-bold m-0 mb-4" >
            Bài tập của bạn
        </p>
        <?php if(is_array($nopbai)){ ?>
            <label><?= $nopbai['file'] ?></label>
        <?php if($nopbai['diem'] != ""){?>
            <button type="button" class="diemnb mb-2">Đã chấm: <?=$nopbai['diem'] ?>/10</button>
            <?php }else{?>
        <form action="index.php?act=noplaibt&idbt=<?= $idbt ?>" enctype="multipart/form-data" method="post">        
        <input type="file" name="baitap" id="baitap">
        <label for="baitap" id="btshow"><i class='fas fa-plus-circle mr-2'></i>Tải bài tập thay thế</label>
        <button type="submit" class="btn btn-dark my-1 w-100" name="nop">Nộp lại</button>
        </form>    
        <?php }?>
        
        <?php }else{ ?>    
        <form action="index.php?act=nopbai&idbt=<?= $idbt ?>" enctype="multipart/form-data" method="post">            
        <input type="file" name="baitap" id="baitap">
        
        <label for="baitap" id="btshow"><i class='fas fa-plus-circle mr-2'></i> Tải bài tập lên</label>
        <button type="submit" class="btn btn-dark my-1 w-100" name="nop">Nộp bài</button>
            </form>    
        <?php }?>
    </div>
</div>