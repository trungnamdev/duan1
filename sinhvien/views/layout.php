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
    <script src="./system/icons.js"></script>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <!-- end bootstrap -->
    <title>Sinh Viên</title>
</head>
<body>
<div class="menu">
    <a href="index.php?act=baitap">Bài Tập</a>
    <a href="index.php?act=dkkh">đăng ký khóa học</a>
    <a href="index.php?act=thongbao">thongbao</a>
</div>


<!-- tiêu dề đặt trên đầu mỗi trang view cần tiêu đề -->
<div class="tieude"></div> 
<!-- bình chia layout xong khóa lại ai cần thì copy vào page mình nha -->


<div class="noidung">
<?php require_once $view?>
</div>

</body>
</html>