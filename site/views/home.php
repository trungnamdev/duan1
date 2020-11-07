<!-- từ home dẫn qua trang dang nhap , tu dang nhap kiem tra dan sang cac trang tuong ung -->
<!-- <a href="index.php?act=dangnhap">dangnhap</a> -->
<style>
    .container-fluid {
        background-image: url(./site/views/img/bg.jpg);
        background-size: cover;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .container-fluid img {
        margin-left: 50%;
        width: 50%;
        transform: translateX(-50%);
    }

    .btn {
        background-color: #384E85;
        border-color: #384E85;
    }

    .btn:hover {
        background-color: #0D0E2E;
        border-color: #0D0E2E;
    }
      
</style>
<div class="container-fluid p-0">
<form class="col-4 shadow pl-5 pr-5 pt-4 pb-5 bg-white rounded" method="post">
    <img src="./site/views/img/logo.png" class="mb-3" alt="">
  <div class="form-group">
    <label for="exampleInputEmail1">Tên đăng nhập</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="us">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Mật khẩu</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="pass">
  </div>

  <button type="submit" class="btn btn-primary" name="dn">Đăng nhập</button>
  <?= $mess ?>
</form>

</div>