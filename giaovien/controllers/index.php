<?php
session_start();
ob_start();
require_once "../giaovien/models/index.php";
require_once "../system/share.php";
require_once "../system/conn.php";
require_once "../system/PHPMailer-master/src/PHPMailer.php";
require_once "../system/PHPMailer-master/src/SMTP.php";
require_once "../system/PHPMailer-master/src/Exception.php";
require_once "../system/Classes/PHPExcel.php";
if(isset($_SESSION['iddn']) && $_SESSION['role'] == 1){
if(isset($_GET['act'])){
   $act = $_GET['act'];
}else{
   $act = "home";
}
$achome="";$acbt="";$aclop="";$chat="";$actb="";
switch ($act) {
   case 'home':
      $achome="active";
      $idlop = gv_getidlop();
      //Nếu chưa dạy ai thì show thông báo thôi
      if(isset($idlop))
         $lopdangday = GV_getlopdangday(); 
      $tb=thongbao();
      $view = "../giaovien/views/home.php";
      require_once "../giaovien/views/layout.php";
   break;

   case 'baitap':
      $acbt="active";
      $idlop = gv_getidlop();
      if (isset($idlop)) 
         $lopdangday = GV_getlopdangday(); 
      $view = "../giaovien/views/baitap.php";
      require_once "../giaovien/views/layout.php";
      break;

   case 'giaobt':
      $idlop = gv_getidlop();
      $lopdangday = GV_getlopdangday(); 
      $view = "../giaovien/views/giaobt.php";
      require_once "../giaovien/views/layout.php";
      break;
   case 'giaobtd':
     $tenbt=xoatag($_POST['tenbt']);
     $ngaygiao=$_POST['ngaygiao'];
     $hanchot=$_POST['hanchot'];
     $mota=$_POST['mota'];
     $lophoc=$_POST['lophoc'];
     $imgbt=$_FILES['imgbt'];
     $tenhinh=$imgbt['name'];
     upfile($imgbt);
     thembt($tenbt,$tenhinh,$mota,$lophoc,$ngaygiao,$hanchot); 
    
      
     $idgv=$_SESSION['iddn'];
     $ttgv=thongtinsvtomtat($idgv);
      $hslop=hslophoc($lophoc);
      foreach ($hslop as $hs) {
      $sdt = $hs['sdt'];
      $email=$hs['email'];
      $hoten=$hs['hoten'];
      $today=date("d-m-Y");
      $tieude="Thông báo bài tập mới";
      $body='    
<div class="container" style="font-size: 16pt;color: black; width:100%;background-color:#efefef;padding:0;height:500px;padding-top:80px">
    <div class="box" style="width:50%;background-color:#fff;margin:0 auto;border-radius:5px">
        <div class="logo" style="padding:5px;border-bottom:solid #efefef 1px;text-align:center">
            <img src="https://i.ibb.co/84ByFQ0/logo.png" alt="logo" border="0" style="width:80px">
        </div>
        <div class="noidung" style="padding:20px">
            <h2 style="text-align: center;font-weight:400">THÔNG BÁO</h2>
            <p style="text-align: justify;">Chào, '.$hoten.'! <br> Bạn vừa có bài tập mới đến từ lớp <strong>'.$ttgv['hoten'].'</strong> vào ngày <br> <i>'.$today.'</i>. <br> Mong bạn kiểm tra và làm bài đầy đủ!</p>
        </div>
    </div>
</div>';
      // $body='Lớp học bạn đăng kí vừa có bài tập mới vào '.$today.'.Xin bạn kiểm tra và làm bài đầy đủ';
      // dung mo de danh demo
      $bodysms = "Bài tập mới từ :".$ttgv['hoten'];
      // send_twilio_sms($sdt, $bodysms); 
      // 
      guimail($email,$hoten,$tieude,$body);
      }
     header('Location: index.php?act=baitap');
   break;
   case 'xoabt':
   if ($_GET['id']) {
     $id=$_GET['id'];
     xoabt($id);
     
   }else{
      echo ' <script>
      alert("địa chỉ đã bị sai") ;
   </script>';
         }
         header('Location: index.php?act=baitap');
         break;
      case 'chambai':
         if (isset($_GET['id'])) {
            $idbt = $_GET['id'];
            $danhsach = getDsLopByBt($idbt);
            $baitap_info = gv_getBaitapByIDBT($idbt);
            $baitap_list = getAllBaiTapSv($idbt);
            if (isset($_GET['excel'])) {
               $objExcel = new PHPExcel;
               $objExcel->setActiveSheetIndex(0);
               $sheet = $objExcel->getActiveSheet()->setTitle(texttoslug($baitap_info['tenlop']) . "_" . texttoslug($baitap_info['tenbaitap']));
               $objExcel->getActiveSheet()->getColumnDimension('A')->setWidth(25);
               $objExcel->getActiveSheet()->getColumnDimension('B')->setWidth(35);
               $objExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(40);
               $sheet->getStyle("A1:C1")->getFill()->setFilltype(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('0D0E2E');
               $objExcel->getActiveSheet()->getStyle("A1:C1")->getFont()->setBold(true)
                  ->setName('Verdana')
                  ->setSize(10)
                  ->getColor()->setRGB('FFFFF');
               $sheet->getStyle("A1:C1")->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
               $sheet->getStyle("A1:C1")->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
               $sheet->getStyle("A")->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
               $rowCount = 1;
               $sheet->setCellValue('A' . $rowCount, 'STT');
               $sheet->setCellValue('B' . $rowCount, 'HỌ VÀ TÊN');
               $sheet->setCellValue('C' . $rowCount, 'ĐIỂM');
               foreach ($danhsach as $ds) {
                  $rowCount++;
                  $xuatexcell = checknopbai($_GET['id'], $ds['idsv']);
                  $sheet->setCellValue('A' . $rowCount, $rowCount - 1);
                  $sheet->setCellValue('B' . $rowCount, $ds['hoten']);
                  $sheet->setCellValue('C' . $rowCount, $xuatexcell['diem']);
                  $objExcel->getActiveSheet()->getRowDimension($rowCount)->setRowHeight(20);
               }
               $stylearr = array(
                  'borders' => array(
                     'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN
                     ),
                  )
               );
               $sheet->getStyle('A1:' . 'C' . ($rowCount))->applyFromArray($stylearr);
               $objWriter = new PHPExcel_Writer_Excel2007($objExcel);
               $filename = texttoslug($baitap_info['tenlop']) . "_" . texttoslug($baitap_info['tenbaitap']).".xlsx";
               $objWriter->save($filename);
               ob_end_clean();
               header('Content-Disposition: attachment; filename="' . $filename . '"');
               header('Content-Type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet');
               header('Content-Length: ' . filesize($filename));
               header('Content-Transfer-Encoding: binary');
               header('Cache-Control: must-revalidate');
               header('Pragma: no-cache');
               readfile($filename);
               unlink($filename);
               return;
            }
            if(isset($_POST['tai']) && isset($_POST['chonbt'])){
               $listbt = $_POST['chonbt'];
               print_r($listbt);
               // $myzip = new ZipArchive;
               // $tenfile =texttoslug($baitap_info['tenlop']) . "_" . texttoslug($baitap_info['tenbaitap']).".zip";
               // if ($myzip->open($tenfile, ZipArchive::CREATE) === TRUE){
               //    foreach($listbt as $bt){
               //       echo $bt;
               //       // if(is_file($bt)){
               //       $myzip->addFile($bt);
               //       // }
               //    }
               //    $myzip->close();
               // }
               // ob_end_clean();
               // header("Content-type: application/zip"); 
               // header("Content-Disposition: attachment; filename=$tenfile");
               // header("Content-length: " . filesize($tenfile));
               // header("Pragma: no-cache"); 
               // header("Expires: 0"); 
               // readfile($tenfile);
               // unlink($tenfile);
               // return;
            }
         }
         $acbt = "active";
         $view = "../giaovien/views/chambai.php";
         require_once "../giaovien/views/layout.php";
         break;

      case 'thongbao':
         $actb = "active";
         $tb = thongbao();
         $arrtbjs = [];
         foreach ($tb as $tb1) {
            $arrtam = [$tb1['tdtb'], $tb1['noidung'], $tb1['hoten'], $tb1['ngaydang']];
            array_push($arrtbjs, $arrtam);
         }
         if (isset($_GET['idtb'])) {
            $idtb = $_GET['idtb'];
            $tbct = thongbaoct($idtb);
         }
         $view = "../giaovien/views/thongbao.php";
         require_once "../giaovien/views/layout.php";
         break;
      case 'chat':
         $chat = "active";
         $alllop =  GV_getlopdangday();
         $view = "../giaovien/views/nhantin.php";
         require_once "../giaovien/views/layout.php";
         break;

      case 'lop':
         $aclop = "active";
         $lopdangday = GV_getlopdangday();
         $view = "../giaovien/views/lophoc.php";
         require_once "../giaovien/views/layout.php";
         break;

      case 'changepass':
         $mess = "";
         $view = "../giaovien/views/changepass.php";
         require_once "../giaovien/views/layout.php";
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
                     // header('location: index.php?act=thongtincn');
                     // echo("Đổi thành công");
                     $mess = "Đổi Thành Công";
                  }else {
                     // header('location: index.php?act=thongtincn');
                     // echo("Mật khẩu không khớp");
                     $mess = "Mật khẩu không khớp";
                  }
               }else{
                  // echo "Thất bại sai mật khẩu";
                  $mess = "Thất bại sai mật khẩu";
               } 
            
               
         }
         $view = "../giaovien/views/changepass.php";
         require_once "../giaovien/views/layout.php";
      break;
      case 'dangxuat':
         unset($_SESSION['role']);
         unset($_SESSION['iddn']);
         unset($_SESSION['tdn']);
         unset($_SESSION['hinhdn']);
         header('location: index.php');
         break;
      case 'thongtincn':
         $thongtin = thongtinsvtomtat($_SESSION['iddn']);
         if (isset($_GET['idtk']) && $_GET['idtk'] >= 0) {
            $thongtin = thongtinsvtomtat($_GET['idtk']);
         } else $thongtin = thongtinsvtomtat($_SESSION['iddn']);
         $view = "../giaovien/views/ttcn.php";
         require_once "../giaovien/views/layout.php";
         break;
      case 'diemsvct':
         if (isset($_GET['idsv']) && $_GET['idsv'] > 0) {
            $allkh = khoahocdadk($_GET['idsv']);
            $ttsv = thongtinsvtomtat($_GET['idsv']);
            if (is_array($ttsv)) $ttsv = $ttsv['hoten'];
            else $ttsv = '';
         } else {
            $ttsv = '';
         }
         $view = "../giaovien/views/bangdiem.php";

         require_once "../giaovien/views/layout.php";
         break;
      case 'lophoc':

         break;

      case 'lopct':
         $aclop = "active"; 
         if(isset($_GET['idlop']) && $_GET['idlop'] > 0  ){   
            $idlop = $_GET['idlop']; 
            if(countLopGV($idlop)['tong']> 0){
               $dssvtheolop = getSVByLop($idlop); 
               $tenlop = tenlop($idlop);
               $khoahoc =getTTKhoaByIDLop($idlop);
               if(isset($_GET['excel'])){
                  $objExcel = new PHPExcel;
                  $objExcel->setActiveSheetIndex(0);
                  $sheet = $objExcel->getActiveSheet()->setTitle(texttoslug($tenlop['tenlop']));
                  $objExcel->getActiveSheet()->getColumnDimension('A')->setWidth(25);
                  $objExcel->getActiveSheet()->getColumnDimension('B')->setWidth(40);
                  $objExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
                  $objExcel->getActiveSheet()->getColumnDimension('D')->setWidth(35);
                  $objExcel->getActiveSheet()->getColumnDimension('E')->setWidth(45);
                  $objExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(40);
                  $sheet->getStyle("A1:E1")->getFill()->setFilltype(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('0D0E2E');
                  $objExcel->getActiveSheet()->getStyle("A1:E1")->getFont()->setBold(true)
                     ->setName('Verdana')
                     ->setSize(10)
                     ->getColor()->setRGB('FFFFF');
                  $sheet->getStyle("A1:E1")->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                  $sheet->getStyle("A1:E1")->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
                  $sheet->getStyle("A")->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                  $rowCount = 1;
                  $sheet->setCellValue('A' . $rowCount, 'STT');
                  $sheet->setCellValue('B' . $rowCount, 'HỌ VÀ TÊN');
                  $sheet->setCellValue('C' . $rowCount, 'NGÀY SINH');
                  $sheet->setCellValue('D' . $rowCount, 'EMAIL');
                  $sheet->setCellValue('E' . $rowCount, 'ĐỊA CHỈ');
                  foreach ($dssvtheolop as $ds) { 
                     $rowCount++;
                     $sheet->setCellValue('A' . $rowCount, $rowCount - 1);
                     $sheet->setCellValue('B' . $rowCount, $ds['hoten']);
                     $sheet->setCellValue('C' . $rowCount, $ds['ngaysinh']);
                     $sheet->setCellValue('D' . $rowCount, $ds['email']);
                     $sheet->setCellValue('E' . $rowCount, $ds['diachi']);
                     $objExcel->getActiveSheet()->getRowDimension($rowCount)->setRowHeight(20);
                  }
                  $stylearr = array(
                     'borders' => array(
                        'allborders' => array(
                           'style' => PHPExcel_Style_Border::BORDER_THIN
                        ),
                     )
                  );
                  $sheet->getStyle('A1:' . 'E' . ($rowCount))->applyFromArray($stylearr);
                  $objWriter = new PHPExcel_Writer_Excel2007($objExcel);
                  $filename = texttoslug($tenlop['tenlop']) . "_" .  texttoslug($khoahoc['tenkhoa']) . ".xlsx";
                  $objWriter->save($filename);
                  ob_end_clean();
                  header('Content-Disposition: attachment; filename="' . $filename . '"');
                  header('Content-Type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet');
                  header('Content-Length: ' . filesize($filename));
                  header('Content-Transfer-Encoding: binary');
                  header('Cache-Control: must-revalidate');
                  header('Pragma: no-cache');
                  readfile($filename);
                  unlink($filename);
               }
            } 
         }
         $view = "../giaovien/views/lopct.php";
         require_once "../giaovien/views/layout.php";
         break;
      case 'chamdiemajax':
         if (isset($_POST['diem']) && isset($_POST['typeid'])) {
            $diem = $_POST['diem'];
            $file = $_POST['typeid'];
            $arrdiem = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
            if (in_array($diem, $arrdiem)) {
               chamdiem($diem, $file);
            }
         }
         break;
   }
} else {
   header('Location: ../index.php');
}