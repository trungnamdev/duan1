<div class="noidung">

    <div class="header-box">
        <div class="tieude h1">ĐỔI MẬT KHẨU</div>
    </div>
    <div class="d-row">
        <form class="col-12 pl-0" action="index.php?act=changepass_" method="post" id="formdoimk">
            <div class="form-group pl-0 col-6">
                <label for="pass">Nhập mật khẩu cũ</label>
                <input type="password" class="form-control" id="pass" name="pass" data-require>
            </div>
            <div class="form-group pl-0 col-6">
                <label for="newpass">Mật khẩu mới</label>
                <input type="password" class="form-control" id="newpass" name="newpass" data-require>
            </div>
            <div class="form-group pl-0 col-6">
                <label for="newpass">Nhập lại mật khẩu</label>
                <input type="password" class="form-control" id="repass" name="repass" data-require data-conditional="checkpassword">
            </div>
            <button type="submit" id="submit" class="col-3  btn btn-primary">Đổi mật khẩu</button>
        </form>
    </div>
</div>