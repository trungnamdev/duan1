<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../system/js/tinymce.min.js"></script>
    <!-- end bootstrap -->
    <script src="../system/js/jquery.js"></script>
    <script src="../system/js/jquery-ui.js"></script>
    <script src="../system/js/jsvali.js"></script>
    <script src="../system/js/icons.js"></script>
    <script src="views/js/dk1.js"></script>
    <!-- bootstrap -->
    <script src="../system/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../system/css/bootstrap.min.css">
    <script src="../system/js/bootstrap.bundle.min.js"></script>
    <!-- font awersome w3school -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>

    <!-- link swiper -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- end swiper -->
    <!-- file dung chung cho 3 modun -->
    <link rel="stylesheet" href="../system/css/stylelayout.css">
    <link rel="stylesheet" href="../system/css/jquery-ui.css">
    <!-- file riêng moi modun -->
    <link rel="stylesheet" href="views/css/style.css">
    <title>GIÁO VIÊN</title>
</head>
<!-- oncontextmenu="return false" ondragstart="return false" onselectstart="return false" -->

<body>
    <div class="container-fluid h-100 p-0">
        <div class="sidebar">
            <div class="account text-light pl-4 pr-4 mb-5">
                <a href="index.php?act=thongtincn">
                    <img class="avatar mr-3" src="<?= showfile($_SESSION['hinhdn']) ?>" onerror="erroimg(this)">
                    <div class="info">
                        <strong>
                            <p class="mb-1"><?=$_SESSION['tdn']?></p>
                        </strong>
                        <span class="idsv">GV<?= $_SESSION['iddn'] ?></span>
                    </div>
                </a>
                <a href="index.php?act=dangxuat" data-toggle="tooltip" data-placement="bottom" title="Đăng xuất">
                    <div class="logout">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M21.207 11.2934L18.207 8.2934C18.1144 8.1996 18.0041 8.12504 17.8825 8.07401C17.761 8.02299 17.6305 7.99651 17.4987 7.9961C17.3668 7.99569 17.2362 8.02135 17.1143 8.07161C16.9925 8.12188 16.8817 8.19575 16.7885 8.28897C16.6953 8.38219 16.6214 8.49293 16.5712 8.61482C16.5209 8.7367 16.4952 8.86732 16.4957 8.99915C16.4961 9.13099 16.5226 9.26144 16.5736 9.383C16.6246 9.50456 16.6992 9.61483 16.793 9.70746L18.086 11.0005H12.5C12.2348 11.0005 11.9804 11.1058 11.7929 11.2934C11.6054 11.4809 11.5 11.7352 11.5 12.0005C11.5 12.2657 11.6054 12.52 11.7929 12.7076C11.9804 12.8951 12.2348 13.0005 12.5 13.0005H18.0859L16.7929 14.2935C16.6991 14.3861 16.6246 14.4964 16.5736 14.6179C16.5225 14.7395 16.496 14.87 16.4956 15.0018C16.4952 15.1336 16.5209 15.2642 16.5711 15.3861C16.6214 15.508 16.6953 15.6187 16.7885 15.712C16.8817 15.8052 16.9925 15.879 17.1144 15.9293C17.2362 15.9796 17.3669 16.0052 17.4987 16.0048C17.6305 16.0044 17.761 15.9779 17.8825 15.9269C18.0041 15.8758 18.1144 15.8013 18.207 15.7075L21.207 12.7075C21.2999 12.6146 21.3736 12.5044 21.4238 12.3831C21.4741 12.2618 21.5 12.1318 21.5 12.0004C21.5 11.8691 21.4741 11.7391 21.4238 11.6178C21.3736 11.4965 21.2999 11.3862 21.207 11.2934V11.2934Z"
                                fill="#6563FF" />
                            <path
                                d="M12.5 13.0005C12.2348 13.0005 11.9804 12.8951 11.7929 12.7076C11.6054 12.5201 11.5 12.2657 11.5 12.0005C11.5 11.7353 11.6054 11.4809 11.7929 11.2934C11.9804 11.1058 12.2348 11.0005 12.5 11.0005H16.5V5C16.4991 4.20462 16.1828 3.44206 15.6204 2.87964C15.0579 2.31722 14.2954 2.00087 13.5 2H5.5C4.70462 2.00087 3.94206 2.31722 3.37964 2.87964C2.81722 3.44206 2.50087 4.20462 2.5 5V19C2.50087 19.7954 2.81722 20.5579 3.37964 21.1204C3.94206 21.6828 4.70462 21.9991 5.5 22H13.5C14.2954 21.9991 15.0579 21.6828 15.6204 21.1204C16.1828 20.5579 16.4991 19.7954 16.5 19V13.0005H12.5Z"
                                fill="#A2A1FF" />
                        </svg>

                    </div>
                </a>
            </div>
            <div class="menu m-3">
                <ul>
                    <a href="index.php?act=home">
                        <li class="<?= $achome ?>">Tổng quan<img src="../system/img/tongquan.svg" alt=""></i></li>
                    </a>
                    <a href="index.php?act=baitap">
                        <li class="<?= $acbt ?>">Bài Tập<img src="../system/img/baitap.svg" alt=""></li>
                    </a>
                    <a href="index.php?act=lop">
                        <li class="<?= $aclop ?>">Lớp học<img src="../system/img/monhoc.svg" alt=""></li>
                    </a>
                    <a href="index.php?act=thongbao">
                        <li class="<?= $actb ?>">Thông báo<img src="../system/img/thongbao.svg" alt=""></li>
                    </a>
                    <a href="index.php?act=chat">
                        <li class="<?= $chat ?>">Nhắn tin<img src="../system/img/chat.svg" alt=""></li>
                    </a>
                </ul>
            </div>
        </div>
    </a>

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
            <?php require_once $view ?>
        </div>
    </div>
    </div>
</body>

</html>