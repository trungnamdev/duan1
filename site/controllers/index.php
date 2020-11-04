<!-- sschucvu = session[chucvu] sau này  -->
<?php
if (isset($_GET['act'])) {
    $act = $_GET['act'];
} else {
    $act = "home";
}

switch ($act) {
    case 'home':
        $view = "./site/views/home.php";
        require_once "./site/views/layout.php";
        break;
    case 'dangnhap':
        // tren đay xu ly form post va chuyen vào biến chucvu
        if (isset($_GET['chucvu'])) {
            $chucvu = $_GET['chucvu'];
            switch ($chucvu) {
                case '0':
                    header('Location: ./sinhvien/index.php');
                    break;
                case '1':
                    header('Location: ./giaovien/index.php');
                    break;
                case '2':
                    header('Location: ./superus/index.php');
                    break;
            }
        }else{
        $view = "./site/views/dangnhap.php";
        require_once "./site/views/layout.php";
        break;
    }

    default:
        # code...
        break;
}

?>