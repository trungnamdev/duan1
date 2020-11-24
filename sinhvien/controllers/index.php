<?php 
session_start();
ob_start();
require_once "../sinhvien/models/index.php";
require_once "../system/share.php";
require_once "../system/conn.php";
if (isset($_SESSION['iddn'])) {
if(isset($_SESSION['iddn']) && $_SESSION['role'] == 0){
if(isset($_GET['act'])){
   $act = $_GET['act'];
}else{
   $act = "home";
}
$achome="";$acbt="";$acdkkh="";$actb="";$acbd="";$chat="";
switch ($act) {
   case 'home':
      $idsv=$_SESSION['iddn'];
      $ttsv=thongtinsv($idsv);
      $tb=thongbao();
      $achome = "active";
      $view = "../sinhvien/views/home.php";
      require_once "../sinhvien/views/layout.php";
   break;
   case 'baitap':
      $all="";
      $danop="";
      $nonop="";
      if (isset($_GET['sx'])) {
         $sx=$_GET['sx'];
      } else {
         $sx="all";
      }
      
      $checkbaitap = thongtinsv($_SESSION['iddn']); 
      
      switch ($sx) {
         case 'all':
            $all="active";
            $allbaitap = thongtinsv($_SESSION['iddn']); 

            break;
         case 'done':
            $danop="active";
            $allbaitap = btdanop();
            break;
         case 'not':
            $nonop="active";
            $allbaitap = btchuanop(); 
            break;
      }
      // Lấy all bài tập theo ID lớp 

   
      $btdanop = 0;
      $btchuanop = 0;
      foreach ($checkbaitap as $allbt) {  
         // Đếm bài tập đã nộp
         $checkbt = checknopbai($allbt['idbaitap']); 
         if(is_array($checkbt) > 0 ) $btdanop +=1 ;
         if(is_array($checkbt) == 0)   $btchuanop +=1;
            
      }
    // Đếm bài tập chưa nộp
      $acbt = "active";
      $view = "../sinhvien/views/baitap.php";
      require_once "../sinhvien/views/layout.php";
   break;
   case 'nopbaitap':
      $acbt = "active";
      if(isset($_GET['idbt'])){
         $idbt = $_GET['idbt'];
         $arrbt=nopbaitap($idbt);
         if(is_array($arrbt)){
            $gv = ttgvlop($arrbt['idlop']);
            $nopbai = checknopbai($idbt);
            $view = "../sinhvien/views/nopbaitap.php";
            require_once "../sinhvien/views/layout.php";
         }else{
            header('Location:index.php');
         }
      }else{
         header('Location:index.php');
      }
   break;
   case 'dkkh':
      $id=$_SESSION['iddn'];
      $all="";
      $dadk="";
      $nodk="";
      if (isset($_GET['ht'])) {
         $ht=$_GET['ht'];
      } else {
         $ht="all";
      }
      switch ($ht) {
         case 'all':
            $all="active";
            $khoahoc=khoahoc();
            break;
         case 'dadk':
            $dadk="active";
            $khoahoc=khoahocdadk();
            break;
         case 'nodk':
            $nodk="active";
            $khoahoc=khoahocchuadk();
            break;
      }
      $acdkkh = "active";
      
      $view = "../sinhvien/views/dkkh.php";
      require_once "../sinhvien/views/layout.php";
   break;
   case 'dkkh1':
      if (isset($_POST['ht'])) {
         $ht=$_POST['ht'];
      } else {
         $ht="all";
      }
      $idlop = $_POST['id'];
      $idsv=$_SESSION['iddn'];
      dkkh($idsv,$idlop);
      switch ($ht) {
         case 'all':
            $all="active";
            $khoahoc=khoahoc();
            break;
         case 'dadk':
            $dadk="active";
            $khoahoc=khoahocdadk();
            break;
         case 'nodk':
            $nodk="active";
            $khoahoc=khoahocchuadk();
            break;
      }
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
                  <p class="h4 title"><?= $kh['tenkhoa'] ?></p>
                  <p class="my-1 h6">
                      <?= $tenchude['tenchude'] ?></p>
                  <p class="mota">
                      <?= $kh['mota'] ?>
                  </p>
              </td>
              <td class="gia">
                 <p class="my-2 px-1"> <i class='far fa-file-alt' style='font-size:20px; color:gray'></i> <?= $demlh['tong'] ?> Lớp học</p>
                  <p>
                  <?php
                  if (is_array($checksv)) { 
                     $gv = gvkhoahoc($checksv['idlop']); ?>    
                         <select id="lophoc" class="form-control col-10" disabled>     
                         <option><?= $checksv['tenlop'] ?> - <?= $gv['hoten'] ?></option>
                          <?php }else{ ?>
                             <select id="lophoc" class="form-control col-10">  
                            <?php foreach ($lophoc as $lophoc) {
                                 $idgv = $lophoc['id'];
                                 $gv = gvkhoahoc($idgv);
                                 echo ' <option value="' . $lophoc['id'] . '">' . $lophoc['tenlop'] . '-' . $gv['hoten'] . '</option>';
                             }} ?>
                      </select>
                  </p>
                  <?php if (is_array($checksv)) {?>
                     <button type="button" disabled class="btn btn-success col-10">Đã Đăng Ký</button>
                 <?php } else { ?>
                     <button type="button" class="btn btn-success dkkh col-10">Đăng Ký</button>
                 <?php }?>
     
              </td>
          </tr>
    
  <?php }
   break;
   case 'thongbao':
      $actb = "active";
     $tb=thongbao();
      $arrtbjs = [];
      foreach($tb as $tb1){
         $arrtam = [$tb1['tdtb'],$tb1['noidung'],$tb1['hoten'],$tb1['ngaydang']];
         array_push($arrtbjs,$arrtam);
      }
      if (isset($_GET['idtb'])) {
         $idtb=$_GET['idtb'];
         
      }
      $view = "../sinhvien/views/thongbao.php";
      require_once "../sinhvien/views/layout.php";
   break;
   case 'bangdiem':
      $acbd = "active";
      $view = "../sinhvien/views/bangdiem.php";
      require_once "../sinhvien/views/layout.php";
   break;
   case 'thongtincn':
      $thongtin = thongtinsvtomtat($_SESSION['iddn']);
      $view = "../sinhvien/views/ttcn.php";
      require_once "../sinhvien/views/layout.php";
   break;
   case 'nhantin':
      $view = "../sinhvien/views/nhantin.php";
      require_once "../sinhvien/views/layout.php";
   break;
   case 'noplaibt':
      if(isset($_GET['idbt'])&&isset($_POST['nop'])){
         $file = $_FILES['baitap'];
         $idbt = $_GET['idbt'];
         upfile($file);
         noplaibt($file['name'],$idbt);
         header("Location: index.php?act=nopbaitap&idbt=$idbt");
      }else{
         header('Location: index.php');
      } 
   break;
   case 'nopbai':
      if(isset($_GET['idbt'])&& isset($_POST['nop'])){
         $file = $_FILES['baitap']; 
         $idbt = $_GET['idbt']; 
         
         if ($file['name'] != ''){
            upfile($file);
            nopbai($file['name'],$idbt); 
         } else echo "NO";
         header("Location: index.php?act=nopbaitap&idbt=$idbt");
      }else{
         header('Location: index.php');
      }
   break;
   case 'chat':
      $chat = "active";
      $alllop = getlopsvdanghoc();
      $view = "../sinhvien/views/nhantin.php";
      require_once "../sinhvien/views/layout.php";
   break;

   case 'dangxuat':
      unset($_SESSION['role']);
      unset($_SESSION['iddn']);
      unset($_SESSION['tdn']);
      unset($_SESSION['hinhdn']);
      header('location: index.php');
      break;
}
}}else{
      header('Location: ../index.php');
}
?>