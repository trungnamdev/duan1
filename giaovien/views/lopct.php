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
            <th scope="col"></th>
            <th scope="col">Tên sinh viên</th>
            <th scope="col">Hình</th>
            <th scope="col">Ngày sinh</th>
            <th scope="col">Email</th>
        </tr>

        <tbody>
        <?php
            
             
            foreach ($dssvtheolop as $ds) { 
            ?>
                <tr>
                    <th scope="row"><input type="checkbox" name="chonbt" id=""></th>
                    <td><?=$ds['hoten']?></td>
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
                </tr>
                <?php } ?>
        </tbody>
    </table>

</div>
            <?php }else echo "URL SAI!"?>