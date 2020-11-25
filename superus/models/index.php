<?php 
    function thongbao(){
        return laydulieu("SELECT * FROM thongbao INNER JOIN taikhoan ON taikhoan.id=thongbao.idngdang ORDER BY ngaydang"); 
    }
    function thongbaoct($id){
        return laymot("SELECT * FROM thongbao INNER JOIN taikhoan ON taikhoan.id=thongbao.idngdang WHERE idtb=$id");
    }
    function getThongBao()
    {
        return laydulieu("SELECT * FROM thongbao inner JOIN taikhoan on thongbao.idngdang=taikhoan.id ORDER BY idtb");
    }

    function xoaThongBao($idtb)
    {
        return postdulieu("DELETE FROM `thongbao` WHERE `idtb` = $idtb");
    }

    function getMotTb($idtb)
    {
        return laymot("SELECT * FROM thongbao where idtb = $idtb ORDER BY idtb");
    }
    function themlophoc($tenlop,$tenkhoa){
        return postdulieulayid("INSERT INTO `lop` (`id`, `tenlop`, `idkhoa`) VALUES (NULL, '$tenlop', '$tenkhoa');");
    }
    function themthongbao($tieude, $noidung, $idnguoidang)
    {
        return postdulieu("INSERT INTO thongbao(tdtb,noidung,idngdang,ngaydang) VALUES('$tieude', '$noidung', '$idnguoidang', now())");    
    }

    function suathongbao($tieude, $noidung, $idnguoidang, $idthongbao)
    {
        return postdulieu("UPDATE thongbao
        SET tdtb = '$tieude', noidung = '$noidung', idngdang = '$idnguoidang', ngaydang = now()
        WHERE idtb = '$idthongbao';");    
    }
    function getallsv($chucvu){
        return laydulieu("SELECT * FROM `taikhoan` WHERE chucvu = $chucvu");
    }
    function xoasv($id){
        postdulieu("DELETE FROM taikhoan WHERE id = '$id'");
    }
    function addtk($hoten,$hinh,$ngaysinh,$email,$sdt,$chucvu,$pass,$diachi,$sex){
        return getlastid("INSERT INTO `taikhoan` (`id`, `hoten`, `hinh`, `ngaysinh`, `email`, `sdt`, `chucvu`, `tendn`, `pass`, `diachi`, `sex`) VALUES (NULL, '$hoten', '$hinh', '$ngaysinh', '$email', '$sdt', '$chucvu', '', '$pass', '$diachi', '$sex');");
    }
    function addtk2($tendn,$id){
        return postdulieu("UPDATE `taikhoan` SET `tendn` = '$tendn' WHERE `taikhoan`.`id` = $id");
    }
    function getsvid($id){
        return laymot("SELECT * FROM taikhoan WHERE id=$id");
    }
    function alllophoc(){
        return laydulieu("SELECT *,lop.id as idlop FROM lop INNER JOIN khoahoc ON khoahoc.id=lop.idkhoa ORDER BY  lop.id");
    }
    function allkhoahoc(){
        return laydulieu("SELECT * FROM  khoahoc ");
    }
    function getMotlophoc($id)
    {
        return laymot("SELECT * FROM lop where id = $id");
    }
    function sualh($tenlop, $tenkhoa, $idlop)
    {
        return postdulieu("UPDATE lop
        SET tenlop = '$tenlop', idkhoa = '$tenkhoa'
        WHERE id = '$idlop';");    
    }
    function xoalophoc($id)
    {
        return postdulieu("DELETE FROM `lop` WHERE `id` = $id");
    }
    function demsoluong($tenbang) {
        return laymot("SELECT COUNT(*) as tong FROM $tenbang");
    }

    function demnguoi($id) 
    {
        return laymot("SELECT COUNT(*) as tong FROM taikhoan where chucvu = $id");
    }
    function gvlop($id){
        return laymot("SELECT * FROM taikhoan INNER JOIN gvlop ON gvlop.idgv=taikhoan.id WHERE gvlop.idlop LIKE '%$id%'");
    }
    function allgv(){
        return laydulieu("SELECT * FROM taikhoan WHERE chucvu=1");
    }
    function idlop($idgv){
        return laymot("SELECT * FROM `gvlop` WHERE idgv=$idgv");
    }
    function sualopgv($idgv,$idlop){
        return postdulieu("UPDATE gvlop
        SET idlop = '$idlop' WHERE idgv = '$idgv';");
    }
    function gv_getidlop($idlop){
        $mangidlop = explode(",", $idlop);
        return $mangidlop;}
    //lay  khoa hoc
    function getAllKH(){
        return laydulieu("SELECT * FROM khoahoc ORDER BY id DESC");
    } 
    //lay 1 khos hoc 
    function getKhoaHoc($id){
        return laymot("SELECT * FROM khoahoc WHERE id = $id");
    }
    // lay chu 1 de
    function getChuDe($id){
        return laymot("SELECT * FROM chude WHERE id = $id");
    }
    // lay all chu de
    function getAllChuDe(){
        return laydulieu("SELECT * FROM chude ");
    }
    // xoa chu de 
    function deleteChuDe($idcd){
        postdulieu("DELETE FROM `chude` WHERE `id` = $idcd");
    }
    // them chu de
    function insertChuDe($chude){
        return postdulieu("INSERT INTO chude(tenchude) VALUES('$chude')");
    }
    // them khoa hoc
    function insertKhoaHoc($tenkh,$mota,$chude,$tenhinh,$tien){
        return postdulieu("INSERT INTO khoahoc(tenkhoa,mota,chude,hinh,giatien) VALUES('$tenkh', '$mota', '$chude', '$tenhinh','$tien')");
    }
    // xoa khoa hoc 
    function deleteKhoaHoc($idkh){
        postdulieu("DELETE FROM `khoahoc` WHERE `id` = $idkh");
    }
    //sua khoa hoc
    function updateChuDe($chude,$idcd){
        
        return postdulieu(" UPDATE chude
                            SET tenchude = '$chude' 
                            WHERE id = '$idcd';");
                          
                        }
    // sua khoa hoc 
    function updateKhoaHoc($tenkh,$mota,$chude,$tenhinh,$tien,$idkh){
        if($tenhinh != ""){
         postdulieu(" UPDATE khoahoc
                            SET tenkhoa = '$tenkh', mota = '$mota', giatien = '$tien', chude = '$chude', hinh = '$tenhinh' 
                            WHERE id = '$idkh'");
        }else{ postdulieu("  UPDATE khoahoc
                                    SET tenkhoa = '$tenkh', mota = '$mota', giatien = '$tien', chude = '$chude' 
                                    WHERE id = '$idkh'");}
    }
    function suathongtintk($id,$hoten,$hinh,$ngaysinh,$email,$sdt,$diachi,$sex){
        if($hinh != ""){
        return postdulieu("UPDATE `taikhoan` SET `hoten` = '$hoten', `hinh` = '$hinh', `ngaysinh` = '$ngaysinh', `email` = '$email', `sdt` = '$sdt', `diachi` = '$diachi', `sex` = '$sex' WHERE `taikhoan`.`id` = $id");
    }else{
        return postdulieu("UPDATE `taikhoan` SET `hoten` = '$hoten', `ngaysinh` = '$ngaysinh', `email` = '$email', `sdt` = '$sdt', `diachi` = '$diachi', `sex` = '$sex' WHERE `taikhoan`.`id` = $id");
    }
    // thong tin chi tiet giao vien

}
function thongtinsvtomtat($id)
{
    return laymot("SELECT * FROM taikhoan WHERE taikhoan.id= $id ");
}
    function doipasstk($id,$pass){
       return postdulieu("UPDATE `taikhoan` SET `pass` = '$pass' WHERE `taikhoan`.`id` = $id");
    }
?>