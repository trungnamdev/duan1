<?php
session_start();
ob_start();
require_once "../giaovien/models/index.php";
require_once "../system/share.php";
require_once "../system/conn.php";
if(isset($_SESSION['iddn']) && $_SESSION['role'] == 1){
if(isset($_GET['act'])){
   $act = $_GET['act'];
}else{
   $act = "home";
}
$achome="";$acbt="";$aclop="";
switch ($act) {
   case 'home':
      $achome="active";
      $idlop = gv_getidlop();
      $lopdangday = GV_getlopdangday(); 
      $tb=thongbao();
      $view = "../giaovien/views/home.php";
      require_once "../giaovien/views/layout.php";
   break;

   case 'baitap':
      $acbt="active";
      $view = "../giaovien/views/baitap.php";
      require_once "../giaovien/views/layout.php";
      break;

   case 'chambai':
      if(isset($_GET['id'])) {
         $idbt = $_GET['id'];
         $danhsach = getDsLopByBt($idbt);
         $baitap_list = gv_getBaitapByIDBT($idbt);
      }
      $acbt="active";
      $view = "../giaovien/views/chambai.php";
      require_once "../giaovien/views/layout.php";
      break;

   case 'thongbao':
      $actb="active";
      $tb=thongbao();
      $arrtbjs = [];
      foreach($tb as $tb1){
         $arrtam = [$tb1['tdtb'],$tb1['noidung'],$tb1['hoten'],$tb1['ngaydang']];
         array_push($arrtbjs,$arrtam);
      }
      if (isset($_GET['idtb'])) {
         $idtb=$_GET['idtb'];
         $tbct=thongbaoct($idtb);
      }
      $view = "../giaovien/views/thongbao.php";
      require_once "../giaovien/views/layout.php";
      break;
      case 'chat':
         $chat = "active";
         $alllop =  GV_getlopdangday();
         $view = "../giaovien/views/nhantin.php";
         require_once "../giaovien/views/layout.php";
      break;
   
   case 'lop':
      $aclop="active";
      $lopdangday = GV_getlopdangday(); 
      $view = "../giaovien/views/lophoc.php";
      require_once "../giaovien/views/layout.php";
      break;

   case 'dangxuat':
      unset($_SESSION['role']);
      unset($_SESSION['iddn']);
      unset($_SESSION['tdn']);
      unset($_SESSION['hinhdn']);
      header('location: index.php');
      break;
   }

}else{
      header('Location: ../index.php');
}
?>