<?php if (is_array($danhsach)) { ?>
<div class="header-box">
    <div class="tieude h1"><?= $baitap_info['tenbaitap'] ?></div>

    <div class="option-box1">
        <ul>
            <a class="text-primary"> <img class="avatagv mr-2" src="<?= showfile($baitap_info['hinh']) ?>" alt="" onerror="erroimg(this)"><?= $baitap_info['tenkhoa'] ?></a>
            <a class=""> <i class='fas fa-book-open mr-2'></i> <?= $baitap_info['tenlop'] ?></a>
            <a class=""><i class="far fa-clock mr-2"></i> Hạn chót: <?= $baitap_info['ngayhethan'] ?></a>
        </ul>
    </div>
</div>

<form action="index.php?act=chambai&id=<?= $idbt ?>" method="post">
<div class="chambai">
    <table class="table">


        <tr class="thead-light">
            <th scope="col"></th>
            <th scope="col">Tên sinh viên</th>
            <th scope="col">Điểm</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Lời phê</th>
            <th scope="col">Tải xuống</th>
        </tr>
      
        <tbody>

            <?php
                foreach ($danhsach as $ds) {
                $arrtrangthai = checknopbai($_GET['id'],$ds['idsv']);
                $link = "";
                $file = "";
                if(is_array($arrtrangthai)) {
                    $link = $arrtrangthai['file'];
                    $trangthai = '<p class="text-success">Đã nộp</p>';
                }
                else $trangthai = '<p class="text-danger">Chưa nộp</p>';
                
                
        
            ?>
           
            <tr>
                <th scope="row"><input type="checkbox" name="chonbt[]" value="<?= $link ?>"></th>
                <td><a href="index.php?act=thongtincn&idtk=<?= $ds['idsv'] ?>"><?= $ds['hoten'] ?></a></td>
                <td>
                    <div class="input-group w-fitcontent">
                        <select class="custom-select chamdiemop" typeid=<?= $arrtrangthai['idfile'] ?>>
                        <option selected>...</option>
                        <?php
                            for ($i=0; $i <= 10; $i++) { 
                                $selected = "";
                                if($arrtrangthai['diem'] != "") {
                                    if($arrtrangthai['diem'] == $i){ 
                                        $selected = "selected";
                                    }
                                }             
                        ?>  
                            <option value="<?=$i?>" <?= $selected ?> ><?=$i?></option>
                        <?php }?>
                        </select>
                        <div class="input-group-append">
                            <label class="input-group-text" for="inputGroupSelect02">/ 10</label>
                        </div>
                    </div>
                </td>
                <td>
                <?= $trangthai ?>
                </td>
                <td>
                <input type="text" class="form-control loiphe" placeholder="nhập lời phê" typeid=<?= $arrtrangthai['idfile'] ?>>
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
    <div class="option">
        <div id="selectAll" class="btn btn btn-outline-primary mr-3"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#384E85" width="1em"><path class="uim-primary" d="M10.2002,16.3999a.99676.99676,0,0,1-.707-.293L6.293,12.90723A.99989.99989,0,0,1,7.707,11.49316l2.49317,2.49268L16.293,7.89307A.99989.99989,0,0,1,17.707,9.30713l-6.7998,6.7998A.99676.99676,0,0,1,10.2002,16.3999Z"></path><path class="uim-tertiary" d="M21,2H3A1,1,0,0,0,2,3V21a1,1,0,0,0,1,1H21a1,1,0,0,0,1-1V3A1,1,0,0,0,21,2ZM17.707,9.30713l-6.7998,6.7998a.99964.99964,0,0,1-1.41407,0L6.293,12.90723A.99989.99989,0,0,1,7.707,11.49316l2.49317,2.49268L16.293,7.89307A.99989.99989,0,0,1,17.707,9.30713Z"></path></svg>  Chọn tất cả</div>
        <div id="unselectAll" class="btn btn btn-outline-primary mr-3"><svg fill="#384E85" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="1em"><path class="uim-primary" d="M21,22H3a.99974.99974,0,0,1-1-1V3A.99974.99974,0,0,1,3,2H21a.99974.99974,0,0,1,1,1V21A.99974.99974,0,0,1,21,22ZM4,20H20V4H4Z"></path></svg>  Bỏ chọn tất cả</div>
       <a href="index.php?act=chambai&id=<?= $idbt ?>&excel=true"><div class="btn btn btn-outline-primary"> <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" fill="#384E85" viewBox="0 0 24 24" width="1em"><path class="uim-primary" d="M19,9H14a2,2,0,0,1-2-2V2Z"></path><path class="uim-tertiary" d="M14,9a2,2,0,0,1-2-2V2H6A3,3,0,0,0,3,5V19a3,3,0,0,0,3,3H16a3,3,0,0,0,3-3V9Z"></path><path class="uim-primary" d="M20.707,15.29346l-3-3A.99989.99989,0,1,0,16.293,13.70752l1.293,1.293H12a1,1,0,0,0,0,2h5.58594l-1.293,1.293A.99989.99989,0,1,0,17.707,19.70752l3-3A.99962.99962,0,0,0,20.707,15.29346Z"></path></svg> Xuất excel</div></a>
       <button class="btn btn btn-outline-primary mr-3" type="submit" name="tai"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#384E85" width="1em"><path class="uim-primary" d="M10.2002,16.3999a.99676.99676,0,0,1-.707-.293L6.293,12.90723A.99989.99989,0,0,1,7.707,11.49316l2.49317,2.49268L16.293,7.89307A.99989.99989,0,0,1,17.707,9.30713l-6.7998,6.7998A.99676.99676,0,0,1,10.2002,16.3999Z"></path><path class="uim-tertiary" d="M21,2H3A1,1,0,0,0,2,3V21a1,1,0,0,0,1,1H21a1,1,0,0,0,1-1V3A1,1,0,0,0,21,2ZM17.707,9.30713l-6.7998,6.7998a.99964.99964,0,0,1-1.41407,0L6.293,12.90723A.99989.99989,0,0,1,7.707,11.49316l2.49317,2.49268L16.293,7.89307A.99989.99989,0,0,1,17.707,9.30713Z"></path></svg>  Tải xuống</button>
    </div>
    </form>
</div>
<?php } else header("location: index.php?act=baitap&sx=all")
    ?>