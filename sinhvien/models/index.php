<?php 
// function getbaitapid($id){
//     return laymot("SELECT * FROM baitap WHERE idbaitap = $id");
// }
// function getgiaovien_lopid($id){
//     return laymot("SELECT * FROM gvlop gvl inner join taikhoan tk on gvl.idgv = tk.id WHERE idlop like '%$id%'");
//     // echo $id;
// }
// function getkhoahocid($id){
//     return laymot("SELECT * FROM `khoahoc` WHERE id=$id");
// }
function nopbaitap($idbt){
    return laymot("SELECT * FROM baitap bt inner JOIN lop on bt.idlop = lop.id inner join khoahoc kh on lop.idkhoa = kh.id inner JOIN gvlop gvl ON lop.id like gvl.idgv inner join taikhoan tk ON gvl.idgv = tk.id WHERE idbaitap= $idbt");
}
function checknopbai($idbt){
    return laymot("SELECT * FROM `upfile` WHERE idsv = $_SESSION[iddn] and idbaitap = $idbt");
}
function nopbai($file,$idbt){
    return postdulieu("INSERT INTO `upfile` (`idfile`, `file`, `idbaitap`, `idsv`, `ngaynop`, `diem`) VALUES (NULL, '$file', '$idbt', $_SESSION[iddn], NOW(),null)");
}
function noplaibt($file,$idbt){
    return postdulieu("UPDATE `upfile` SET `file` = '$file', `ngaynop` = NOW() WHERE idbaitap = $idbt AND idsv = $_SESSION[iddn]");
}
?>