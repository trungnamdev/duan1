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
 return laymot("SELECT * FROM baitap bt inner JOIN lop on bt.idlop = lop.id inner join khoahoc kh on lop.idkhoa = kh.id inner JOIN sv_lop svl ON lop.id like svl.idlop inner join taikhoan tk ON svl.idsv = tk.id WHERE idbaitap = $idbt AND tk.id = $_SESSION[iddn]"); 
}
function thongbao(){
   return laydulieu("SELECT * FROM thongbao INNER JOIN taikhoan ON taikhoan.id=thongbao.idngdang ORDER BY ngaydang"); 
}
function thongtinsv($id){
    return laydulieu("SELECT * FROM taikhoan INNER JOIN sv_lop ON sv_lop.idsv=taikhoan.id INNER JOIN lop ON lop.id=sv_lop.idlop INNER JOIN khoahoc ON khoahoc.id=lop.idkhoa INNER JOIN chude ON chude.id=khoahoc.chude INNER JOIN baitap ON lop.id=baitap.idlop  WHERE taikhoan.id= $id  ORDER BY ngayhethan ");
}
function thongtinsvtomtat($id)
{
    return laymot("SELECT * FROM taikhoan WHERE taikhoan.id= $id ");
}
function thongtingv($idgv){
    return laymot("SELECT * FROM gvlop INNER JOIN taikhoan ON taikhoan.id=gvlop.idgv WHERE idlop like '%$idgv%' ");
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
function ttgvlop($idlop){
    return laymot("SELECT tk.* FROM taikhoan tk WHERE id = (SELECT idgv FROM gvlop WHERE idlop like '%$idlop%')");
}
?>