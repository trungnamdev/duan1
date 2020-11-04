<?php 
if(isset($_GET['act'])){
   $act = $_GET['act'];
}else{
   $act = "home";
}

switch ($act) {
   case 'home':
      $view = "../sinhvien/views/home.php";
      require_once "../sinhvien/views/layout.php";
      break;

}
?>