<div class="header-box">
    <?php
    foreach ($lopdangday as $lop) {
        $id = $lop['idlopd'];
        $countlop = countlop($id);
    ?>
    <?php } ?>

    <div class="tieude h1">
        <p><?= $lop['tenlop'] ?></p>
    </div>
    <div class="option-box1">
        <a class=""> <img class="avatagv mr-0" src="<?= showfile($lop['hinh']) ?>" alt="" onerror="erroimg(this)"></a>
        <a class="text-secondary font-weight-bolder"><?= $lop['tenkhoa'] ?></a>
    </div>
</div>


<div class="chambai mt-4">
    <table class="table">


        <tr class="thead-light">
            <th scope="col"></th>
            <th scope="col">Tên sinh viên</th>
            <th scope="col">Hình</th>
            <th scope="col">Ngày sinh</th>
            <th scope="col">Email</th>
        </tr>

        <tbody>
            <?php
            
                ?>
                <tr>
                    <th scope="row"><input type="checkbox" name="chonbt" id=""></th>
                    <td><?= $ds['hoten']?></td>
                    <td>
                        <div class="input-group w-fitcontent">
                            <img scr="duan1/uploads/khaihoang.jpg">
                        </div>
                    </td>
                    <td>
                        <span>2020-11-04</span>
                    </td>

                    <td>
                        12312123@gmail.com
                    </td>
                </tr>
        </tbody>
    </table>

</div>