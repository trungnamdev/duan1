<div class="header-box">
    <div class="tieude h1">Nạp Tiền</div>
</div>
<div class="row">
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
                <div class="d-tt-text-100">
                    <span class="d-tt-text-theme">Tiền trong tài khoản</span>
                    <span class="d-tt-text-title"><strong><?= chuyenso($thongtin['tien']) ?> VNĐ</strong></span>
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
            <div class="d-tt-form w-100 m-0">
                <div class="d-tt-100">
        <form action="index.php?act=thanhtoan&cn=guitt" id="create_form" method="post">
            <div class="form-group">
                <label for="order_id">Mã hóa đơn</label>
                <input class="form-control" id="order_id" name="order_id" type="text" value="<?php echo date("YmdHis") ?>" readonly>
            </div>
            <div class="form-group">
                <label for="amount">Số tiền</label>
                <input class="form-control" id="amount" name="amount" type="number" placeholder="Nhập số tiền muốn nạp">
            </div>
            <div class="form-group">
                        <label for="bank_code">Ngân hàng</label>
                        <select name="bank_code" id="bank_code" class="form-control">
                            <option value="">Không chọn</option>
                            <option value="NCB"> Ngan hang NCB</option>
                            <option value="AGRIBANK"> Ngan hang Agribank</option>
                            <option value="SCB"> Ngan hang SCB</option>
                            <option value="SACOMBANK">Ngan hang SacomBank</option>
                            <option value="EXIMBANK"> Ngan hang EximBank</option>
                            <option value="MSBANK"> Ngan hang MSBANK</option>
                            <option value="NAMABANK"> Ngan hang NamABank</option>
                            <option value="VNMART"> Vi dien tu VnMart</option>
                            <option value="VIETINBANK">Ngan hang Vietinbank</option>
                            <option value="VIETCOMBANK"> Ngan hang VCB</option>
                            <option value="HDBANK">Ngan hang HDBank</option>
                            <option value="DONGABANK"> Ngan hang Dong A</option>
                            <option value="TPBANK"> Ngân hàng TPBank</option>
                            <option value="OJB"> Ngân hàng OceanBank</option>
                            <option value="BIDV"> Ngân hàng BIDV</option>
                            <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                            <option value="VPBANK"> Ngan hang VPBank</option>
                            <option value="MBBANK"> Ngan hang MBBank</option>
                            <option value="ACB"> Ngan hang ACB</option>
                            <option value="OCB"> Ngan hang OCB</option>
                            <option value="IVB"> Ngan hang IVB</option>
                            <option value="VISA"> Thanh toan qua VISA/MASTER</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-dark" name="ttoan">Thanh toán</button>
        </form>
    </div>
<?= $mess ?>
                </div>
            </div>
        </div>
    </div>
</div>