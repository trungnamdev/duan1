<div class="header-box">
    <div class="tieude h1">Thêm lớp học</div>
</div>
<div class="thongbao">
    <form action="index.php?act=themlh_" method="post">
        <div class="form-group">
            <label for="tieude">Tên lớp</label>
            <input type="text" class="form-control" id="tenlop" value="" placeholder="Tên lớp học" name="tenlop">
        </div>
        <select class="form-control" name="tenkhoa">
 
  <?php
  foreach ($dskhoa as $kh) {
     echo ' <option value="'.$kh['id'].'">'.$kh['tenkhoa'].'</option>';
  }
  ?>
</select>
<select class="form-control mt-3" name="gv">
 
 <?php
 foreach ($allgv as $gv) {
    echo ' <option value="'.$gv['id'].'">'.$gv['hoten'].'</option>';
 }
 ?>
</select>
<button type="submit" class="btn btn-primary mt-4">Thêm lớp học</button>
    </form>
</div>