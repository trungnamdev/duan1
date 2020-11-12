<?php
session_start();
ob_start();
require_once "../sinhvien/models/index.php";
require_once "../system/share.php";
require_once "../system/conn.php";
if(isset($_SESSION['iddn']) && $_SESSION['role'] == 1){
if(isset($_GET['act'])){
   $act = $_GET['act'];
}else{
   $act = "home";
}

switch ($act) {
   case 'home':
      $view = "../giaovien/views/home.php";
      require_once "../giaovien/views/layout.php";
   break;

   case 'baitap':
      $view = "../giaovien/views/baitap.php";
      require_once "../giaovien/views/layout.php";
      break;

   case 'thongbao':
      $view = "../giaovien/views/thongbao.php";
      require_once "../giaovien/views/layout.php";
      break;
   case 'chat':
      $view = "../giaovien/views/nhantin.php";
      require_once "../giaovien/views/layout.php";
   break;
   
   case 'lop':
      $view = "../giaovien/views/lophoc.php";
      require_once "../giaovien/views/layout.php";
      break;
   }
}else{
      header('Location: ../index.php');
}
?>