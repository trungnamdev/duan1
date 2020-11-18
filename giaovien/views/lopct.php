<?php 
    // check mấy thằng mât dạy nhập idlop bừa bãi. 
    if(isset($_GET['idlop']) && $_GET['idlop'] > 0 && countLopGV($_GET['idlop'])['tong']> 0){  
?>
<div class="header-box"> 
    <div class="tieude h1">
        <p><?=$tenlop['tenlop']?></p>
    </div>
    <div class="option-box1">
        <a class=""> <img class="avatagv mr-0" src="<?=showfile($khoahoc['hinh'])?>" alt="" onerror="erroimg(this)"></a>
        <a class="text-secondary font-weight-bolder"><?=$khoahoc['tenkhoa']?> </a>
    </div>
</div>


<div class="chambai mt-4">
    <table class="table">


        <tr class="thead-light">
            <th scope="col">Tên sinh viên</th>
            <th scope="col">Hình</th>
            <th scope="col">Ngày sinh</th>
            <th scope="col">Email</th>
            <th scope="col">Địa chỉ</th>
        </tr>

        <tbody>
        <?php
            
             
            foreach ($dssvtheolop as $ds) { 
            ?>
                <tr>
                    <td><a href="index.php?act=thongtincn&idtk=<?= $ds['id'] ?>"><?=$ds['hoten']?></a></td>
                    <td>
                        <div class="input-group w-fitcontent avtimage"> 
                             
                                <img src="<?=showfile($ds['hinh'])?>"  alt="" onerror="erroimg(this)" > 
                             
                        </div>
                         
                    </td>
                    <td>
                        <span><?=$ds['ngaysinh']?></span>
                    </td>

                    <td>
                        <?=$ds['email']?>
                    </td>
                    <td>
                        <?= $ds['diachi'] ?>
                    </td>
                </tr>
                <?php } ?>
        </tbody>
    </table>
    <a href="index.php?act=lopct&idlop=<?= $_GET['idlop'] ?>&excel=true"><div class="btn btn btn-outline-primary"> <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" fill="#384E85" viewBox="0 0 24 24" width="1em"><path class="uim-primary" d="M19,9H14a2,2,0,0,1-2-2V2Z"></path><path class="uim-tertiary" d="M14,9a2,2,0,0,1-2-2V2H6A3,3,0,0,0,3,5V19a3,3,0,0,0,3,3H16a3,3,0,0,0,3-3V9Z"></path><path class="uim-primary" d="M20.707,15.29346l-3-3A.99989.99989,0,1,0,16.293,13.70752l1.293,1.293H12a1,1,0,0,0,0,2h5.58594l-1.293,1.293A.99989.99989,0,1,0,17.707,19.70752l3-3A.99962.99962,0,0,0,20.707,15.29346Z"></path></svg> Xuất excel</div></a>
</div>
            <?php }else echo "URL SAI!"?>