<?php 
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
        // echo("UPDATE thongbao
        // SET tdtb = '$tieude', noidung = '$noidung', idngdang = '$idnguoidang', ngaydang = now()
        // WHERE idtb = '$idthongbao';");
        // exit();
        return postdulieu("UPDATE thongbao
        SET tdtb = '$tieude', noidung = '$noidung', idngdang = '$idnguoidang', ngaydang = now()
        WHERE idtb = '$idthongbao';");    
    }
    function getallsv(){
        return laydulieu("SELECT * FROM `taikhoan` WHERE chucvu = 0");
    }
    function xoasv($id){
        postdulieu("DELETE FROM taikhoan WHERE id = '$id' AND chucvu = 0");
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

?>