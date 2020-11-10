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
$achome="";$acbt="";$acdkkh="";$actb="";$acbd=""; 
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
            header('Location: index.php');
         }
      }else{
         header('Location: index.php');
      }
   break;
   case 'dkkh':
      $acdkkh = "active";
      $khoahoc=khoahoc();
      $view = "../sinhvien/views/dkkh.php";
      require_once "../sinhvien/views/layout.php";
   break;
   case 'dkkh1':
      $idlop = $_POST['id'];
      $idsv=$_SESSION['iddn'];
      dkkh($idsv,$idlop);
   break;
   case 'thongbao':
      $actb = "active";
     $tb=thongbao();
      $arrtbjs = [];
      foreach($tb as $tb1){
         $arrtam = [$tb1['tdtb'],$tb1['noidung'],$tb1['hoten'],$tb1['ngaydang']];
         array_push($arrtbjs,$arrtam);
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
      if(isset($_GET['idbt'])&&isset($_POST['nop'])){
         $file = $_FILES['baitap'];
         $idbt = $_GET['idbt'];
         upfile($file);
         nopbai($file['name'],$idbt);
         header("Location: index.php?act=nopbaitap&idbt=$idbt");
      }else{
         header('Location: index.php');
      }
   break;
}
}}else{
      header('Location: ../index.php');
}
?>