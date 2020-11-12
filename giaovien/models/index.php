<?php 
// Bài tập
function getIDGV(){
    return laymot("SELECT * FROM gvlop WHERE idgv = ".$_SESSION['iddn']);
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

//Lấy các lớp đang dạy
function GV_getlopdangday()
{
    $mangidlop = gv_getidlop();
    $dieukien = implode(" or lop.id = ", $mangidlop);
    // var_dump("SELECT * FROM lop INNER JOIN khoahoc kh ON kh.id=lop.idkhoa WHERE lop.id = ".$dieukien." ORDER BY id DESC");
    // exit();
    return laydulieu("SELECT * FROM lop INNER JOIN khoahoc kh ON kh.id=lop.idkhoa WHERE lop.id = ".$dieukien." ORDER BY lop.id DESC");
}
?>