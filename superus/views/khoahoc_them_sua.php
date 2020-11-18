<?php

if (isset($_GET['kh']) && $_GET['kh'] == 'them') {
?>
    <div class="header-box">
        <div class="tieude h1">Thêm khóa học</div>
    </div>
    <div class="khoahoc p-5">

        <form action="index.php?act=themkh" method="post" enctype="multipart/form-data">
            <div class="form-group form-khoahoc ">
                <label for="tenkh">Tên Khóa Học</label>
                <input type="text" class="form-control" id="tenkh" name="tenkh">
                <label for="mota">Mô Tả Khóa Học</label>
                <input type="text" class="form-control" id="mota" name="mota">

                <label for="chude">Chọn Chủ Đề</label>
                <select name="chude" class="form-control  chude" id="chude">
                    <?php 
                        foreach ($chude as $cd) {
                            echo '<option value="'.$cd["id"].'">'.$cd["id"].' - '.$cd['tenchude'].'</option>';
                        }
                    ?>
                    
                </select>
                <label for="hinh" class="form-control"><i class='fas fa-plus-circle mr-2'></i>Chọn Ảnh </label>
                <input type="file" class="form-control" id="hinh" name="hinh">

                <div class="nutthem text-center mt-4 ">
                    <button class="btn btn-primary px-4" type="submit" name="themkh">Thêm Bài Tập</button>
                </div>
            </div>
        </form>
    </div>
    <?php }if(isset($_GET['kh']) && $_GET['kh'] == 'sua'){
            $suakh = getKhoaHoc($_GET['idkh']); 
        ?>

    <div class="header-box">
        <div class="tieude h1">Sửa khóa học</div>
    </div>
    <div class="khoahoc p-5"> 
        <form action="index.php?act=suakh" method="post" enctype="multipart/form-data">
            <div class="form-group form-khoahoc ">
                <input type="hidden" name="idkh" value="<?=$_GET['idkh']?>">
                <label for="tenkh">Tên Khóa Học</label>
                <input type="text" class="form-control" id="tenkh" name="tenkh" value="<?=$suakh['tenkhoa']?>">
                <label for="mota">Mô Tả Khóa Học</label>
                <input type="text" class="form-control" id="mota" name="mota" value="<?=$suakh['mota']?>">

                <label for="chude">Chọn Chủ Đề</label>
                <select name="chude" class="form-control  chude" id="chude">
                    <?php 
                        foreach ($chude as $cd) {
                            if($suakh['chude'] == $cd['id']) $sel = 'selected';
                            else $sel ='';
                            echo '<option '.$sel.' value="'.$cd["id"].'">'.$cd["id"].' - '.$cd['tenchude'].'</option>';
                        }
                    ?>
                </select>
                <label for="hinh" class="form-control"><i class='fas fa-plus-circle mr-2'></i>Chọn Ảnh </label>
                <input type="file" class="form-control" id="hinh" name="hinh">

                <div class="nutthem text-center mt-4 ">
                    <button class="btn btn-primary px-4" type="submit" name="suakh">Cập Nhật</button>
                </div>
            </div>
        </form>
    </div>
<?php } ?>