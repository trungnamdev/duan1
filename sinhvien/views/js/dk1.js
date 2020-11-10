$(document).ready(function() {
    $("#baitap").change(function() {
        $('#btshow').html($(this).val().split('\\').pop());
    });
});

function erroimg(img) {
    img.src = "../../system/dfimage.jpg";
    return true;
}