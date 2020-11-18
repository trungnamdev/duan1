<div class="header-box">
    <div class="tieude h1"><?= $td ?> Sinh Viên</div>
</div>
<div class="thongbao">
    <form action="index.php?act=addsinhvien&cn=<?= $cnn ?>" method="post" enctype="multipart/form-data" id="formsv">
        <div class="row">
        <div class="col-4 d-mt2">
        <div class="row chuaanhshow">
        <img src="<?= showfile($img) ?>" id="showanh" onerror="erroimg(this)">
        </div>
        <div class="row">
        <label for="ttipanh" class="svfilelb">Tệp tin</label>
        <input type="file" class="form-control-file" name="imgsv" accept="image/*" id="ttipanh">
        </div>
        </div>
        <div class="col-8">
        <div class="form-group row">
            <div class="col">
            <label for="tieude">Họ tên</label>
            <input type="text" class="form-control" placeholder="nhập họ tên" name="ht" value="<?= $ht ?>">
            </div>
            <div class="col">
            <label for="tieude">Ngày Sinh</label>
            <input type="text" class="form-control" placeholder="Nhập ngày sinh" name="ngaysinh" id="ngaysinh" readonly value="<?= $ngaysinh ?>">
            </div>
        </div>
        <div class="form-group row">
            <div class="col">
            <label for="tieude">email</label>
            <input type="text" class="form-control" placeholder="EMAIL" name="email" value="<?= $email ?>">
            </div>
            <div class="col">
            <label for="tieude">số điện thoại</label>
            <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">+84</div>
        </div>
        <input type="text" class="form-control" placeholder="SĐT" name="sdt" value="<?= $sdt ?>">
      </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col">
            <label for="tieude">Địa chỉ</label>
            <input type="text" class="form-control" placeholder="Địa chỉ" name="diachi" value="<?= $diachi ?>">
            </div>
            <div class="col">
            <label for="exampleInputEmail1 row">Giới tính</label>
            <div class="form-control">
            <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="sex" id="nam" value="1" <?= $sex1 ?>>
        <label class="form-check-label" for="nam">Nam</label> 
            </div>
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="sex" id="nu" value="0" <?= $sex0 ?>>
        <label class="form-check-label" for="nu">Nữ</label>   
        </div>
            </div>
        </div>
            </div>   
            <div class="form-group row">
    <div class="col">
    <button type="submit" class="btn btn-primary" name="them"><?= $btnv ?> SINH VIÊN</button>
    <?php if($cn == "sua"){?>
    <a class="btn btn-warning">KHÔI PHỤC MẬT KHẨU</a>
    <?php }?>
    </div>
    </div> 
    <?= $mess ?>
    </div>
        </div>
</div>
    </form>
</div>