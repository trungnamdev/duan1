<?php 
// Bài tập
function getIDGV(){
    return laymot("SELECT * FROM gvlop WHERE idgv = ".$_SESSION['iddn']);
}
// đếm bt đã nộp
function getBTDaNop($idbt){
    return laymot("SELECT count(*) AS 'slbt' FROM upfile WHERE idbaitap = $idbt");
}
// đếm bt đã chấm
function BTDaCham($idlop){
    return laymot("SELECT * FROM baitap WHERE idlop = $idlop AND diem IN ( ) ");
}
// lấy từng id lớp của gv
function gv_getidlop(){
    $idlop = getIDGV()['idlop'];
    $mangidlop = explode(",", $idlop);
    return $mangidlop;
}

// lấy bài tập từ id lớp
function GV_getBaiTapByID($idlop){
    return laydulieu("SELECT * FROM baitap WHERE idlop = $idlop ORDER BY idbaitap DESC");
}
function tenlop($idlop){
    return laymot("SELECT * FROM lop WHERE id = $idlop");
}
// đếm số sv trong lớp.
function countlop($idlop){
    return laymot("SELECT COUNT(*) AS tong FROM sv_lop WHERE idlop=$idlop");
}
//Lấy các lớp đang dạy
function GV_getlopdangday()
{
    $mangidlop = gv_getidlop();
    $dieukien = implode(" or lop.id = ", $mangidlop);
    // var_dump("SELECT * FROM lop INNER JOIN khoahoc kh ON kh.id=lop.idkhoa WHERE lop.id = ".$dieukien." ORDER BY id DESC");
    // exit();
    return laydulieu("SELECT *,lop.id as idlopd FROM lop INNER JOIN khoahoc kh ON kh.id=lop.idkhoa WHERE lop.id = ".$dieukien." ORDER BY lop.id DESC");
}
function thongbao(){
    return laydulieu("SELECT * FROM thongbao INNER JOIN taikhoan ON taikhoan.id=thongbao.idngdang ORDER BY ngaydang"); 
 }
 function thongbaoct($id){
     return laymot("SELECT * FROM thongbao INNER JOIN taikhoan ON taikhoan.id=thongbao.idngdang WHERE idtb=$id");
 }
 

//  nhan tin
function demsvlop($idlop){
    return laymot("SELECT COUNT(*) as 'sl' FROM sv_lop WHERE idlop = $idlop");
}
function gethinhlopchat($idlop){
    return laymot("SELECT hinh FROM taikhoan WHERE id = (SELECT idgv FROM gvlop WHERE idlop like '%$idlop%')");
}
// tên khóa học
function getKHByIDLop($idlop){
    return laymot("SELECT * FROM khoahoc WHERE id IN (SELECT idkhoa FROM lop WHERE id = $idlop) ");
}
?>