<!-- chứa layout phan sinh vien -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- file riêng moi modun -->
    <link rel="stylesheet" href="views/css/style.css">
    
    <script src="views/js/dk1.js"></script>

    <!-- file dung chung cho 3 modun -->
    <script src="../system/jquery.js"></script>
    <script src="../system/jquery-ui.js"></script>
    <script src="../system/jsvali.js"></script>
    <script src="../system/icons.js"></script>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <!-- font awersome w3school -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>
    <!-- end bootstrap -->
    <!-- link swiper -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- end swiper -->
    <title>Sinh Viên</title>
</head>

<body>
    <div class="container-fluid h-100 p-0">
        <div class="sidebar">
            <div class="account text-light ml-4 mb-5">
                <img class="avatar mr-3" src="./views/img/avatar.jpg" alt="">
                <div class="info">
                    <strong>
                        <p class="mb-1"><?=$_SESSION['tdn']?></p>
                    </strong>
                    <span class="idsv">PS15313</span>
                </div>
            </div>
            <div class="menu m-3">
                <ul>
                    <a href="index.php?act=home"><li class="<?= $achome ?>">Tổng quan<img src="./views/img/tongquan.svg" alt=""></i></li></a>
                    <a href="index.php?act=baitap"><li class="<?= $acbt ?>">Bài Tập<img src="./views/img/baitap.svg" alt=""></li></a>
                    <a href="index.php?act=bangdiem"><li class="<?= $acbd ?>">Bảng điểm<img src="./views/img/bangdiem.svg" alt=""></li></a>
                    <a href="index.php?act=dkkh"><li class="<?= $acdkkh ?>">Khóa học<img src="./views/img/monhoc.svg" alt=""></li></a>
                    <a href="index.php?act=thongbao"><li class="<?= $actb ?>">Thông báo<img src="./views/img/thongbao.svg" alt=""></li></a>
                    <a href="index.php?act=thongtincn"><li>Thông tin cá nhân<img src="./views/img/thongbao.svg" alt=""></li></a>
                </ul>
            </div>
        </div>
        <div class="box-right">
            <!-- tiêu dề đặt trên đầu mỗi trang view cần tiêu đề -->
            <!-- <div class="header-box">
                <div class="tieude h1">Tổng quan</div> -->
                <!-- Tùy trang mới dùng đến option-box -->
                <!-- <div class="option-box">
                    <a href="#" class="active">Tất cả</a>
                    <a href="#">Đã nộp</a>
                    <a href="#">Chưa nộp</a>
                </div> -->
            <!-- </div> -->

            <!-- bình chia layout xong khóa lại ai cần thì copy vào page mình nha -->


            <div class="noidung">
                <?php require_once $view?>
            </div>
        </div>



    </div>
</body>

</html>