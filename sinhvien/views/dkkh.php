 <div class="header-box">
    <div class="tieude h1">ĐĂNG KÝ KHÓA HỌC</div>
        <div class="option-box">
                    <a href="#" class="active">Tất cả</a>
                    <a href="#">Đã đăng ký</a>
                    <a href="#">Chưa đăng ký</a>
                </div>
</div>
<div class="khoahoc "> 
    <table >
        <?php
        foreach ($khoahoc as $kh) {
        $idkhoa=$kh['id'];
        $lophoc=lophoc($idkhoa);
            ?>
        <tr class="boxkhoahoc ">
            <td class="imagekh  p-3"> 
                <img src="./views/img/html.jpg" alt=""> 
            </td> 
            <td class="ttkhoahoc py-3 ">
                <p class="h4 title"><?=$kh['tenkhoa']?></p>
                <p class="my-1 h6">
                    GV: Mr.Thanh</p>
                <p class="mota">
                    Bạn sẽ được đào tạo bài bản từ chuyên gia giỏi và tham gia dự án thực tế. Giúp tích lũy kinh nghiệm, có sản phẩm và đi làm ngay sau khóa học. Thực hành nhiều. Giới thiệu việc làm. Học kinh nghiệm. Khóa học: Thực chiến trên dự án, Tích luỹ kinh nghiệm.

                </p>
            </td>
            <td class="trong"></td>
            <td class="gia">
           
            <p class="my-2 px-1"> <i class='far fa-file-alt' style='font-size:20px; color:gray'></i> 31 Buổi học</p>
            <p> <i class='fas fa-chalkboard-teacher' style='font-size:18px;color:gray'></i>
         
            <select id="lophoc" class="form-control col-9">
                    <?php
                foreach ($lophoc as $lophoc) {
                    $idgv=$lophoc['id'];
                    $gv=gvkhoahoc($idgv);
                    echo ' <option value="'.$lophoc['id'].'">'.$lophoc['tenlop'].'</option>';
                }
                ?> 
                       
                    </select>
        </p>
            <button type="button" class="btn btn-success dkkh" >Đăng Ký</button>
            </td>
        </tr>
        
        <?php   
        }
        ?>
        <script src="./views/js/dkkh.js"></script>
        <!-- <tr class="boxkhoahoc ">
            <td class="imagekh  p-3"> 
                <img src="./views/img/html.jpg" alt=""> 
            </td>
            <td class="ttkhoahoc py-3 ">
                <p class="h4 title">Lập Trình PHP Cơ Bản</p>
                <p class="my-1 h6">GV: Mr.Thanh</p>
                <p class="mota">
                    Bạn sẽ được đào tạo bài bản từ chuyên gia giỏi và tham gia dự án thực tế. Giúp tích lũy kinh nghiệm, có sản phẩm và đi làm ngay sau khóa học. Thực hành nhiều. Giới thiệu việc làm. Học kinh nghiệm. Khóa học: Thực chiến trên dự án, Tích luỹ kinh nghiệm.

                </p>
            </td>
            <td class="trong"></td>
            <td class="gia">
           
            <p class="my-2 px-1"> <i class='far fa-file-alt' style='font-size:20px; color:gray'></i> 31 Buổi học</p>
            <p> <i class='fas fa-chalkboard-teacher' style='font-size:18px;color:gray'></i> Mr.Thanh Độ</p>
            <button type="button" class="btn btn-success">Đăng Ký</button>
            </td>
        </tr>
        <tr class="boxkhoahoc ">
            <td class="imagekh  p-3"> 
                <img src="./views/img/html.jpg" alt=""> 
            </td>
            <td class="ttkhoahoc py-3 ">
                <p class="h4 title">Lập Trình PHP Cơ Bản</p>
                <p class="my-1 h6">GV: Mr.Thanh</p>
                <p class="mota">
                    Bạn sẽ được đào tạo bài bản từ chuyên gia giỏi và tham gia dự án thực tế. Giúp tích lũy kinh nghiệm, có sản phẩm và đi làm ngay sau khóa học. Thực hành nhiều. Giới thiệu việc làm. Học kinh nghiệm. Khóa học: Thực chiến trên dự án, Tích luỹ kinh nghiệm.

                </p>
            </td>
            <td class="trong"></td>
            <td class="gia">
           
            <p class="my-2 px-1"> <i class='far fa-file-alt' style='font-size:20px; color:gray'></i> 31 Buổi học</p>
            <p> <i class='fas fa-chalkboard-teacher' style='font-size:18px;color:gray'></i> Mr.Thanh Độ</p>
            <button type="button" class="btn btn-success">Đăng Ký</button>
            </td>
          
        </tr>  -->
</table> 
</div>