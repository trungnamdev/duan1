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
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);  //true: enables exceptions
    try {
   $mail->SMTPDebug = 0;  // Enable verbose debug output
   $mail->isSMTP();  
   $mail->CharSet  = "utf-8";
   $mail->Host = 'smtp.gmail.com';  //SMTP servers
   $mail->SMTPAuth = true; // Enable authentication
   $mail->Username = 'themgamilvo';  // SMTP username
   $mail->Password = 'matkhau';   // SMTP password
   $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
   $mail->Port = 465;  // port to connect to                
   $mail->setFrom('namn71202@gmail.com', 'Trung Nam');
   $mail->addAddress($e, $u); //mail và tên người nhận       
   $mail->isHTML(true);  // Set email format to HTML
   $mail->Subject = $tieude;                
   $mail->Body= $body;
   $mail->send();
} catch (Exception $e) {
    echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
}
}

?>