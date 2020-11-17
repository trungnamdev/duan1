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

    function demsoluong($tenbang) {
        return laymot("SELECT COUNT(*) as tong FROM $tenbang");
    }

    function demnguoi($id) 
    {
        return laymot("SELECT COUNT(*) as tong FROM taikhoan where chucvu = $id");
    }
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
    // them khoa hoc
    function insertKhoaHoc($tenkh,$mota,$chude,$tenhinh){
        return postdulieu("INSERT INTO khoahoc(tenkhoa,mota,chude,hinh) VALUES('$tenkh', '$mota', '$chude', '$tenhinh')");
    }
    // xoa khoa hoc 
    function deleteKhoaHoc($idkh){
        postdulieu("DELETE FROM `khoahoc` WHERE `id` = $idkh");
    }
    // sua khoa hoc 
    function udateKhoaHoc($tenkh,$mota,$chude,$tenhinh,$idkh){
        if($tenhinh != ''){
        return postdulieu(" UPDATE khoahoc
                            SET tenkhoa = '$tenkh', mota = '$mota', chude = '$chude', hinh = '$tenhinh'
                            WHERE id = '$idkh';");
        }else  return postdulieu("  UPDATE khoahoc
                                    SET tenkhoa = '$tenkh', mota = '$mota', chude = '$chude'
                                    WHERE id = '$idkh';");
    }
?>