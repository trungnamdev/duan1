<?php 
function checkdangnhap($us){
    return laymot("SELECT * FROM taikhoan WHERE tendn = '$us'");
}
?>