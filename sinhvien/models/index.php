<?php 
// BÀI TẬP
// Lấy id lop theo id sinh viên đang đăng nhập
function getIDSV(){
    return laymot("SELECT * FROM sv_lop WHERE idsv = ".$_SESSION['iddn']);
}
// Check bài Tập đã nộp
function getBTByIDBaiTap($idbt){
    return laydulieu("SELECT * FROM baitap WHERE idbaitap = $idbt ORDER BY idbaitap DESC");
}
// lấy bài tập từ id lớp
function getBaiTapByID(){
    $idlop = getIDSV()['idlop'];
    return laydulieu("SELECT * FROM baitap WHERE idlop = $idlop ORDER BY idbaitap DESC");
}

function nopbaitap($idbt){
 return laymot("SELECT * FROM baitap bt inner JOIN lop on bt.idlop = lop.id inner join khoahoc kh on lop.idkhoa = kh.id inner JOIN sv_lop svl ON lop.id like svl.idlop inner join taikhoan tk ON svl.idsv = tk.id WHERE idbaitap = $idbt AND tk.id = $_SESSION[iddn]"); 
}

function checknopbai($idbt){
    return laymot("SELECT * FROM `upfile` WHERE idsv = $_SESSION[iddn] and idbaitap = $idbt");
}
function checkdiem($idbt){
    return laymot("SELECT * FROM `upfile` WHERE idbaitap = $idbt");
}
function nopbai($file,$idbt){
    return postdulieu("INSERT INTO `upfile` (`idfile`, `file`, `idbaitap`, `idsv`, `ngaynop`, `diem`) VALUES (NULL, '$file', '$idbt', $_SESSION[iddn], NOW(),null)");
}

function noplaibt($file,$idbt){
    return postdulieu("UPDATE `upfile` SET `file` = '$file', `ngaynop` = NOW() WHERE idbaitap = $idbt AND idsv = $_SESSION[iddn]");
}

function btdanop(){
    return laydulieu("SELECT *,baitap.hinh AS 'hinhbt' FROM taikhoan INNER JOIN sv_lop ON sv_lop.idsv=taikhoan.id INNER JOIN lop ON lop.id=sv_lop.idlop INNER JOIN khoahoc ON khoahoc.id=lop.idkhoa INNER JOIN chude ON chude.id=khoahoc.chude INNER JOIN baitap ON lop.id=baitap.idlop WHERE taikhoan.id= $_SESSION[iddn] AND baitap.idbaitap in (SELECT idbaitap FROM upfile WHERE idsv = $_SESSION[iddn])");
}
function btchuanop(){
    return laydulieu("SELECT *,baitap.hinh AS 'hinhbt' FROM taikhoan INNER JOIN sv_lop ON sv_lop.idsv=taikhoan.id INNER JOIN lop ON lop.id=sv_lop.idlop INNER JOIN khoahoc ON khoahoc.id=lop.idkhoa INNER JOIN chude ON chude.id=khoahoc.chude INNER JOIN baitap ON lop.id=baitap.idlop WHERE taikhoan.id= $_SESSION[iddn] AND baitap.idbaitap not in (SELECT idbaitap FROM upfile WHERE idsv = $_SESSION[iddn])");
}
function laybaitapbyidsv(){
   return laydulieu("SELECT idbaitap FROM upfile WHERE idsv = $_SESSION[iddn]");
}
//end BÀI TẬP

function thongbao(){
   return laydulieu("SELECT * FROM thongbao INNER JOIN taikhoan ON taikhoan.id=thongbao.idngdang ORDER BY ngaydang"); 
}
function thongbaoct($id){
    return laymot("SELECT * FROM thongbao INNER JOIN taikhoan ON taikhoan.id=thongbao.idngdang WHERE idtb=$id");
}
function thongtinsv($id){
    return laydulieu("SELECT *,baitap.hinh AS 'hinhbt' FROM taikhoan INNER JOIN sv_lop ON sv_lop.idsv=taikhoan.id INNER JOIN lop ON lop.id=sv_lop.idlop INNER JOIN khoahoc ON khoahoc.id=lop.idkhoa INNER JOIN chude ON chude.id=khoahoc.chude INNER JOIN baitap ON lop.id=baitap.idlop  WHERE taikhoan.id= $id  ORDER BY ngayhethan ");
}
function thongtinsvtomtat($id)
{
    return laymot("SELECT * FROM taikhoan WHERE taikhoan.id= $id ");
}
function thongtingv($idgv){
    return laymot("SELECT * FROM gvlop INNER JOIN taikhoan ON taikhoan.id=gvlop.idgv WHERE idlop like '%$idgv%' ");
}

function khoahoc(){
    return laydulieu("SELECT * FROM khoahoc INNER JOIN chude ON chude.id=khoahoc.chude");
}
// function khoahocdadk($id){
//     return laydulieu("SELECT * FROM khoahoc INNER JOIN lop ON lop.idkhoa=khoahoc.id INNER JOIN sv_lop ON sv_lop.idlop=lop.id WHERE sv_lop.idsv=$id  GROUP BY khoahoc.id");
// }
function khoahocdadk(){
    return laydulieu("SELECT * FROM khoahoc INNER JOIN chude ON chude.id=khoahoc.chude WHERE id in (SELECT idkhoa FROM lop WHERE id IN (SELECT idlop FROM sv_lop WHERE idsv = $_SESSION[iddn]))");
}
// function khoahocchuadk($id){
//     return laydulieu("SELECT * FROM khoahoc INNER JOIN lop ON lop.idkhoa=khoahoc.id INNER JOIN sv_lop ON sv_lop.idlop=lop.id WHERE lop.idkhoa NOT IN(SELECT lop.idkhoa FROM khoahoc INNER JOIN lop ON khoahoc.id=lop.idkhoa INNER JOIN sv_lop ON sv_lop.idlop=lop.id WHERE sv_lop.idsv=$id) GROUP BY khoahoc.id");
// }
function khoahocchuadk(){
    return laydulieu("SELECT * FROM khoahoc INNER JOIN chude ON chude.id=khoahoc.chude WHERE id not in (SELECT idkhoa FROM lop WHERE id IN (SELECT idlop FROM sv_lop WHERE idsv = $_SESSION[iddn]))");
}
function lophoc($idkhoa){
    return laydulieu("SELECT * FROM lop WHERE idkhoa=$idkhoa");
}
function demlophoc($idkhoa){
    return laymot("SELECT count(*) as 'tong' FROM lop WHERE idkhoa=$idkhoa");
}
function gvkhoahoc($idlop){
    return laymot("SELECT * FROM taikhoan INNER JOIN gvlop ON gvlop.idgv=taikhoan.id  INNER JOIN lop ON lop.id=gvlop.idlop WHERE gvlop.idlop LIKE '%$idlop%'");
}
function dkkh($idsv,$idlop){
    return postdulieu("INSERT INTO `sv_lop` (`idsv`, `idlop`) VALUES ('$idsv', '$idlop')");}
function ttgvlop($idlop){
    return laymot("SELECT tk.* FROM taikhoan tk WHERE id = (SELECT idgv FROM gvlop WHERE idlop like '%$idlop%')");
}

function xetkhoahoc($id,$idsv){
    return laymot("SELECT * FROM khoahoc INNER JOIN lop ON khoahoc.id=lop.idkhoa INNER JOIN sv_lop ON sv_lop.idlop=lop.id WHERE lop.idkhoa=$id AND sv_lop.idsv=$idsv GROUP BY sv_lop.idsv");
}

function getlopsvdanghoc(){
    return laydulieu("SELECT lop.* , kh.tenkhoa FROM lop inner join khoahoc kh on kh.id = lop.idkhoa WHERE lop.id in (SELECT idlop FROM sv_lop WHERE idsv = $_SESSION[iddn])");
}
?>

