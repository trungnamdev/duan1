<?php 
$duongdan = "../uploads/";
function xoatag($text){
    return trim(strip_tags($text));
}
function setnum($num){
    return settype($num ,"int");
}
function hashpass($pass){
    return password_hash($pass,PASSWORD_DEFAULT);
}
function upfile($file){
    $nam = \Cloudinary\Uploader::upload($file['tmp_name']);
    return $nam['url'];
}
function showfile($text){
    return cloudinary_url($text);
}  
// function upfile($file){
//     if(!is_file($GLOBALS['duongdan'] . $file['name'])){
//         $noiup = $GLOBALS['duongdan'] . basename($file['name']);
//         move_uploaded_file($file["tmp_name"],$noiup);
//     }
// }
// function showfile($text){
//     return $GLOBALS['duongdan'].$text;
// }  
function guimail($e,$u,$tieude,$body){
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);
    try {
   $mail->SMTPDebug = 0;  // Enable verbose debug output
   $mail->isSMTP();  
   $mail->CharSet  = "utf-8";
   $mail->Host = 'smtp.gmail.com';  //SMTP servers
   $mail->SMTPAuth = true; // Enable authentication
   $mail->Username = 'thanhdobaihoc@gmail.com';  // SMTP username
   $mail->Password = 'dogaga123';   // SMTP password
   $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
   $mail->Port = 465;  // port to connect to                
   $mail->setFrom('daihoc8888@gmail.com', 'Trường Học 8888');
   $mail->addAddress($e, $u); //mail và tên người nhận       
   $mail->isHTML(true);  // Set email format to HTML
   $mail->Subject = $tieude;                
   $mail->Body= $body;
   $mail->send();
} catch (Exception $e) {
    echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
}
}

function send_twilio_sms($to, $body){
    $id = "ACca46051fc6df5640676645f9e695b83a";
$token = "3e42d441a2794ad3722100a6e79ddb1b";
$url = "https://api.twilio.com/2010-04-01/Accounts/".$id."/SMS/Messages";
$data = array (
    'From' => "+19387773309",
    'To' => $to,
    'Body' => $body,
);
$post = http_build_query($data);
$x = curl_init($url );
curl_setopt($x, CURLOPT_POST, true);
curl_setopt($x, CURLOPT_RETURNTRANSFER, true);
curl_setopt($x, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($x, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($x, CURLOPT_USERPWD, "$id:$token");
curl_setopt($x, CURLOPT_POSTFIELDS, $post);
$y = curl_exec($x);
curl_close($x);
return $y;
}
function chuyendoi01($text , $if,$dung ,$sai){
    $rttext = $sai;
  if($text == $if){
    $rttext = $dung;
  }
  return $rttext;
}
function texttoslug($str) {
    $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $str);
    $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $str);
    $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $str);
    $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $str);
    $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $str);
    $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $str);
    $str = preg_replace("/(đ)/", "d", $str);
    $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "a", $str);
    $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "e", $str);
    $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "i", $str);
    $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "o", $str);
    $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "u", $str);
    $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "i", $str);
    $str = preg_replace("/(Đ)/", "d", $str);
    $str = preg_replace("/(:)/", "", $str);
    $str = str_replace(" ", "", str_replace("&*#39;","",$str));
    return $str;
}
function showthongbao($check , $text){
    return chuyendoi01($check,"1","<p class=text-success>$text THÀNH CÔNG</p>","<p class=text-danger>$text THẤT BẠI</p>");
}

function getpass()
{
    $id = $_SESSION['iddn'];
    return laymot("SELECT pass FROM taikhoan WHERE id=$id");
}

function changepass($id, $repass)
{
    $pass = hashpass($repass);
    return postdulieu("UPDATE `taikhoan` SET `pass` = '$pass' WHERE `id` = '$id'");
}
function chuyenso($num){
    return number_format($num, 0, ',', '.');
}
?>