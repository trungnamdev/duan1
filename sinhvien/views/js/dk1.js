$(document).ready(function() {
    $("#baitap").change(function() {
        $('#btshow').html($(this).val().split('\\').pop());
    });
});