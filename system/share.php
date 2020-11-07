<?php 
function xoatag($text){
    return trim(strip_tags($text));
}
function setnum($num){
    return settype($num ,"int");
}
function hashpass($pass){
    return password_hash($pass,PASSWORD_DEFAULT);
}
?>