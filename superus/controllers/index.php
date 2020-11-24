<?php 
session_start();
ob_start();
require_once "../superus/models/index.php";
require_once "../system/share.php";
require_once "../system/conn.php";
require_once "../system/PHPMailer-master/src/PHPMailer.php";
require_once "../system/PHPMailer-master/src/SMTP.php";
require_once "../system/PHPMailer-master/src/Exception.php";
require_once "../system/Classes/PHPExcel.php";
require_once "../system/luudammay/vendor/autoload.php";
require_once "../system/luudammay/config-cloud.php";
if(isset($_SESSION['iddn']) && $_SESSION['role'] == 2){
if(isset($_GET['act'])){
   $act = $_GET['act'];
}else{
   $act = "home";
}

$achome="";$acsv="";$acgv="";$aclop="";$ackh="";$accd="";$actb="";
switch ($act) {
   case 'home':
      $tb = thongbao();
      $view = "../superus/views/tongquan.php";
      require_once "../superus/views/layout.php";
   break;
   case 'lop':
   $aclop="active";
   $alllh=alllophoc();
   $view = "../superus/views/lophoc.php";
   require_once "../superus/views/layout.php";
   break;
   case 'themlh':
      $dskhoa=allkhoahoc();
      $allgv=allgv();
      $view = "../superus/views/lophoc_them.php";
      require_once "../superus/views/layout.php";
   break;
   
   case 'chude':
      $accd="active";
      $chude = getAllChuDe(); 
      $view = "../superus/views/chude.php";
      require_once "../superus/views/layout.php";
      break;

   case'xoacd':
      if(isset($_GET['idcd']) && $_GET['idcd'] > 0){
         deleteChuDe($_GET['idcd'] );
         header('location: index.php?act=chude');
      }else echo "Không xóa được!";
   break; 
   case 'formcd':
      $accd="active";
      $view = "../superus/views/chude_them_sua.php";
      require_once "../superus/views/layout.php";
      break;
    
   case 'themcd': 
      if(isset($_POST['themcd'])){ 
         $chude = $_POST['tencd']; 
         insertChuDe($chude);
         header('location: index.php?act=chude');
      }else echo "Không thêm được!";
      break;
   case 'suacd': 
      if(isset($_POST['suacd'])){ 
         $chude = $_POST['tencd']; 
         $idcd = $_POST['idcd'];  
         updateChuDe($chude,$idcd);
         header('location: index.php?act=chude');
      }else echo "Không Sửa được!";
   break;   

   case 'khoahoc':
      $ackh="active";
      $khoahoc = getAllKH();
      $view = "../superus/views/khoahoc.php";
      require_once "../superus/views/layout.php";
      break;
   case'xoakh':
         if(isset($_GET['idkh']) && $_GET['idkh'] > 0){
            deleteKhoaHoc($_GET['idkh'] );
            header('location: index.php?act=khoahoc');
         }else echo "Không xóa được!";
      break;  
   case 'formkh':
      $ackh="active";
      $chude = getAllChuDe();
      $view = "../superus/views/khoahoc_them_sua.php";
      require_once "../superus/views/layout.php";
      break;
    
   case 'themkh':
      
      if(isset($_POST['themkh'])){
         $mota = xoatag($_POST['mota']); 
         $chude = $_POST['chude'];
         $tenkh = xoatag($_POST['tenkh']);
         $imgkh=$_FILES['anhkh'];
         if($imgkh['name'] != ''){
         $tenhinh=upfile($imgkh);}else $tenhinh="";
         insertKhoaHoc($tenkh,$mota,$chude,$tenhinh);
         header('location: index.php?act=khoahoc');
      }else echo "Không thêm được!";
      break;
   case 'suakh':
      if(isset($_POST['suakh'])){ 
         $mota = xoatag($_POST['mota']); 
         $idkh = $_POST['idkh'];         
         $chude = $_POST['chude'];
         $tenkh = xoatag($_POST['tenkh']);
         $imgkh=$_FILES['anhkh'];
         if($imgkh['name'] != ''){
         $tenhinh=upfile($imgkh);}else{ $tenhinh ="";}
         updateKhoaHoc($tenkh,$mota,$chude,$tenhinh,$idkh,$idkh);
         header('location: index.php?act=khoahoc');
      }else echo "Không Sửa được!";
   break;   
   
   case 'thongbao':
      $thongbao_list = getThongBao();
      $view = "../superus/views/thongbao.php";
      require_once "../superus/views/layout.php";
      break;   

   case 'xoatb':
      if (isset($_GET['id'])&&$_GET['id']>0) {
         xoaThongBao($_GET['id']);
         header('location: index.php?act=thongbao');
      }
      break;
      case 'xoalh':
         if (isset($_GET['id'])&&$_GET['id']>0) {
            xoalophoc($_GET['id']);
            $idgv=gvlop($_GET['id']);
            $idlop=idlop($idgv['id']);
            $mangidlop=gv_getidlop($idlop['idlop']);
            foreach (array_keys($mangidlop, $_GET['id']) as $key) {      
               array_splice($mangidlop,$key,1);
        }
        $lopmoi=implode(',',$mangidlop);
        sualopgv($idgv['id'],$lopmoi);
            header('location: index.php?act=lop');
            
         }
         break;
   case 'suatb_':
      if(isset($_POST['tieude'])&&isset($_POST['noidung'])&&isset($_POST['idngdang'])){
         $tieude = xoatag($_POST['tieude']);
         $noidung = $_POST['noidung'];
         $idnguoidang = $_POST['idngdang'];
         $idthongbao = $_POST['idtb'];
         suathongbao($tieude, $noidung, $idnguoidang, $idthongbao);
      }
         header('location: index.php?act=thongbao');
      break;
   case 'sualh':
      if (isset($_GET['id'])&&$_GET['id']>0) {
         $lh = getMotlophoc($_GET['id']);
         $dskhoa=allkhoahoc();
         $allgv=allgv();
         $view = "../superus/views/lophoc_sua.php";
         require_once "../superus/views/layout.php";
      }
      break;
      case "themlh_":
         if(isset($_POST['tenlop'])&&isset($_POST['tenkhoa']) &&isset($_POST['gv'])){
            $tenlop = xoatag($_POST['tenlop']);
            $tenkhoa = $_POST['tenkhoa'];
            $idgv=$_POST['gv'];
            $a=themlophoc($tenlop,$tenkhoa);
            $idlop=idlop($idgv);
            $mangidlop=gv_getidlop($idlop['idlop']);
            array_push($mangidlop,$a);
            $lopmoi=implode(',',$mangidlop);
            sualopgv($idgv,$lopmoi);
            var_dump($idgv);
            header('location: index.php?act=lop');
         
         }else{
            header('location: index.php?act=lop');
         }
      break;
   case 'sualh_' :
      if(isset($_POST['tenlop'])&&isset($_POST['tenkhoa'])&&isset($_POST['gv'])){
         $tenlop = xoatag($_POST['tenlop']);
         $tenkhoa = $_POST['tenkhoa'];
         $idlop = $_POST['idlh'];
         $idgvm=$_POST['gv'];
         $idgvc=$_POST['idgvc'];
         if ($idgvc==0) {
            $idlopm=idlop($idgvm);
         $mangidlopm=gv_getidlop($idlopm['idlop']);
         array_push($mangidlopm,$idlop);
         $lopmoi=implode(',',$mangidlopm);
         sualopgv($idgvm,$lopmoi);
         } else {
            if ($idgvc!=$idgvm) {
               $idlopc=idlop($idgvc);
               $mangidlopc=gv_getidlop($idlopc['idlop']);
               foreach (array_keys($mangidlopc, $idlop) as $key) {
                  var_dump($key);
                  echo "mang chua xoa";
                  var_dump($mangidlopc);
                  array_splice($mangidlopc,$key,1);
                  echo "mang xoa";
                  var_dump($mangidlopc);
           }
               // array_diff($mangidlopc,['1','12']);
               $idlopm=idlop($idgvm);
               $mangidlopm=gv_getidlop($idlopm['idlop']);
               echo "mang chua moi";
               var_dump($mangidlopm);
               array_push($mangidlopm,$idlop);
               echo "mang moi";
               var_dump($mangidlopm);
               $lopmoi=implode(',',$mangidlopm);
               $lopmoi1=implode(',',$mangidlopc);
               sualopgv($idgvm,$lopmoi);
               sualopgv($idgvc,$lopmoi1);
            }
         }
         
        
    
         sualh($tenlop, $tenkhoa, $idlop);
      }
         header('location: index.php?act=lop');
      break;
   
   case 'suatb':
      if (isset($_GET['id'])&&$_GET['id']>0) {
         $thongbao = getMotTb($_GET['id']);
         $view = "../superus/views/thongbao_sua.php";
         require_once "../superus/views/layout.php";
      }
      break;
      
   case 'themtb':
      $view = "../superus/views/thongbao_them.php";
      require_once "../superus/views/layout.php";
      break;   

   case 'themtb_':
      if(isset($_POST['tieude'])&&isset($_POST['noidung'])&&isset($_POST['idnguoidang'])){
         $tieude = xoatag($_POST['tieude']);
         $noidung = $_POST['noidung'];
         $idnguoidang = $_POST['idnguoidang'];
         themthongbao($tieude, $noidung, $idnguoidang);
         header('location: index.php?act=thongbao');
      }else
         header('location: index.php?act=thongbao');
      break;

   case 'dangxuat':
      unset($_SESSION['role']);
      unset($_SESSION['iddn']);
      unset($_SESSION['tdn']);
      unset($_SESSION['hinhdn']);
      header('location: index.php');
      break;
   case 'sinhvien':
      $acsv = "active";
      if(isset($_GET['xoa'])){
         $id = xoatag($_GET['xoa']);
         xoasv($id);
         header('Location: index.php?act=sinhvien');
      }
      $sv = getallsv("0");
      $view = "../superus/views/sinhvien.php";
      require_once "../superus/views/layout.php";
   break;
   case 'addsinhvien':
      $mess = "";
      if(isset($_GET['cn'])){
         $cn = $_GET['cn'];
      }else $cn = 'them';
      $cnn = "them";$btnv=$td="THÊM";
      $ht = "";$ngaysinh="";$email="";$sdt="";$diachi="";$img = "";$sex1="checked";$sex0="";$idsv="";
      switch ($cn) {
         case 'sua':
            if(isset($_POST['sua'])){
               $idsv = $_POST['idsv'];
               $ht = xoatag($_POST['ht']);
               $img = $_FILES['imgsv'];
               if($img['name'] != ""){
               $img =upfile($img);
               }else $img = $img['name'];
               $ngaysinh = $_POST['ngaysinh'];
               $sdt = "+84".$_POST['sdt'];
               $email = xoatag($_POST['email']);
               $diachi = xoatag($_POST['diachi']);
               $sex = $_POST['sex'];
               $check = suathongtintk($idsv,$ht,$img,$ngaysinh,$email,$sdt,$diachi,$sex);
               $cn = 'them';
               $mess = showthongbao($check,"SỬA");
            }
            if(isset($_GET['id'])){
               $idsv = $_GET['id'];
               $sv = getsvid($idsv);
               $img = $sv['hinh'];
               $ht = $sv['hoten'];
               $ngaysinh = $sv['ngaysinh'];
               $email=$sv['email'];
               $sdt=trim($sv['sdt'],"+84");
               $diachi =$sv['diachi'];
               $sex1 = chuyendoi01($sv['sex'],"1","checked","");
               $sex0 = chuyendoi01($sv['sex'],"0","checked","");
               $btnv = $td = "SỬA";
               $cnn = 'sua';
            }else{
               $cn="them";
            }
            break;
         case 'them':
            if(isset($_POST['them'])){
               $ht = xoatag($_POST['ht']);
               $img = $_FILES['imgsv'];
               if($img['name'] != ""){
               $img =upfile($img);
               }else $img = $img['name'];
               $ngaysinh = $_POST['ngaysinh'];
               $sdt = "+84".$_POST['sdt'];
               $email = xoatag($_POST['email']);
               $diachi = xoatag($_POST['diachi']);
               $sex = $_POST['sex'];
               $tensv = explode(" ",$ht);
               $pass = $passno = rand(100000, 999999);
               $pass = hashpass($pass);
               $lastid = addtk($ht,$img,$ngaysinh,$email,$sdt,"0",$pass,$diachi,$sex);
               $tendn = texttoslug($tensv[(count($tensv)-1)]).$lastid;
               $check = addtk2($tendn,$lastid);
               $tdmail = "mật khẩu mới";
               $body = 
               '<div class="container" style="font-size: 16pt;color: black; width:100%;background-color:#efefef;padding:0;height:500px;padding-top:80px">
               <div class="box" style="width:50%;background-color:#fff;margin:0 auto;border-radius:5px">
                   <div class="logo" style="padding:5px;border-bottom:solid #efefef 1px;text-align:center">
                       <img src="https://i.ibb.co/84ByFQ0/logo.png" alt="logo" border="0" style="width:80px">
                   </div>
                   <div class="noidung" style="padding:20px">
                       <h2 style="text-align: center;font-weight:400">MẬT KHẨU MỚI</h2>
                       <p style="text-align: justify;">Chào, '.$ht.'! <br> Bạn đã được nhập học tại <strong> 8888 College </strong><br> Dưới đây là thông tin đăng nhập vào website của trường. <br> Chúc bạn có một học kì nhiều năng lượng và thành công!</p>
                       Tên đăng nhập : '.$tendn.'<br>Mật khẩu : '. $passno.'
                    </div>
               </div>
           </div>';
               guimail($email,$ht,$tdmail,$body);
               $mess = showthongbao($check,"THÊM");
            }
         break;
         case 'doipass':
            if(isset($_GET['id'])){
               $id = $_GET['id'];
               $sv = getsvid($id);
               $pass = $passno = rand(100000, 999999);
               $pass = hashpass($pass);
              $check = doipasstk($id,$pass);
               $tdmail = "KHÔI PHỤC MẬT KHẨU";
               $body = 
               '<div class="container" style="font-size: 16pt;color: black; width:100%;background-color:#efefef;padding:0;height:500px;padding-top:80px">
               <div class="box" style="width:50%;background-color:#fff;margin:0 auto;border-radius:5px">
                   <div class="logo" style="padding:5px;border-bottom:solid #efefef 1px;text-align:center">
                       <img src="https://i.ibb.co/84ByFQ0/logo.png" alt="logo" border="0" style="width:80px">
                   </div>
                   <div class="noidung" style="padding:20px">
                       <h2 style="text-align: center;font-weight:400">KHÔI PHỤC MẬT KHẨU</h2>
                       <p style="text-align: justify;">Chào bạn! <br> Dưới đây là thông tin khôi phục tài khoản của bạn!</p>
                       Tên đăng nhập : '.$sv['tendn'].'<br>Mật khẩu : '. $passno.'</div</div></div>';
           guimail($sv['email'],$sv['hoten'],$tdmail,$body);
           $mess = showthongbao($check,"KHÔI PHỤC MẬT KHẨU");
            }
         break;
      }
      $acsv = "active";
      $view = "../superus/views/formsv.php";
      require_once "../superus/views/layout.php";
   break;
   case 'thongtincn': 
      if (isset($_GET['idtk']) && $_GET['idtk'] >= 0) {
         $thongtin = thongtinsvtomtat($_GET['idtk']);
      }else $thongtin = thongtinsvtomtat($_SESSION['iddn']);
      $view = "../superus/views/ttcn.php";
      require_once "../superus/views/layout.php";
      break;
   case 'giaovien':
      if(isset($_GET['xoa'])){
         $id = xoatag($_GET['xoa']);
         xoasv($id);
         header('Location: index.php?act=giaovien');
      }
      $sv = getallsv("1");
      $acgv = "active";
      $view = "../superus/views/giaovien.php";
      require_once "../superus/views/layout.php";
   break;
   case 'changepass':
      $mess = "";
      $view = "../sinhvien/views/changepass.php";
      require_once "../sinhvien/views/layout.php";
      break;

      
   case 'changepass_':
      $mess ="";
      if(isset($_POST['pass'])) {
         $id = $_SESSION['iddn'];
         $pass = xoatag(trim($_POST['pass'],"'"));
         $check = getpass();
         if(is_array($check))
             $verify=password_verify($pass,$check['pass']);
            //Check pass
            if($verify){
               $newpass = $_POST['newpass'];
               $repass = $_POST['repass'];  
               //Check mk mới có khớp k            
               if($newpass==$repass) {
                  changepass($id, $repass);
                  $mess = "Đổi Thành Công";
               }else {
                  $mess = "Mật khẩu không khớp";
               }
            }else{
               $mess = "Thất bại sai mật khẩu";
            } 
         
            
      }
      $view = "../sinhvien/views/changepass.php";
      require_once "../sinhvien/views/layout.php";
   break;
   case 'addgiaovien':
      $mess = "";
      if(isset($_GET['cn'])){
         $cn = $_GET['cn'];
      }else $cn = 'them';
      $cnn = "them";$btnv=$td="THÊM";
      $ht = "";$ngaysinh="";$email="";$sdt="";$diachi="";$img = "";$sex1="checked";$sex0="";$idsv="";
      switch ($cn) {
         case 'sua':
            if(isset($_POST['sua'])){
               $idsv = $_POST['idsv'];
               $ht = xoatag($_POST['ht']);
               $img = $_FILES['imgsv'];
               if($img['name'] != ""){
               $img = upfile($img);
               }else $img = $img['name'];
               $ngaysinh = $_POST['ngaysinh'];
               $sdt = "+84".$_POST['sdt'];
               $email = xoatag($_POST['email']);
               $diachi = xoatag($_POST['diachi']);
               $sex = $_POST['sex'];
               $check = suathongtintk($idsv,$ht,$img,$ngaysinh,$email,$sdt,$diachi,$sex);
               $cn = 'them';
               $mess = showthongbao($check,"SỬA");
            }
            if(isset($_GET['id'])){
               $idsv = $_GET['id'];
               $sv = getsvid($idsv);
               $img = $sv['hinh'];
               $ht = $sv['hoten'];
               $ngaysinh = $sv['ngaysinh'];
               $email=$sv['email'];
               $sdt=trim($sv['sdt'],"+84");
               $diachi =$sv['diachi'];
               $sex1 = chuyendoi01($sv['sex'],"1","checked","");
               $sex0 = chuyendoi01($sv['sex'],"0","checked","");
               $btnv = $td = "SỬA";
               $cnn = 'sua';
            }else{
               $cn="them";
            }
            break;
         case 'them':
            if(isset($_POST['them'])){
               $ht = xoatag($_POST['ht']);
               $img = $_FILES['imgsv'];
               if($img['name'] != ""){
               $img = upfile($img);
               }else $img = $img['name'];
               $ngaysinh = $_POST['ngaysinh'];
               $sdt = "+84".$_POST['sdt'];
               $email = xoatag($_POST['email']);
               $diachi = xoatag($_POST['diachi']);
               $sex = $_POST['sex'];
               $tensv = explode(" ",$ht);
               $pass = $passno = rand(100000, 999999);
               $pass = hashpass($pass);
               $lastid = addtk($ht,$img,$ngaysinh,$email,$sdt,"1",$pass,$diachi,$sex);
               $tendn = texttoslug($tensv[(count($tensv)-1)]).$lastid;
               $check = addtk2($tendn,$lastid);
               $tdmail = "mật khẩu mới";
               $body = 
               '<div class="container" style="font-size: 16pt;color: black; width:100%;background-color:#efefef;padding:0;height:500px;padding-top:80px">
               <div class="box" style="width:50%;background-color:#fff;margin:0 auto;border-radius:5px">
                   <div class="logo" style="padding:5px;border-bottom:solid #efefef 1px;text-align:center">
                       <img src="https://i.ibb.co/84ByFQ0/logo.png" alt="logo" border="0" style="width:80px">
                   </div>
                   <div class="noidung" style="padding:20px">
                       <h2 style="text-align: center;font-weight:400">MẬT KHẨU MỚI</h2>
                       <p style="text-align: justify;">Chào, Thầy/Cô '.$ht.'! <br> Chào mừng thầy cô đến với <strong> 8888 College </strong><br> Dưới đây là thông tin đăng nhập vào website của trường. <br> Chúc thầy/cô dồi dào sức khỏe, gặt hái được nhiều thành công!</p>
                       Tên đăng nhập : '.$tendn.'<br>Mật khẩu : '. $passno.'
                    </div>
               </div>
           </div>';
               guimail($email,$ht,$tdmail,$body);
               $mess = showthongbao($check,"THÊM");
            }
         break;
         case 'doipass':
            if(isset($_GET['id'])){
               $id = $_GET['id'];
               $sv = getsvid($id);
               $pass = $passno = rand(100000, 999999);
               $pass = hashpass($pass);
              $check = doipasstk($id,$pass);
               $tdmail = "KHÔI PHỤC MẬT KHẨU";
               $body = 
               '<div class="container" style="font-size: 16pt;color: black; width:100%;background-color:#efefef;padding:0;height:500px;padding-top:80px">
               <div class="box" style="width:50%;background-color:#fff;margin:0 auto;border-radius:5px">
                   <div class="logo" style="padding:5px;border-bottom:solid #efefef 1px;text-align:center">
                       <img src="https://i.ibb.co/84ByFQ0/logo.png" alt="logo" border="0" style="width:80px">
                   </div>
                   <div class="noidung" style="padding:20px">
                       <h2 style="text-align: center;font-weight:400">KHÔI PHỤC MẬT KHẨU</h2>
                       <p style="text-align: justify;">Chào bạn! <br> Dưới đây là thông tin khôi phục tài khoản của bạn!</p>
                       Tên đăng nhập : '.$sv['tendn'].'<br>Mật khẩu : '. $passno.'</div></div></div>';
               guimail($sv['email'],$sv['hoten'],$tdmail,$body);
               $mess = showthongbao($check,"KHÔI PHỤC MẬT KHẨU");
            }
         break;
      }
      $acgv = "active";
      $view = "../superus/views/formgv.php";
      require_once "../superus/views/layout.php";
   break;
}
}else{
      header('Location: ../index.php');
}
      
?>