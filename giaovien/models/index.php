<?php 
// Bài tập
function getIDGV(){
    return laymot("SELECT * FROM gvlop WHERE idgv = ".$_SESSION['iddn']);
}
function ttbt($idbt){
    return laymot("SELECT * FROM `baitap` WHERE idbaitap=$idbt");
}
function xoabt($id){
    return postdulieu("DELETE FROM `baitap` WHERE `baitap`.`idbaitap` = $id");
}
// đếm bt đã nộp
function getBTDaNop($idbt){
    return laymot("SELECT count(*) AS 'slbt' FROM upfile WHERE idbaitap = $idbt");
}
// đếm bt đã chấm
function BTDaCham($idlop){
    return laymot("SELECT * FROM baitap WHERE idlop = $idlop AND diem IN ( ) ");
}

//Lấy bài tập theo bài tập đã giao
function gv_getBaitapByIDBT($idbt) {
    return laymot("SELECT bt.idbaitap, bt.hinh, bt.ngayhethan, tenlop, tenbaitap, tenkhoa FROM baitap bt INNER JOIN lop ON bt.idlop=lop.id INNER JOIN khoahoc on khoahoc.id = lop.idkhoa WHERE bt.idbaitap = $idbt");
}

//Lấy ID lớp theo id bài tập
function getIdLopTheoBT($idbt)
{
    return laymot("SELECT idlop FROM `baitap` WHERE idbaitap = $idbt");
}

//Lấy danh sách sinh viên của lớp theo id bài tập
function getDsLopByBt($idbt)
{
    $idlop = getIdLopTheoBT($idbt)['idlop'];
    if(!is_null($idlop)){
        return laydulieu("SELECT * FROM sv_lop INNER JOIN taikhoan ON sv_lop.idsv = taikhoan.id WHERE sv_lop.idlop = $idlop");
    }
    }

//Xem tiến độ nộp bài của sinh viên
function getAllBaiTapSv($idbt)
{
    return laydulieu("SELECT file, idsv, diem FROM baitap bt INNER JOIN upfile on bt.idbaitap = upfile.idbaitap INNER JOIN taikhoan ON upfile.idsv = taikhoan.id WHERE bt.idbaitap = $idbt");
}

// lấy từng id lớp của gv
function gv_getidlop(){
    if(is_array(getIDGV())){
    $idlop = getIDGV()['idlop'];
    $mangidlop = explode(",", $idlop);
    return $mangidlop;
    }
    else return null;
}

// lấy bài tập từ id lớp
function GV_getBaiTapByID($idlop){
    return laydulieu("SELECT * FROM baitap WHERE idlop = $idlop ORDER BY idbaitap DESC");
}
function tenlop($idlop){
    return laymot("SELECT * FROM lop WHERE id = $idlop");
}
function thembt($tenbt,$imgbt,$mota,$idlop,$ngaygiao,$hanchot){
 return postdulieu("INSERT INTO `baitap` ( `tenbaitap`, `hinh`, `motabt`, `idlop`, `ngaygiao`, `ngayhethan`) VALUES ( '$tenbt', '$imgbt', '$mota', '$idlop', '$ngaygiao', '$hanchot');");   
}
// đếm số sv trong lớp.
function countlop($idlop){
    return laymot("SELECT COUNT(*) AS tong FROM sv_lop WHERE idlop=$idlop");
}
function countLopGV($idlop){
    return laymot("SELECT COUNT(*) AS tong FROM gvlop WHERE idlop LIKE '%$idlop%' AND idgv = $_SESSION[iddn]");
}
//Lấy các lớp đang dạy
function GV_getlopdangday()
{
    $mangidlop = gv_getidlop();
    if(isset($mangidlop)) {
        $dieukien = implode(" or lop.id = ", $mangidlop);
        // var_dump("SELECT * FROM lop INNER JOIN khoahoc kh ON kh.id=lop.idkhoa WHERE lop.id = ".$dieukien." ORDER BY id DESC");
        // exit();
        return laydulieu("SELECT *,lop.id as idlopd FROM lop INNER JOIN khoahoc kh ON kh.id=lop.idkhoa WHERE lop.id = ".$dieukien." ORDER BY lop.id DESC");
    }else
        return null;
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
    return laymot("SELECT hinh FROM taikhoan WHERE id = (SELECT idgv FROM gvlop WHERE idlop like '%$idlop%' limit 1)");
}
// tên khóa học
function getKHByIDLop($idlop){
    return laymot("SELECT * FROM khoahoc WHERE id IN (SELECT idkhoa FROM lop WHERE id = $idlop) ");
}
//
// thong tin chi tiet giao vien
function thongtinsvtomtat($id)
{
    return laymot("SELECT * FROM taikhoan WHERE taikhoan.id= $id ");
}

function khoahocdadk($idsv){
    return laydulieu("SELECT * FROM khoahoc WHERE id in (SELECT idkhoa FROM lop WHERE id IN (SELECT idlop FROM sv_lop WHERE idsv =$idsv))");
}
function hslophoc($idlop){
    return laydulieu("SELECT * FROM sv_lop INNER JOIN taikhoan ON taikhoan.id=sv_lop.idsv WHERE idlop =$idlop");
}
function layBaiTapByKH($idkh,$idsv){
    return laydulieu("SELECT * FROM baitap WHERE idlop IN (SELECT idlop FROM sv_lop WHERE idsv = $idsv) AND idlop IN (SELECT id FROM lop WHERE idkhoa = $idkh)");
} 
function checknopbai($idbt,$idsv){
    return laymot("SELECT * FROM `upfile` WHERE idsv = $idsv and idbaitap = $idbt");
}
// cham diem 
function chamdiem($diem,$file){
    postdulieu("UPDATE `upfile` SET `diem` = '$diem' WHERE `upfile`.`idfile` = '$file'");
}
// loi phe
function loiphe($loiphe,$file){
    postdulieu("UPDATE `upfile` SET `loiphe` = '$loiphe' WHERE `upfile`.`idfile` = '$file'");
}
function upbt($idbt,$tenbt,$tenhinh,$mota,$lophoc,$ngaygiao,$hanchot){
   if ($tenhinh=='') {
    postdulieu("UPDATE `baitap` SET `tenbaitap` = '$tenbt',`motabt` = '$mota', `idlop` = '$lophoc', `ngaygiao` = '$ngaygiao', `ngayhethan` = '$hanchot' WHERE `baitap`.`idbaitap` = $idbt;");
   } else {
    postdulieu("UPDATE `baitap` SET `tenbaitap` = '$tenbt', `hinh` = '$tenhinh', `motabt` = '$mota', `idlop` = '$lophoc', `ngaygiao` = '$ngaygiao', `ngayhethan` = '$hanchot' WHERE `baitap`.`idbaitap` = $idbt;");
   }
   
}
// lay tt sinh vien theo lop
function getSVByLop($idlop){
    return laydulieu("SELECT * FROM taikhoan WHERE id IN (SELECT idsv FROM sv_lop WHERE idlop = $idlop )");

}
// lay ten khoa hoc by id lop
function getTTKhoaByIDLop($idlop){
    return laymot("SELECT * FROM khoahoc WHERE id IN (SELECT idkhoa FROM lop WHERE id = $idlop)   ");
}
function baitaplop($id){
    return laydulieu("SELECT * FROM `baitap` WHERE idlop = '$id'");
}
function dembtlop($id){
    return laymot("SELECT COUNT(*) as 'tong' FROM baitap WHERE idlop = '$id'");
}
?>
