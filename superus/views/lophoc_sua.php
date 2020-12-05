<div class="header-box">
    <div class="tieude h1">Sửa lớp học</div>
</div>
<div class="thongbao">
    <form action="index.php?act=sualh_" method="post">
        <div class="form-group">
            <label for="tieude">Tên lớp</label>
            <input type="text" class="form-control" id="tenlop" value="<?=$lh['tenlop']?>" placeholder="Tên lớp học" name="tenlop">
        </div>
        <select class="form-control" name="tenkhoa">
 
  <?php
  foreach ($dskhoa as $kh) {
      if ($kh['id']==$lh['idkhoa']) {
        echo ' <option value="'.$kh['id'].'" selected>'.$kh['tenkhoa'].'</option>';
      } else {
        echo ' <option value="'.$kh['id'].'">'.$kh['tenkhoa'].'</option>';
      }
      
    
  }
  ?>
</select>
<select class="form-control mt-3" name="gv">
 
 <?php
   $gvlop=gvlop($lh['id']);
 foreach ($allgv as $gv) {

     if ($gvlop['id']==$gv['id']) {
       echo ' <option value="'.$gv['id'].'" selected>'.$gv['hoten'].'</option>';
     } else {
       echo ' <option value="'.$gv['id'].'">'.$gv['hoten'].'</option>';
     }
     
   
 }
 ?>
</select>
<input type="hidden" name="idgvc" value="<?php if (is_array($gvlop)) {echo $gvlop['id'];} else {echo 0;}?>">
<input type="hidden" name="idlh" value="<?= $lh['id'] ?>">
<button type="submit" class="btn btn-primary mt-4">Sửa lớp học</button>
    </form>
</div>