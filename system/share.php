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
    if(!is_file($GLOBALS['duongdan'] . $file['name'])){
        $noiup = $GLOBALS['duongdan'] . basename($file['name']);
        move_uploaded_file($file["tmp_name"],$noiup);
    }
}
function showfile($text){
    return $GLOBALS['duongdan'].$text;
}  
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

?>