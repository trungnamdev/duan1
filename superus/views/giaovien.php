<div class="header-box">
    <div class="tieude h1">Quản lí Giáo Viên</div>
</div>
<div class="khoahoc">
<div class="addnew rounded-circle Regular shadow">
    
       <a href="index.php?act=addgiaovien&cn=them"> <i class="fas fa-plus"></i></a>
        
    </div>
    <table class="table">


        <tbody>
            <tr class="thead-light text-center">
                <th scope="col">Thông tin</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Liên Hệ</th>
                <th scope="col" class="text-center">Sửa</th>
                <th scope="col" class="text-center">Xóa</th>
            </tr>
        </tbody>
        <tbody>
        <?php foreach($sv as $sv){?>

            <tr>
                <td scope="row">
                    <strong>Tên GV : </strong><?= $sv['hoten'] ?><br>
                    <strong>Ngày sinh : </strong><?= $sv['ngaysinh'] ?><br>
                    <strong>Địa chỉ : </strong><?= $sv['diachi'] ?><br>
                    <strong>Giới tính : </strong><?= chuyendoi01($sv['sex'],"0","Nữ","Nam") ?>
                </td>
                <td class="text-center"><img src="<?= showfile($sv['hinh']) ?>" alt="" class="img-thumbnail" width ="80px" onerror="erroimg(this)"></td>
                <td>
                    <?= $sv['email'] ?>
                    <br>
                    <?= $sv['sdt'] ?>
                </td>
                <td class="text-center">
                    <a href="index.php?act=addgiaovien&cn=sua&id=<?= $sv['id'] ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#384E85" viewBox="0 0 24 24" width="1em"><path class="uim-tertiary" d="M7.24268,22.0003H3a.99974.99974,0,0,1-1-1V16.75713a.99928.99928,0,0,1,.293-.707L16.05273,2.29326a.99965.99965,0,0,1,1.41407,0L21.707,6.53252a.99962.99962,0,0,1,0,1.41406L7.94971,21.70733A1.00014,1.00014,0,0,1,7.24268,22.0003Z"></path><path class="uim-primary" d="M21.707,6.53252,17.4668,2.29326a.99965.99965,0,0,0-1.41407,0L12.5155,5.83013l5.6543,5.65308L21.707,7.94658A.99962.99962,0,0,0,21.707,6.53252Z"></path></svg></a>
                </td>
                
                <td class="text-center">
                    <a href="index.php?act=giaovien&xoa=<?= $sv['id'] ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#384E85" enable-background="new 0 0 24 24" viewBox="0 0 24 24" width="1em"><path class="uim-tertiary" d="M20 6h-4V5c-.00183-1.65613-1.34387-2.99817-3-3h-2C9.34387 2.00183 8.00183 3.34387 8 5v1H4C3.44769 6 3 6.44769 3 7s.44769 1 1 1h5 6c.00018 0 .00037 0 .00055 0H20c.55231 0 1-.44769 1-1S20.55231 6 20 6zM10 6V5c.00055-.55206.44794-.99945 1-1h2c.55206.00055.99945.44794 1 1v1H10zM10 10c-.55231 0-1 .44769-1 1v6c0 .00018 0 .00037 0 .00055C9.00012 17.55267 9.44788 18.00012 10 18c.00018 0 .00037 0 .00055 0 .55212-.00012.99957-.44788.99945-1v-6C11 10.44769 10.55231 10 10 10zM14 10c-.55231 0-1 .44769-1 1v6c0 .00018 0 .00037 0 .00055.00012.55212.44788.99957 1 .99945.00018 0 .00037 0 .00055 0 .55212-.00012.99957-.44788.99945-1v-6C15 10.44769 14.55231 10 14 10z"></path><path class="uim-primary" d="M5,8v11c0.00183,1.65613,1.34387,2.99817,3,3h8c1.65613-0.00183,2.99817-1.34387,3-3V8H5z M11,17c0.00012,0.55212-0.44733,0.99988-0.99945,1C10.00037,18,10.00018,18,10,18c-0.55212,0.00012-0.99988-0.44733-1-0.99945C9,17.00037,9,17.00018,9,17v-6c0-0.55231,0.44769-1,1-1s1,0.44769,1,1V17z M15,17c0.00012,0.55212-0.44733,0.99988-0.99945,1C14.00037,18,14.00018,18,14,18c-0.55212,0.00012-0.99988-0.44733-1-0.99945c0-0.00018,0-0.00037,0-0.00055v-6c0-0.55231,0.44769-1,1-1s1,0.44769,1,1V17z"></path></svg>
                    </a>
                </td>
            </tr>
        <?php }?>

        </tbody>
    </table>
</div>