<?php

if (isset($_GET['cd']) && $_GET['cd'] == 'them') {
?>
    <div class="header-box">
        <div class="tieude h1">Thêm chủ đề</div>
    </div>
    <div class="khoahoc p-3">

        <form action="index.php?act=themcd" method="post" id="formcd" enctype="multipart/form-data">
            <div class="form-group form-khoahoc ">
                <label for="tencd">Tên Chủ Đề</label>
                <input type="text" class="form-control" id="tencd" name="tencd"> 
                <div class="nutthem text-center mt-4 ">
                    <button class="btn btn-primary px-4" type="submit" name="themcd">Thêm Chủ Đề</button>
                </div>
            </div>
        </form>
    </div>
    <?php }if(isset($_GET['cd']) && $_GET['cd'] == 'sua'){
            $suacd = getChuDe($_GET['idcd']); 
        ?>

    <div class="header-box">
        <div class="tieude h1">Sửa chủ đề</div>
    </div>
    <div class="khoahoc p-3"> 
        <form action="index.php?act=suacd" method="post" id="formcd" enctype="multipart/form-data">
            <div class="form-group form-khoahoc ">
                <input type="hidden" name="idcd" value="<?=$_GET['idcd']?>">
                <label for="tenkh">Tên Chủ Đề</label>
                <input type="text" class="form-control" id="tencd" name="tencd" value="<?=$suacd['tenchude']?>"> 
                <div class="nutthem text-center mt-4 ">
                    <button class="btn btn-primary px-4" type="submit" name="suacd">Cập Nhật</button>
                </div>
            </div>
        </form>
    </div>
<?php } ?>