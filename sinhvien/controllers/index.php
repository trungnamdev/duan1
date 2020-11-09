<?php 
session_start();
ob_start();
require_once "../sinhvien/models/index.php";
require_once "../system/share.php";
require_once "../system/conn.php";
// if(isset($_SESSION['iddn']) && $_SESSION['role'] == 0){
if(isset($_GET['act'])){
   $act = $_GET['act'];
}else{
   $act = "home";
}
$achome="";$acbt="";$acdkkh="";$actb="";$acbd=""; 
switch ($act) {
   case 'home':
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
            $view = "../sinhvien/views/nopbaitap.php";
            require_once "../sinhvien/views/layout.php";
         }
      }

   break;
   case 'dkkh':
      $acdkkh = "active";
      $view = "../sinhvien/views/dkkh.php";
      require_once "../sinhvien/views/layout.php";
   break;
   case 'thongbao':
      $actb = "active";
      $view = "../sinhvien/views/thongbao.php";
      require_once "../sinhvien/views/layout.php";
   break;
   case 'bangdiem':
      $acbd = "active";
      $view = "../sinhvien/views/bangdiem.php";
      require_once "../sinhvien/views/layout.php";
   break;
   case 'thongtincn':
      $view = "../sinhvien/views/ttcn.php";
      require_once "../sinhvien/views/layout.php";
   break;
   case 'nhantin':
      $view = "../sinhvien/views/nhantin.php";
      require_once "../sinhvien/views/layout.php";
   break;
}
// }else{
//       header('Location: ../index.php');
// }
?>