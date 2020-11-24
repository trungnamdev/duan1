<?php
session_start();
ob_start();
require_once "./site/models/index.php";
require_once "./system/share.php";
require_once "./system/conn.php";

if (isset($_GET['act'])) {
    $act = $_GET['act'];
} else {
    $act = "home";
}

switch ($act) {
    case 'home':
        $mess = "";
        if(isset($_POST['dn'])){
            $us = xoatag(trim($_POST['us'],"'"));
            $pass = xoatag(trim($_POST['pass'],"'"));
            $check = checkdangnhap($us);
            if(is_array($check)){
                $verify=password_verify($pass,$check['pass']);
                 
                if($verify){
                 $_SESSION['iddn'] = $check['id'];
                 $_SESSION['tdn'] = $check['hoten'];
                 $_SESSION['role'] = $check['chucvu'];
                 $_SESSION['hinhdn'] = $check['hinh'];
                 switch ($_SESSION['role']) {
                    case '0':
                        $_SESSION['tien'] = $check['tien'];
                        header('Location: ./sinhvien/index.php');
                        break;
                    case '1':
                        header('Location: ./giaovien/index.php');
                        break;
                    case '2':
                        header('Location: ./superus/index.php');
                    break;
                }
                }else $mess= "<p class='text-danger mt-2'>Đăng nhập không thành công</p>"; 
            }else $mess= "<p class='text-danger mt-2'>Đăng nhập không thành công</p>";
        }
        $view = "./site/views/home.php";
        require_once "./site/views/layout.php";
        break;
}

?>