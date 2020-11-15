<div class="">
<div class="header-box">
    <div class="tieude h1">GIAO BÀI TẬP</div>
</div>
<div class=" d-giaobt-row100">
<form action="index.php?act=giaobtd" method="post" enctype="multipart/form-data" id="checkform" onchange="checkngay()">
<div class="giaobt-left">

  <div class="form-group">
    <label for="exampleInputEmail1" class="d-lavel">Tên bài tập</label>
    <input type="text" class="form-control" name="tenbt">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="d-lavel">Ngày giao</label>
    <input type="text" class="form-control from" placeholder="ngày giao" name="ngaygiao">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="d-lavel">Hạn chốt</label>
    <input type="text" class="form-control to" placeholder="ngày hết hạn" name="hanchot">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1" class="d-lavel">Mô tả</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" name="mota"></textarea>
  </div>
  <button type="submit" class="btn btn-primary mt-4 col-2" name="dang">Đăng lên</button>

</div>
<div class="giaobt-right">
<div class="d-align">
<div class="form-group giaobt-right-1">
   <span> Các lớp :</span>
    <select class="form-control " name="lophoc">
    <?php
    foreach ($lopdangday as $k) {
   echo '<option value="'.$k['idlopd'].'">'.$k['tenlop'].'</option>';
     }
    
    ?>
</select> 
 </div>
  <div class="form-group giaobt-right-2 d-mt2">
  <div class="nonone">
    <label for="exampleFormControlFile1" id="btshow">Tệp tin</label>

    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="imgbt" accept="image/*">
    </div>
    </div>
    </div>
</div>
</form>
</div>
</div>
