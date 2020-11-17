
<div class="thongbao">
    <form action="index.php?act=suatb_" method="post">
        <div class="form-group">
            <label for="tieude">Tiêu đề</label>
            <input type="text" class="form-control" id="tieude" 
                placeholder="Tiêu đề của thông báo" name="tieude" value="<?= $thongbao['tdtb']?>">
        </div>
        <div class="form-group">
            <label for="noidung">Nội dung</label>
            <textarea name="noidung" id="noidung" cols="120" rows="10"><?= $thongbao['noidung'] ?></textarea>
        </div>
        <input type="hidden" name="idngdang" value="<?= $_SESSION['iddn']?>">
        <input type="hidden" name="idtb" value="<?= $thongbao['idtb'] ?>">
        <button type="submit" class="btn btn-primary">Sửa thông báo</button>
    </form>
</div>