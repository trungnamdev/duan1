<div class="header-box">
    <div class="tieude h1"><?= $arrbt['tenbaitap'] ?></div>
     
    <div class="option-box1">
        <ul>
            <a class="text-primary"> <img class="avatagv mr-2" src="./views/img/avatar.jpg" alt=""><?= $arrbt['hoten'] ?></a>
            <a class=""> <i class='fas fa-book-open'></i> PHP Cơ Bản</a>
            <a class=""><i class="far fa-clock"></i> Hạn chót: <?= $arrbt['ngayhethan'] ?></a>
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
        <input type="file" name="baitap" id="baitap">
        
        <label for="baitap"><i class='fas fa-plus-circle'></i> Tải bài tập lên</label>
        <button type="button" class="btn btn-dark my-1 w-100">Nộp bài</button>
    </div>
</div>