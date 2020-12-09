 <div class="header-box">
     <div class="tieude h1">ĐĂNG KÝ KHÓA HỌC</div>
     <div class="option-box">
         <a href="index.php?act=dkkh" class="<?= $all ?>">Tất cả</a>
         <a href="index.php?act=dkkh&ht=dadk" class="<?= $dadk ?>">Đã đăng ký</a>
         <a href="index.php?act=dkkh&ht=nodk" class="<?= $nodk ?>">Chưa đăng ký</a>
         <a class="active float-right" id="tienconlai">Số tiền hiện có : <?= chuyenso($_SESSION['tien']) ?> VNĐ</a>
     </div>
 </div>
 <div class="khoahoc ">
     <table id="chuakh">
         <?php
            foreach ($khoahoc as $kh) {
                $idkhoa =$kh['id'];
                $tenchude = gettenchude($kh['chude']);
                $idsv = $_SESSION['iddn'];
                $checksv = xetkhoahoc($idkhoa, $idsv);
                $lophoc = lophoc($idkhoa);
                $demlh = demlophoc($idkhoa);
                
            ?>
                 <tr class="boxkhoahoc ">
                     <td class="imagekh  p-3">
                         <img src="<?= showfile($kh['hinh']) ?>" onerror="erroimg(this)">
                     </td>
                     <td class="ttkhoahoc py-3 pr-5">
                         <a href="index.php?act=ctkh&idkh=<?=$idkhoa?>"><p class="h4 title"><?= $kh['tenkhoa'] ?></p></a>
                         <p class="my-1 h6">
                             <?= $tenchude['tenchude'] ?></p>
                         <p class="mota gioihanchu">
                             <?= $kh['mota'] ?>
                         </p>
                     </td>
                     <td class="gia">
                        <p class="my-2 px-1"> <i class='far fa-file-alt' style='font-size:20px; color:gray'></i> <?= $demlh['tong'] ?> Lớp học <span class="float-right mr-5 font-weight-bold"><?= chuyenso($kh['giatien']) ?> VND</span></p>
                         <p>
                         <?php
                         if (is_array($checksv)) { 
                            $gv = gvkhoahoc($checksv['idlop']); ?>    
                                <select id="lophoc" class="form-control col-10" disabled>     
                                <option><?= $checksv['tenlop'] ?> - <?= $gv['hoten'] ?></option>
                                 <?php }else{ ?>
                                    <select id="lophoc" class="form-control col-10">  
                                   <?php
                                   $demlop=0;
                                   foreach ($lophoc as $lophoc) {
                                        $idgv = $lophoc['id'];
                                        $gv = gvkhoahoc($idgv);
                                        echo ' <option value="' . $lophoc['id'] . '">' . $lophoc['tenlop'] . '-' . $gv['hoten'] . '</option>';
                                    $demlop++;
                                    }} ?>
                             </select>
                         </p>
                         <?php if (is_array($checksv)) {?>
                            <button type="button" disabled class="btn btn-success col-10">Đã Đăng Ký</button>
                        <?php } else {
                            if ($demlop!=0) {
                                echo ' <button type="button" class="btn btn-success dkkh col-10">Đăng Ký</button>';
                            } else {
                                echo ' <button type="button" disabled class="btn btn-success dkkh col-10">Không có lớp học</button>';
                            }
                            
                            ?>
                           
                        <?php }?>
            
                     </td>
                 </tr>
           
         <?php }?>
     </table>
 </div>
 <script>
 let ht = <?= json_encode($ht)?>;
 </script>