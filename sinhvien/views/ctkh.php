<div class="header-box">
    <div class="tieude h1">KHÓA HỌC CHI TIẾT</div>
    <div class="option-box">

        <a class="active float-right" id="tienconlai">Số tiền hiện có : <?= chuyenso($_SESSION['tien']) ?> VNĐ</a>
    </div>
</div>

<?php
if (isset($_GET['idkh'])) $idkh = $_GET['idkh'];
$demlh = demlophoc($idkh);
$kh = khoaHocChiTiet($idkh);
$idsv = $_SESSION['iddn'];
$checksv = xetkhoahoc($idkh, $idsv);
$lophoc = lophoc($idkh);
?>
<div class="container-flud m-0" id="chuakh">
    <div class="ndbaitap">
        <h2 class="text-center">Nội dung khóa học</h2>
        <span>
            <?= $kh['mota'] ?>
        </span>
    </div>


    <div class="nopbaitap px-4 py-5   ">
        <img width="100%" height="50%" src="<?= showfile($kh['hinh']) ?>" onerror="erroimg(this)">
        <p class="my-2 px-1"> <i class='far fa-file-alt' style='font-size:20px; color:gray'></i> <?= $demlh['tong'] ?> Lớp học <span class="float-right  font-weight-bold"><?= chuyenso($kh['giatien']) ?> VND</span></p>
        <div id="khoahocct">
            <SPan ></SPan>
            <p>
                <?php
                if (is_array($checksv)) {
                    $gv = gvkhoahoc($checksv['idlop']); ?>
                    <select id="lophoc" class="form-control w-100" disabled>
                        <option><?= $checksv['tenlop'] ?> - <?= $gv['hoten'] ?></option>
                    <?php } else { ?>
                        <select id="lophoc" idkh=<?= $idkh ?> class="form-control w-100">
                        <?php
                        $demlop = 0;
                        foreach ($lophoc as $lophoc) {
                            $idgv = $lophoc['id'];
                            $gv = gvkhoahoc($idgv);
                            echo ' <option value="' . $lophoc['id'] . '">' . $lophoc['tenlop'] . '-' . $gv['hoten'] . '</option>';
                            $demlop++;
                        }
                    } ?>
                        </select>
            </p>
            <?php if (is_array($checksv)) { ?>
                <button type="button" disabled class="btn btn-success w-100">Đã Đăng Ký</button>
            <?php } else {
                if ($demlop != 0) {
                    echo ' <button type="button" class="btn btn-success dkkh w-100"  id="tet" >Đăng Ký</button>';
                } else {
                    echo ' <button type="button" disabled class="btn btn-success dkkh w-100">Không có lớp học</button>';
                }

            ?>

            <?php } ?>

        </div>


    </div>
</div>