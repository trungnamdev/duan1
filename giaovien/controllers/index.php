<?php
// if(isset($_SESSION['iddn']) && $_SESSION['role'] == 1){
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
}
// }else{
//       header('Location: ../index.php');
// }
?> 