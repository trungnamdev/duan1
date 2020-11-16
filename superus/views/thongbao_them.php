<div class="header-box">
    <div class="tieude h1">Thêm thông báo</div>
</div>
<div class="thongbao">
    <form action="index.php?act=themtb_" method="post">
        <div class="form-group">
            <label for="tieude">Tiêu đề</label>
            <input type="text" class="form-control" id="tieude" 
                placeholder="Tiêu đề của thông báo" name="tieude">
        </div>
        <div class="form-group">
            <label for="noidung">Nội dung</label>
            <textarea name="noidung" id="noidung" cols="120" rows="10"></textarea>
        </div>
        <input type="hidden" name="idnguoidang" value="<?= $_SESSION['iddn'] ?>">
        <button type="submit" class="btn btn-primary">Đăng thông báo</button>
    </form>
</div>