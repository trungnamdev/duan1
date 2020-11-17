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
    function themlophoc($tenlop,$tenkhoa){
        return postdulieu("INSERT INTO `lop` (`id`, `tenlop`, `idkhoa`) VALUES (NULL, '$tenlop', '$tenkhoa');");
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
    function alllophoc(){
        return laydulieu("SELECT *,lop.id as idlop FROM lop INNER JOIN khoahoc ON khoahoc.id=lop.idkhoa");
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
?>