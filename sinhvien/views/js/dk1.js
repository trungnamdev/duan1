$(document).ready(function() {
    $("#baitap").change(function() {
        $('#btshow').html($(this).val().split('\\').pop());
    });
    $(".dkkh").click(function() {
        var a = $(this).parent().children()[1].childNodes[1].value;
        console.log(a);
        $.ajax({
            method: "POST", // phương thức dữ liệu được truyền đi
            url: "index.php?act=dkkh1", // gọi đến file server show_data.php để xử lý
            data: { id: a }, //lấy toàn thông tin các fields trong form bằng hàm serialize của jquery
            success: function(data) { //kết quả trả về từ server nếu gửi thành công
                alert("ĐĂNG KÝ THÀNH CÔNG");
                location.reload();
            }
        });
    });
});