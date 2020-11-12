<div class="header-box">
    <div class="tieude h1">BẢNG ĐIỂM</div>
</div>

<?php 
    $allkh = khoahocdadk();
    
    foreach ($allkh as $kh) {
        $tenkh = $kh['tenkhoa'];
        $baitapkh = layBaiTapByKH($kh['id']); 
        $slbt = 0;
        $tongdiem = 0;
        $dtb = 0;
        foreach ($baitapkh as $btap) {
            $slbt++;
            $bt = checknopbai($btap['idbaitap']);
            if(isset($bt['diem'])){
            $tongdiem += checknopbai($btap['idbaitap'])['diem'];
            }
        }
        $dtb = $tongdiem/$slbt;
        if($dtb >= 0) $tb = $dtb;
        else $tb = 0;
        
?>
 
<div class="bangdiem">
    <div class="tdbangdiem">
        <?=$tenkh?> <span>Điểm trung bình : <strong><?=$tb?><strong></span>
    </div>
    <table class="table tbbangdiem">
        <tr class="bgtimnhat">
            <td>TÊN BÀI TẬP</td>
            <td></td>
            <td>ĐIỂM</td>
            <td>XEM THÊM</td>
        </tr>
        
        <?php
            
            
            foreach ($baitapkh as $bt) {
                $diem = checknopbai($bt['idbaitap']);
                if(isset($bt['diem'])){
                    $diembt = $diem['diem']; 
                }else{ 
                    if(!is_array($diem)) $diembt = 'Chưa nộp';
                    else $diembt = 'Chưa chấm';
                }
        ?>
        <tr>
            <td> 
                <?=$bt['tenbaitap']?>
            </td>
            <td></td>
            <td>
            
                <span><?=$diembt?></span>
            </td>
            <td>
            <a href="index.php?act=nopbaitap&idbt=<?=$bt['idbaitap']?>">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="2em">
                    <path class="uim-primary"
                        d="M7.293,12.707l3.99969,3.9997a1.00354,1.00354,0,0,0,1.41468,0L16.707,12.707A.99989.99989,0,0,0,15.293,11.293L13,13.58594V8a1,1,0,0,0-2,0v5.58594L8.707,11.293A.99989.99989,0,0,0,7.293,12.707Z">
                    </path>
                    <path class="uim-tertiary"
                        d="M12,22A10,10,0,1,0,2,12,10.01114,10.01114,0,0,0,12,22ZM7.293,11.293a.99963.99963,0,0,1,1.41406,0L11,13.58594V8a1,1,0,0,1,2,0v5.58594l2.293-2.293A.99989.99989,0,0,1,16.707,12.707l-3.99969,3.9997a1.00354,1.00354,0,0,1-1.41468,0L7.293,12.707A.99962.99962,0,0,1,7.293,11.293Z">
                    </path>
                </svg></a>
               
            </td>
        </tr>
           <?php }?>
        <tr class="bgtimnhat">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <!-- <i class="uim uim-angle-left"></i> 1-6 of 6 <i class="uim uim-angle-right-b"></i> -->
        </tr>
    </table>
</div>
<?php }?>
<!-- 
<div class="bangdiem">
    <div class="tdbangdiem">
        LẬP TRÌNH PHP <span>Điểm trung bình : <strong>9.9<strong></span>
    </div>
    <table class="table tbbangdiem">
        <tr class="bgtimnhat">
            <td>TÊN BÀI TẬP</td>
            <td></td>
            <td>ĐIỂM</td>
            <td>XEM THÊM</td>
        </tr>
        <tr>
            <td>Lab 1<br><span>Lập trình PHP<span></td>
            <td></td>
            <td><span>10</span><br>Chấm ngày: 15/6/2020</td>
            <td><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="2em">
                    <path class="uim-primary"
                        d="M7.293,12.707l3.99969,3.9997a1.00354,1.00354,0,0,0,1.41468,0L16.707,12.707A.99989.99989,0,0,0,15.293,11.293L13,13.58594V8a1,1,0,0,0-2,0v5.58594L8.707,11.293A.99989.99989,0,0,0,7.293,12.707Z">
                    </path>
                    <path class="uim-tertiary"
                        d="M12,22A10,10,0,1,0,2,12,10.01114,10.01114,0,0,0,12,22ZM7.293,11.293a.99963.99963,0,0,1,1.41406,0L11,13.58594V8a1,1,0,0,1,2,0v5.58594l2.293-2.293A.99989.99989,0,0,1,16.707,12.707l-3.99969,3.9997a1.00354,1.00354,0,0,1-1.41468,0L7.293,12.707A.99962.99962,0,0,1,7.293,11.293Z">
                    </path>
                </svg></td>
        </tr>

        <tr>
            <td>Lab 2<br><span>Lập trình PHP<span></td>
            <td></td>
            <td><span>10</span><br>Chấm ngày: 15/6/2020</td>
            <td><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="2em">
                    <path class="uim-primary"
                        d="M7.293,12.707l3.99969,3.9997a1.00354,1.00354,0,0,0,1.41468,0L16.707,12.707A.99989.99989,0,0,0,15.293,11.293L13,13.58594V8a1,1,0,0,0-2,0v5.58594L8.707,11.293A.99989.99989,0,0,0,7.293,12.707Z">
                    </path>
                    <path class="uim-tertiary"
                        d="M12,22A10,10,0,1,0,2,12,10.01114,10.01114,0,0,0,12,22ZM7.293,11.293a.99963.99963,0,0,1,1.41406,0L11,13.58594V8a1,1,0,0,1,2,0v5.58594l2.293-2.293A.99989.99989,0,0,1,16.707,12.707l-3.99969,3.9997a1.00354,1.00354,0,0,1-1.41468,0L7.293,12.707A.99962.99962,0,0,1,7.293,11.293Z">
                    </path>
                </svg></td>
        </tr>
        <tr>
            <td>Lab 3<br><span>Lập trình PHP<span></td>
            <td></td>
            <td><span>10</span><br>Chấm ngày: 15/6/2020</td>
            <td><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="2em">
                    <path class="uim-primary"
                        d="M7.293,12.707l3.99969,3.9997a1.00354,1.00354,0,0,0,1.41468,0L16.707,12.707A.99989.99989,0,0,0,15.293,11.293L13,13.58594V8a1,1,0,0,0-2,0v5.58594L8.707,11.293A.99989.99989,0,0,0,7.293,12.707Z">
                    </path>
                    <path class="uim-tertiary"
                        d="M12,22A10,10,0,1,0,2,12,10.01114,10.01114,0,0,0,12,22ZM7.293,11.293a.99963.99963,0,0,1,1.41406,0L11,13.58594V8a1,1,0,0,1,2,0v5.58594l2.293-2.293A.99989.99989,0,0,1,16.707,12.707l-3.99969,3.9997a1.00354,1.00354,0,0,1-1.41468,0L7.293,12.707A.99962.99962,0,0,1,7.293,11.293Z">
                    </path>
                </svg></td>
        </tr>
        <tr>
            <td>Lab 4<br><span>Lập trình PHP<span></td>
            <td></td>
            <td><span>10</span><br>Chấm ngày: 15/6/2020</td>
            <td><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="2em">
                    <path class="uim-primary"
                        d="M7.293,12.707l3.99969,3.9997a1.00354,1.00354,0,0,0,1.41468,0L16.707,12.707A.99989.99989,0,0,0,15.293,11.293L13,13.58594V8a1,1,0,0,0-2,0v5.58594L8.707,11.293A.99989.99989,0,0,0,7.293,12.707Z">
                    </path>
                    <path class="uim-tertiary"
                        d="M12,22A10,10,0,1,0,2,12,10.01114,10.01114,0,0,0,12,22ZM7.293,11.293a.99963.99963,0,0,1,1.41406,0L11,13.58594V8a1,1,0,0,1,2,0v5.58594l2.293-2.293A.99989.99989,0,0,1,16.707,12.707l-3.99969,3.9997a1.00354,1.00354,0,0,1-1.41468,0L7.293,12.707A.99962.99962,0,0,1,7.293,11.293Z">
                    </path>
                </svg></td>
        </tr>
        <tr>
            <td>Lab 5<br><span>Lập trình PHP<span></td>
            <td></td>
            <td><span>10</span><br>Chấm ngày: 15/6/2020</td>
            <td><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="2em">
                    <path class="uim-primary"
                        d="M7.293,12.707l3.99969,3.9997a1.00354,1.00354,0,0,0,1.41468,0L16.707,12.707A.99989.99989,0,0,0,15.293,11.293L13,13.58594V8a1,1,0,0,0-2,0v5.58594L8.707,11.293A.99989.99989,0,0,0,7.293,12.707Z">
                    </path>
                    <path class="uim-tertiary"
                        d="M12,22A10,10,0,1,0,2,12,10.01114,10.01114,0,0,0,12,22ZM7.293,11.293a.99963.99963,0,0,1,1.41406,0L11,13.58594V8a1,1,0,0,1,2,0v5.58594l2.293-2.293A.99989.99989,0,0,1,16.707,12.707l-3.99969,3.9997a1.00354,1.00354,0,0,1-1.41468,0L7.293,12.707A.99962.99962,0,0,1,7.293,11.293Z">
                    </path>
                </svg></td>
        </tr>
        <tr class="bgtimnhat">
            <td></td>
            <td></td>
            <td>1-6 of 6</td>
            <td><i class="uim uim-angle-left"></i><i class="uim uim-angle-right-b"></i></td>
        </tr>
    </table>
</div> -->