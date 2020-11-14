<div class="header-box">
    <div class="tieude h1"><?= $baitap_list[0]['tenbaitap'] ?></div>

    <div class="option-box1">
        <ul>
            <a class="text-primary"> <img class="avatagv mr-2" src="<?= showfile($baitap_list[0]['hinh']) ?>" alt=""><?= $baitap_list[0]['tenkhoa'] ?></a>
            <a class=""> <i class='fas fa-book-open mr-2'></i> <?= $baitap_list[0]['tenlop'] ?></a>
            <a class=""><i class="far fa-clock mr-2"></i> Hạn chót: <?= $baitap_list[0]['ngayhethan'] ?></a>
        </ul>
    </div>
</div>


<div class="chambai">
    <table class="table">


        <tr class="thead-light">
            <th scope="col"></th>
            <th scope="col">Tên sinh viên</th>
            <th scope="col">Điểm</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Tải xuống</th>
        </tr>

        <tbody>
            <?php 
                foreach ($danhsach as $ds) {
                    # code...
            ?>
            <tr>
                <th scope="row"><input type="checkbox" name="chonbt" id=""></th>
                <td><?= $ds['hoten'] ?></td>
                <td>
                    <div class="input-group w-fitcontent">
                        <select class="custom-select" id="inputGroupSelect02">
                            <option selected>...</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                        <div class="input-group-append">
                            <label class="input-group-text" for="inputGroupSelect02">/ 10</label>
                        </div>
                    </div>
                </td>
                <td>
                <?php 
                $link = "";
                foreach ($baitap_list as $bt) {
                    $deadline = $bt['ngayhethan'];
                    $img = $bt['hinh'];
                    if ($bt['idsv']==$ds['idsv']) {
                        echo '<p class="text-success">Đã nộp</p>';
                        $link = $bt['idfile'];
                    break;
                    }else
                        echo '<p class="text-danger">Chưa nộp</p>';
                }
                ?>
                </td>
                
                <td>
                    <?php 
                        if($link!="") {
                    ?>
                    <a href="<?=$link?>">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#384E85" viewBox="0 0 24 24" width="2em">
                            <path class="uim-primary"
                                d="M7.293,12.707l3.99969,3.9997a1.00354,1.00354,0,0,0,1.41468,0L16.707,12.707A.99989.99989,0,0,0,15.293,11.293L13,13.58594V8a1,1,0,0,0-2,0v5.58594L8.707,11.293A.99989.99989,0,0,0,7.293,12.707Z">
                            </path>
                            <path class="uim-tertiary"
                                d="M12,22A10,10,0,1,0,2,12,10.01114,10.01114,0,0,0,12,22ZM7.293,11.293a.99963.99963,0,0,1,1.41406,0L11,13.58594V8a1,1,0,0,1,2,0v5.58594l2.293-2.293A.99989.99989,0,0,1,16.707,12.707l-3.99969,3.9997a1.00354,1.00354,0,0,1-1.41468,0L7.293,12.707A.99962.99962,0,0,1,7.293,11.293Z">
                            </path>
                        </svg></a>
                        <?php } ?>

                </td>
            </tr>
            <?php }?>

        </tbody>
    </table>

</div>