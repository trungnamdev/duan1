<?php 
session_start();
ob_start();
require_once "../superus/models/index.php";
require_once "../system/share.php";
require_once "../system/conn.php";
if(isset($_SESSION['iddn']) && $_SESSION['role'] == 2){
if(isset($_GET['act'])){
   $act = $_GET['act'];
}else{
   $act = "home";
}
$achome="";$acbt="";$aclop="";$actb="";$chat="";
switch ($act) {
   case 'home':
      $tb = thongbao();
      $view = "../superus/views/tongquan.php";
      require_once "../superus/views/layout.php";
   break;
   case 'lop':
   $aclop="active";
   $alllh=alllophoc();
   $view = "../superus/views/lophoc.php";
   require_once "../superus/views/layout.php";
   break;
   case 'themlh':
      $dskhoa=allkhoahoc();
      $view = "../superus/views/lophoc_them.php";
      require_once "../superus/views/layout.php";
   break;
   case "themlh_":
      if(isset($_POST['tenlop'])&&isset($_POST['tenkhoa'])){
         $tenlop = xoatag($_POST['tenlop']);
         $tenkhoa = $_POST['tenkhoa'];
     
         themlophoc($tenlop,$tenkhoa);
         header('location: index.php?act=lop');
      }else{
         header('location: index.php?act=lop');
      }
   break;
   case 'khoahoc':
      $view = "../superus/views/khoahoc.php";
      require_once "../superus/views/layout.php";
      break;

   case 'thongbao':
      $thongbao_list = getThongBao();
      $view = "../superus/views/thongbao.php";
      require_once "../superus/views/layout.php";
      break;   

   case 'xoatb':
      if (isset($_GET['id'])&&$_GET['id']>0) {
         xoaThongBao($_GET['id']);
         header('location: index.php?act=thongbao');
      }
      break;
      case 'xoalh':
         if (isset($_GET['id'])&&$_GET['id']>0) {
            xoalophoc($_GET['id']);
            header('location: index.php?act=lop');
         }
         break;
   case 'suatb_':
      if(isset($_POST['tieude'])&&isset($_POST['noidung'])&&isset($_POST['idngdang'])){
         $tieude = xoatag($_POST['tieude']);
         $noidung = $_POST['noidung'];
         $idnguoidang = $_POST['idngdang'];
         $idthongbao = $_POST['idtb'];
         suathongbao($tieude, $noidung, $idnguoidang, $idthongbao);
      }
         header('location: index.php?act=thongbao');
      break;
   case 'sualh':
      if (isset($_GET['id'])&&$_GET['id']>0) {
         $lh = getMotlophoc($_GET['id']);
         $dskhoa=allkhoahoc();
         $view = "../superus/views/lophoc_sua.php";
         require_once "../superus/views/layout.php";
      }
      break;
   case 'sualh_' :
      if(isset($_POST['tenlop'])&&isset($_POST['tenkhoa'])){
         $tenlop = xoatag($_POST['tenlop']);
         $tenkhoa = $_POST['tenkhoa'];
         $idlop = $_POST['idlh'];
         sualh($tenlop, $tenkhoa, $idlop);
      }
         header('location: index.php?act=lop');
      break;
   
   case 'suatb':
      if (isset($_GET['id'])&&$_GET['id']>0) {
         $thongbao = getMotTb($_GET['id']);
         $view = "../superus/views/thongbao_sua.php";
         require_once "../superus/views/layout.php";
      }
      break;
      
   case 'themtb':
      $view = "../superus/views/thongbao_them.php";
      require_once "../superus/views/layout.php";
      break;   

   case 'themtb_':
      if(isset($_POST['tieude'])&&isset($_POST['noidung'])&&isset($_POST['idnguoidang'])){
         $tieude = xoatag($_POST['tieude']);
         $noidung = $_POST['noidung'];
         $idnguoidang = $_POST['idnguoidang'];
         themthongbao($tieude, $noidung, $idnguoidang);
         header('location: index.php?act=thongbao');
      }else
         header('location: index.php?act=thongbao');
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