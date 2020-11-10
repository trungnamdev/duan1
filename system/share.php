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
?>