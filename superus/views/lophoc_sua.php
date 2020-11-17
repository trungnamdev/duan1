<div class="header-box">
    <div class="tieude h1">Thêm thông báo</div>
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
<input type="hidden" name="idlh" value="<?= $lh['id'] ?>">
<button type="submit" class="btn btn-primary mt-3">Sửa lớp học</button>
    </form>
</div>