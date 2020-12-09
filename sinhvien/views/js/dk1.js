$(document).ready(function() {
    $("#baitap").change(function() {
        $('#btshow').html($(this).val().split('\\').pop());
    });


    $("#chuakh").on("click", ".dkkh", function() {
        var a = $(this).parent().children()[1].childNodes[1].value;
        $.ajax({
            method: "POST", // phương thức dữ liệu được truyền đi
            url: "index.php?act=dkkh1", // gọi đến file server show_data.php để xử lý
            data: { id: a, ht: ht }, //lấy toàn thông tin các fields trong form bằng hàm serialize của jquery
            success: function(data) { //kết quả trả về từ server nếu gửi thành công 
                $("#chuakh").html(data);
                $("#tienconlai").html("Số tiền hiện có : " + tienconlai + " VNĐ");
                if (tbdkkh == '0') {
                    toastr.warning('ĐĂNG KÝ KHÔNG THÀNH CÔNG - SỐ DƯ KHÔNG ĐỦ');
                } else {
                    toastr.success('ĐĂNG KÝ THÀNH CÔNG');
                }
            }
        });
    });
    $("#khoahocct").on("click", "#tet", function() {
        var idlop = $(this).parent().children()[1].childNodes[1].value;
        var idkh = $('#lophoc').attr('idkh');

        $.ajax({
            method: "POST", // phương thức dữ liệu được truyền đi
            url: "index.php?act=dkkh2", // gọi đến file server show_data.php để xử lý
            data: { idkh: idkh, idlop: idlop }, //lấy toàn thông tin các fields trong form bằng hàm serialize của jquery
            success: function(data) { //kết quả trả về từ server nếu gửi thành công 
                $("#khoahocct").html(data);
                $("#tienconlai").html("Số tiền hiện có : " + tienconlai + " VNĐ");
                if (tbdkkh == '0') {
                    toastr.warning('ĐĂNG KÝ KHÔNG THÀNH CÔNG - SỐ DƯ KHÔNG ĐỦ');
                } else {
                    toastr.success('ĐĂNG KÝ THÀNH CÔNG');
                }
            }
        });
    });

});