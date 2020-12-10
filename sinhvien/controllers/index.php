<?php
session_start();
ob_start();
require_once "../sinhvien/models/index.php";
require_once "../system/share.php";
require_once "../system/conn.php";
require_once "../system/luudammay/vendor/autoload.php";
require_once "../system/luudammay/config-cloud.php";
if (isset($_SESSION['iddn'])) {
   if (isset($_SESSION['iddn']) && $_SESSION['role'] == 0) {
      if (isset($_GET['act'])) {
         $act = $_GET['act'];
      } else {
         $act = "home";
      }
      $achome = "";
      $acbt = "";
      $acdkkh = "";
      $actb = "";
      $acbd = "";
      $chat = "";
      $naptien = "";
      switch ($act) {
         case 'home':
            $idsv = $_SESSION['iddn'];
            $ttsv = thongtinsv1($idsv);
            $tb = thongbao(0);
            //Đếm bài tập cho thống kê
            $btdanop = 0;
            $btchuanop = 0;
            foreach ($ttsv as $allbt) {
               // Đếm bài tập đã nộp
               $checkbt = checknopbai($allbt['idbaitap']);
               if (is_array($checkbt) > 0) $btdanop += 1;
               if (is_array($checkbt) == 0)   $btchuanop += 1;
            }
            $achome = "active";
            $view = "../sinhvien/views/home.php";
            require_once "../sinhvien/views/layout.php";
            break;

         case 'lopbaitap':
            $acbt = "active";
            $lopdanghoc = getlopsvdanghoc();
            $view = "../sinhvien/views/baitap.php";
            require_once "../sinhvien/views/layout.php";
            break;

         case 'baitap':
            $all = "";
            $danop = "";
            $nonop = "";
            if (isset($_GET['sx'])) {
               $sx = $_GET['sx'];
            } else {
               $sx = "all";
            }
            if (isset($_GET['idlop'])) $idlop = $_GET['idlop'];
            $checkbaitap = thongtinsv($_SESSION['iddn'], $idlop);
            $tenlop = tenlop($idlop);
            switch ($sx) {
               case 'all':
                  $all = "active";
                  $allbaitap = thongtinsv($_SESSION['iddn'], $idlop);
                  break;
               case 'done':
                  $danop = "active";
                  $allbaitap = btdanop($idlop);
                  break;
               case 'not':
                  $nonop = "active";
                  $allbaitap = btchuanop($idlop);
                  break;
            }
            // Lấy all bài tập theo ID lớp 


            $btdanop = 0;
            $btchuanop = 0;
            foreach ($checkbaitap as $allbt) {
               // Đếm bài tập đã nộp
               $checkbt = checknopbai($allbt['idbaitap']);
               if (is_array($checkbt) > 0) $btdanop += 1;
               if (is_array($checkbt) == 0)   $btchuanop += 1;
            }
            // Đếm bài tập chưa nộp
            $acbt = "active";
            $view = "../sinhvien/views/baitapl.php";
            require_once "../sinhvien/views/layout.php";
            break;
         case 'nopbaitap':
            $acbt = "active";
            if (isset($_GET['idbt'])) {
               $idbt = $_GET['idbt'];
               $arrbt = nopbaitap($idbt);
               if (is_array($arrbt)) {
                  $gv = ttgvlop($arrbt['idlop']);
                  $nopbai = checknopbai($idbt);
                  $view = "../sinhvien/views/nopbaitap.php";
                  require_once "../sinhvien/views/layout.php";
               } else {
                  header('Location:index.php');
               }
            } else {
               header('Location:index.php');
            }
            break;
         case 'dkkh':
            $id = $_SESSION['iddn'];
            $all = "";
            $dadk = "";
            $nodk = "";
            if (isset($_GET['ht'])) {
               $ht = $_GET['ht'];
            } else {
               $ht = "all";
            }
            switch ($ht) {
               case 'all':
                  $all = "active";
                  $khoahoc = khoahoc();
                  break;
               case 'dadk':
                  $dadk = "active";
                  $khoahoc = khoahocdadk();
                  break;
               case 'nodk':
                  $nodk = "active";
                  $khoahoc = khoahocchuadk();
                  break;
            }
            $acdkkh = "active";

            $view = "../sinhvien/views/dkkh.php";
            require_once "../sinhvien/views/layout.php";
            break;
         case 'dkkh1':
            if (isset($_POST['ht'])) {
               $ht = $_POST['ht'];
            } else {
               $ht = "all";
            }
            $idlop = $_POST['id'];
            $idsv = $_SESSION['iddn'];
            $ctkh = getkhoahocbylopid($idlop);
            $thongtin = thongtinsvtomtat($_SESSION['iddn']);
            $_SESSION['tien'] = $thongtin['tien'];
            if ($_SESSION['tien'] >= $ctkh['giatien']) {
               $check = capnhattrutien($ctkh['giatien'], $idsv);
               $_SESSION['tien'] -= $ctkh['giatien'];
               $tienconlai = chuyenso($_SESSION['tien']);
               if ($check) {
                  dkkh($idsv, $idlop);
               }
               $thongbao = 1;
            } else {
               $tienconlai = chuyenso($_SESSION['tien']);
               $thongbao = 0;
            }
            switch ($ht) {
               case 'all':
                  $all = "active";
                  $khoahoc = khoahoc();
                  break;
               case 'dadk':
                  $dadk = "active";
                  $khoahoc = khoahocdadk();
                  break;
               case 'nodk':
                  $nodk = "active";
                  $khoahoc = khoahocchuadk();
                  break;
            }
            foreach ($khoahoc as $kh) {
               $idkhoa = $kh['id'];
               $tenchude = gettenchude($kh['chude']);
               $idsv = $_SESSION['iddn'];
               $checksv = xetkhoahoc($idkhoa, $idsv);
               $lophoc = lophoc($idkhoa);
               $demlh = demlophoc($idkhoa);
?>
               <tr class="boxkhoahoc ">
                  <td class="imagekh  p-3">
                     <img src="<?= showfile($kh['hinh']) ?>" onerror="erroimg(this)">
                  </td>
                  <td class="ttkhoahoc py-3 pr-5">
                     <a href="index.php?act=ctkh&idkh=<?= $idkhoa ?>">
                        <p class="h4 title"><?= $kh['tenkhoa'] ?></p>
                     </a>
                     <p class="my-1 h6">
                        <?= $tenchude['tenchude'] ?></p>
                     <p class="mota">
                        <?= $kh['mota'] ?>
                     </p>
                  </td>
                  <td class="gia">
                     <p class="my-2 px-1"> <i class='far fa-file-alt' style='font-size:20px; color:gray'></i> <?= $demlh['tong'] ?> Lớp học <span class="float-right mr-5 font-weight-bold"><?= chuyenso($kh['giatien']) ?> VND</span></p>
                     <p>
                        <?php
                        if (is_array($checksv)) {
                           $gv = gvkhoahoc($checksv['idlop']); ?>
                           <select id="lophoc" class="form-control col-10" disabled>
                              <option><?= $checksv['tenlop'] ?> - <?= $gv['hoten'] ?></option>
                           <?php } else { ?>
                              <select id="lophoc" class="form-control col-10">
                              <?php foreach ($lophoc as $lophoc) {
                                 $idgv = $lophoc['id'];
                                 $gv = gvkhoahoc($idgv);
                                 echo ' <option value="' . $lophoc['id'] . '">' . $lophoc['tenlop'] . '-' . $gv['hoten'] . '</option>';
                              }
                           } ?>
                              </select>
                     </p>
                     <?php if (is_array($checksv)) { ?>
                        <button type="button" disabled class="btn btn-success col-10">Đã Đăng Ký</button>
                     <?php } else { ?>
                        <button type="button" class="btn btn-success dkkh col-10">Đăng Ký</button>
                     <?php } ?>

                  </td>
               </tr>

            <?php } ?>
            <script>
               tienconlai = <?= json_encode($tienconlai) ?>;
               tbdkkh = <?= json_encode($thongbao) ?>;
            </script>
         <?php
            break;

         case 'dkkh2':
            $idkh = $_POST['idkh'];
            $idlop = $_POST['idlop'];
            $idsv = $_SESSION['iddn'];
            $ctkh = getkhoahocbylopid($idlop);
            $thongtin = thongtinsvtomtat($_SESSION['iddn']);
            $_SESSION['tien'] = $thongtin['tien'];
           
            $lophoc = lophoc($idkh);
            if ($_SESSION['tien'] >= $ctkh['giatien']) {
               $check = capnhattrutien($ctkh['giatien'], $idsv);
               $_SESSION['tien'] -= $ctkh['giatien'];
               $tienconlai = chuyenso($_SESSION['tien']);
               if ($check) {
                  dkkh($idsv, $idlop);
               }
               $thongbao = 1;
            } else {
               $tienconlai = chuyenso($_SESSION['tien']);
               $thongbao = 0;
            } ?>
            <SPan></SPan>
            <p>
                
                <?php
                 $checksv = xetkhoahoc($idkh, $idsv);
                if (is_array($checksv)) {
                    $gv = gvkhoahoc($checksv['idlop']); ?>
                    <select id="lophoc" class="form-control w-100" disabled>
                        <option><?= $checksv['tenlop'] ?> - <?= $gv['hoten'] ?></option>
                    <?php } else { ?>
                        <select id="lophoc" idkh=<?= $idkh ?> class="form-control w-100">
                        <?php
                        $demlop = 0;
                        foreach ($lophoc as $lophoc) {
                            $idgv = $lophoc['id'];
                            $gv = gvkhoahoc($idgv);
                            echo ' <option value="' . $lophoc['id'] . '">' . $lophoc['tenlop'] . '-' . $gv['hoten'] . '</option>';
                            $demlop++;
                        }
                    } ?>
                        </select>
            </p>
            <?php if (is_array($checksv)) { ?>
                <button type="button" disabled class="btn btn-success w-100">Đã Đăng Ký</button>
            <?php } else {
                if ($demlop != 0) {
                    echo ' <button type="button" class="btn btn-success dkkh w-100"  >Đăng Ký</button>';
                } else {
                    echo ' <button type="button" disabled class="btn btn-success dkkh w-100">Không có lớp học</button>';
                }

            ?>

            <?php } ?>

            <script>
               tienconlai = <?= json_encode($tienconlai) ?>;
               tbdkkh = <?= json_encode($thongbao) ?>;
            </script>
<?php
            break;

         case 'thongbao':
            $actb = "active";
            $tb = thongbao(0);
            $arrtbjs = [];
            foreach ($tb as $tb1) {
               $arrtam = [$tb1['tdtb'], $tb1['noidung'], $tb1['hoten'], $tb1['ngaydang']];
               array_push($arrtbjs, $arrtam);
            }
            if (isset($_GET['idtb'])) {
               $idtb = $_GET['idtb'];
               $tbct = thongbaoct($idtb);
            }
            $view = "../sinhvien/views/thongbao.php";
            require_once "../sinhvien/views/layout.php";
            break;
         case 'bangdiem':
            $acbd = "active";
            $view = "../sinhvien/views/bangdiem.php";
            require_once "../sinhvien/views/layout.php";
            break;
         case 'thongtincn':
            $thongtin = thongtinsvtomtat($_SESSION['iddn']);
            $_SESSION['tien'] = $thongtin['tien'];
            $view = "../sinhvien/views/ttcn.php";
            require_once "../sinhvien/views/layout.php";
            break;
         case 'nhantin':
            $view = "../sinhvien/views/nhantin.php";
            require_once "../sinhvien/views/layout.php";
            break;
         case 'noplaibt':
            if (isset($_GET['idbt']) && isset($_POST['nop'])) {
               $file = $_FILES['baitap'];
               $idbt = $_GET['idbt'];
               if ($file['name'] != '') {
                  $linkfile = upfilezip($file);
                  $tenfile = $file['name'];
                  $file = $tenfile . "," . $linkfile;
                  noplaibt($file, $idbt);
                  header("Location: index.php?act=nopbaitap&idbt=$idbt");
               } else {
                  header('Location: index.php');
               }
            }
            break;
         case 'nopbai':
            if (isset($_GET['idbt']) && isset($_POST['nop'])) {
               $file = $_FILES['baitap'];
               $idbt = $_GET['idbt'];
               if ($file['name'] != '') {
                  $linkfile = upfilezip($file);
                  $tenfile = $file['name'];
                  $file = $tenfile . "," . $linkfile;
                  nopbai($file, $idbt);
               }
               header("Location: index.php?act=nopbaitap&idbt=$idbt");
            } else {
               header('Location: index.php');
            }
            break;
         case 'chat':
            $chat = "active";
            $alllop = getlopsvdanghoc();
            $view = "../sinhvien/views/nhantin.php";
            require_once "../sinhvien/views/layout.php";
            break;

         case 'dangxuat':
            unset($_SESSION['role']);
            unset($_SESSION['iddn']);
            unset($_SESSION['tdn']);
            unset($_SESSION['hinhdn']);
            header('location: index.php');
            break;
         case 'naptien':
            $thongtin = thongtinsvtomtat($_SESSION['iddn']);
            $_SESSION['tien'] = $thongtin['tien'];
            $naptien = 'active';
            $mess = '';
            $view = '../sinhvien/views/naptien.php';
            require_once "../sinhvien/views/layout.php";
            break;
         case 'ctkh':

            $mess = '';
            $view = '../sinhvien/views/ctkh.php';
            require_once "../sinhvien/views/layout.php";
            break;
         case 'thanhtoan':
            $vnp_TmnCode = "2XH56RMU";
            $vnp_HashSecret = "VE9PWYMLHTCYZ4AO3ET1Q34HCDKPAT9K";
            $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = "http://localhost/duan1/sinhvien/index.php?act=savethanhtoan";
            if (isset($_POST['ttoan'])) {
               $vnp_TxnRef = $_POST['order_id'];
               $vnp_OrderInfo =  'Nạp Tiền tài khoản HS' . $_SESSION['iddn'];
               $vnp_OrderType = 'hocphi';
               $vnp_Amount = str_replace(',', '', $_POST['amount']) * 100;
               $vnp_Locale = 'vn';
               $vnp_BankCode = $_POST['bank_code'];
               $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

               $inputData = array(
                  "vnp_Version" => "2.0.0",
                  "vnp_TmnCode" => $vnp_TmnCode,
                  "vnp_Amount" => $vnp_Amount,
                  "vnp_Command" => "pay",
                  "vnp_CreateDate" => date('YmdHis'),
                  "vnp_CurrCode" => "VND",
                  "vnp_IpAddr" => $vnp_IpAddr,
                  "vnp_Locale" => $vnp_Locale,
                  "vnp_OrderInfo" => $vnp_OrderInfo,
                  "vnp_OrderType" => $vnp_OrderType,
                  "vnp_ReturnUrl" => $vnp_Returnurl,
                  "vnp_TxnRef" => $vnp_TxnRef,
               );
               if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                  $inputData['vnp_BankCode'] = $vnp_BankCode;
               }
               ksort($inputData);
               $query = "";
               $i = 0;
               $hashdata = "";
               foreach ($inputData as $key => $value) {
                  if ($i == 1) {
                     $hashdata .= '&' . $key . "=" . $value;
                  } else {
                     $hashdata .= $key . "=" . $value;
                     $i = 1;
                  }
                  $query .= urlencode($key) . "=" . urlencode($value) . '&';
               }

               $vnp_Url = $vnp_Url . "?" . $query;
               if (isset($vnp_HashSecret)) {

                  $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
                  $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
               }
               $returnData = array(
                  'code' => '00', 'message' => 'success', 'data' => $vnp_Url
               );
               header('Location: ' . $returnData['data']);
            }
            break;
         case 'savethanhtoan':
            $vnp_HashSecret = "VE9PWYMLHTCYZ4AO3ET1Q34HCDKPAT9K";
            $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = "http://localhost/duan1/sinhvien/index.php?act=savethanhtoan";
            $vnp_SecureHash = $_GET['vnp_SecureHash'];
            $inputData = array();
            foreach ($_GET as $key => $value) {
               if (substr($key, 0, 4) == "vnp_") {
                  $inputData[$key] = $value;
               }
            }
            unset($inputData['vnp_SecureHashType']);
            unset($inputData['vnp_SecureHash']);
            ksort($inputData);
            $i = 0;
            $hashData = "";
            foreach ($inputData as $key => $value) {
               if ($i == 1) {
                  $hashData = $hashData . '&' . $key . "=" . $value;
               } else {
                  $hashData = $hashData . $key . "=" . $value;
                  $i = 1;
               }
            }
            $secureHash = hash('sha256', $vnp_HashSecret . $hashData);
            $check = 0;
            if ($secureHash == $vnp_SecureHash) {
               if ($_GET['vnp_ResponseCode'] == '00') {
                  $money = $_GET['vnp_Amount'] / 100;
                  $note = $_GET['vnp_OrderInfo'];
                  $code_vnpay = $_GET['vnp_TransactionNo'];
                  $time = $_GET['vnp_PayDate'];
                  $date_time = substr($time, 0, 4) . '-' . substr($time, 4, 2) . '-' . substr($time, 6, 2) . ' ' . substr($time, 8, 2) . ' ' . substr($time, 10, 2) . ' ' . substr($time, 12, 2);
                  $check = addnaptien($code_vnpay, $_SESSION['iddn'], $money, $note, $date_time);
                  capnhattien($money, $_SESSION['iddn']);
                  $_SESSION['tien'] += $money;
               }
            }
            $mess = showthongbao($check, "NẠP");
            header('Location: index.php?act=naptien');
            break;
         case 'changepass':
            $mess = "";
            $view = "../sinhvien/views/changepass.php";
            require_once "../sinhvien/views/layout.php";
            break;
         case 'changepass_':
            $mess = "";
            if (isset($_POST['pass'])) {
               $id = $_SESSION['iddn'];
               $pass = xoatag(trim($_POST['pass'], "'"));
               $check = getpass();
               if (is_array($check))
                  $verify = password_verify($pass, $check['pass']);
               //Check pass
               if ($verify) {
                  $newpass = $_POST['newpass'];
                  $repass = $_POST['repass'];
                  if ($newpass == '' || $repass == '') {
                     $mess = "<span class= 'text-danger'>Bạn chưa nhập mật khẩu mới<span>";
                  } else {
                     //Check mk mới có khớp k            
                     if ($newpass == $repass) {
                        changepass($id, $repass);
                        $mess = "<span class= 'text-success'>Đổi Thành Công<span>";
                     } else {
                        $mess = "<span class= 'text-danger'>Mật khẩu không khớp<span>";
                     }
                  }
               } else {
                  $mess = "<span class= 'text-danger'>Thất bại sai mật khẩu<span>";
               }
            }
            $view = "../sinhvien/views/changepass.php";
            require_once "../sinhvien/views/layout.php";
            break;
      }
   }
} else {
   header('Location: ../index.php');
}
?>
<!-- Ngân hàng	NCB
 Số thẻ	9704198526191432198
 Tên chủ thẻ	NGUYEN VAN A
 Ngày phát hành	07/15
 Mật khẩu OTP	123456 -->