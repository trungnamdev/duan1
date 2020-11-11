<?php
    // Lấy all bài tập theo ID lớp 
    $allbaitap = thongtinsv($_SESSION['iddn']); 
    $slbt = $allbaitap;
    $btdanop = 0;
    
    foreach ($allbaitap as $allbt) {  
        // Đếm bài tập đã nộp
        $checkbt = checknopbai($allbt['idbaitap']); 
        if(is_array($checkbt) > 0 ) $btdanop +=1;      
    }
    // Đếm bài tập chưa nộp
    $btchuanop = count($slbt) - $btdanop;
   
?>

<div class="header-box">
    <div class="tieude h1">BÀI TẬP</div>
    <div class="option-box">
        <a href="index.php?act=baitap&sx=all" class="active">Tất cả (<?=count($slbt)?>)</a>
        <a href="index.php?act=baitap&sx=done">Đã nộp (<?=$btdanop?>)</a>
        <a href="index.php?act=baitap&sx=not">Chưa nộp (<?=$btchuanop?>)</a>
    </div>
</div>
<div class="d-row">
    <?php  
  
        foreach ($allbaitap as $allbt) {
           $i =0;
                $tenbt = $allbt['tenbaitap'];
                $hinh = "./views/img/".$allbt['hinh'];
                if(!is_file($hinh)) $hinh = "./views/img/noimage.png";
                $idbt = $allbt['idbaitap'];
                $mota = $allbt['motabt'] ;
                $mota = strip_tags($mota); //Lược bỏ các tags HTML
                if(strlen($mota)>163) { //Đếm kí tự chuỗi $str, 100 ở đây là chiều dài bạn cần quy định
                $strCut = substr($mota, 0, 163); //Cắt 100 kí tự đầu
                $mota = substr($strCut, 0, strrpos($strCut, ' ')).'...'; //Tránh trường hợp cắt dang dở như "nội d... Read More"
                }
                $ngaygiao = $allbt['ngaygiao'] ;
                $ngayhethan = $allbt['ngayhethan'] ;
                $idlop = $allbt['idlop'];
                
            
                //Lấy id gv Từ tb lop
                $idgv = thongtingv($idlop)['idgv'];
                // Lấy thông tin giáo viên từ tb taikhoan
                $hinhgv = thongtinsvtomtat($idgv)['hinh']; 
                $tengv = thongtinsvtomtat($idgv)['hoten']; 
                $hinhgv = "../uploads/".$hinhgv;
                if(!is_file($hinhgv)) $hinhgv = "./views/img/noimage.png";
            
    ?>


    <div class="d-div3">
        <div class="d-div3-img">
            <img src="<?=$hinh?>" alt="">
        </div>
        <br>
        <div class="d-info">
            <div class="d-row100">


                <div class="d-info1">
                    <img src="<?=$hinhgv?>" alt="">
                    <a href=""><?=$tengv?></a>
                </div>
                <div class="d-info2">
                    PHP CƠ BẢN  
                </div>
            </div>
        </div>
        <div class="d-info">
            <div class="d-row1">
                <p><?=$tenbt?></p>
                <span><?=$mota?></span>

            </div>
        </div>
        <div class="d-info">
            <div class="d-row100  mb-18">


                <div class="d-info1 d-hc">
                    <a href="">Hạn chót: 10/11/2020 </a>
                </div>
                <div class="d-info2 d-nb">
                    <a href="index.php?act=nopbaitap&idbt=<?=$idbt?>" class="btn btn-primary">Nộp bài</a>
                </div>
            </div>
        </div>
    </div>
    <?php }?>

</div>