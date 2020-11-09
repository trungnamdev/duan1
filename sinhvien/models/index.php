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
    laymot("SELECT * FROM baitap bt inner JOIN lop on bt.idlop = lop.id inner join khoahoc kh on lop.idkhoa = kh.id inner JOIN gvlop gvl ON lop.id like gvl.idgv inner join taikhoan tk ON gvl.idgv = tk.id WHERE idbaitap =$idbt");
}
?>