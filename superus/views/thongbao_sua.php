
<div class="thongbao">
    <form action="index.php?act=suatb_" method="post">
        <div class="form-group">
            <label for="tieude">Tiêu đề</label>
            <input type="text" class="form-control" id="tieude" 
                placeholder="Tiêu đề của thông báo" name="tieude" value="<?= $thongbao['tdtb']?>">
        </div>
        <div class="form-group">
            <label for="nguoinhan">Người nhận</label>
            <?php 
                $sv = ""; $gv = ""; $all = "";
                if($thongbao['nguoinhan']==0)
                    $sv = "selected";
                else if($thongbao['nguoinhan']==1)
                    $gv = "selected";
                else $all = "selected";
            ?>
            <select name="nguoinhan" id="nguoinhan">
                <option value="2" <?= $all ?>>Tất cả</option>
                <option value="0" <?= $sv ?>>Sinh viên</option>
                <option value="1" <?= $gv ?>>Giáo viên</option>
            </select>
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