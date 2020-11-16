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

switch ($act) {
   case 'home':
      $view = "../superus/views/khoahoc.php";
      require_once "../superus/views/layout.php";
   break;

   case 'khoahoc':
      $view = "../superus/views/khoahoc.php";
      require_once "../superus/views/layout.php";
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