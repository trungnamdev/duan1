<div class="header-box">
    <div class="tieude h1">Thông tin cá nhân</div>
</div>
<div class="d-ttcn">
    <div class="d-tt-left p-3">
        <div class="d-tt-img">
            <img src="<?= showfile($thongtin['hinh'])?>" align="bottom" onerror="erroimg(this)">
            <div class="d-tt-img-text">
                <p><?= $thongtin['hoten'] ?> <i class="fas fa-user-graduate" style="color:pink"></i></p>
                <span><?php 
                    if ($thongtin['chucvu']==0) 
                        $cv = "Sinh viên";
                    else if($thongtin['chucvu']==1) $cv = "Giáo viên";
                    else $sv = "SU";
                    echo $cv
                ?></span>
            </div>
        </div>
        <div class="d-tt-80">
            <div class="d-tt-100 mt-30">
                <div class="d-tt-text-100">
                    <span class="d-tt-text-theme">Email</span>
                    <span class="d-tt-text-title"><?= $thongtin['email'] ?></span>
                </div>
                <div class="d-tt-text-100">
                    <span class="d-tt-text-theme">Số điện thoại</span>
                    <span class="d-tt-text-title"><?= $thongtin['sdt'] ?></span>
                </div>
                <!-- <div class="d-tt-text-100">
                    <span class="d-tt-text-theme">Trạng thái học</span>
                    <span class="d-tt-text-title">HDI(Học đi)</span>
                </div> -->
            </div>
        </div>
    </div>
    <div class="d-tt-right">
        
        <div class="d-tt-95">
            <div class="d-tt-form">
                <div class="d-tt-100">


                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-3 col-form-label">Họ và tên</label>
                        <div class="col-sm-9">
                            <input disabled type="text" class="form-control" id="inputPassword" value="<?= $thongtin['hoten'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-3 col-form-label">Mã sinh viên</label>
                        <div class="col-sm-9">
                            <input disabled type="text" class="form-control" id="inputPassword" value="<?= $thongtin['id'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-3 col-form-label">Giới tính</label>
                        <div class="col-sm-9">
                            <input disabled type="text" class="form-control" id="inputPassword" value="<?= ($thongtin['sex']==1) ? "Nam" : "Nữ" ; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-3 col-form-label">Ngày sinh</label>
                        <div class="col-sm-9">
                            <input disabled type="date" class="form-control" id="inputPassword" value="<?= $thongtin['ngaysinh'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-3 col-form-label">Địa chỉ</label>
                        <div class="col-sm-9">
                            <input disabled type="text" class="form-control" id="inputPassword"
                                value="<?= $thongtin['diachi'] ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>