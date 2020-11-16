$(document).ready(function() {
    tinymce.init({ selector: 'textarea' });
    //chọn tất cả
    $('#selectAll').click(function(event) {
        $(':checkbox').each(function() {
            this.checked = true;
        });
    });

    //Hủy chọn
    $('#unselectAll').click(function(event) {
        $(':checkbox').each(function() {
            this.checked = false;
        });
    });

    //Ajax chấm bài
    // $("#baitap").change(function() {
    //     $('#btshow').html($(this).val().split('\\').pop());
    // });
    //  k hieu cho này dung vào gì
    $(".dkkh").click(function() {
        var a = $(this).parent().children()[1].childNodes[1].value;
        console.log(a);
        $.ajax({
            method: "POST", // phương thức dữ liệu được truyền đi
            url: "index.php?act=dkkh1", // gọi đến file server show_data.php để xử lý
            data: { id: a }, //lấy toàn thông tin các fields trong form bằng hàm serialize của jquery
            success: function(data) { //kết quả trả về từ server nếu gửi thành côn
                location.reload();
            }
        });
    });
    $("#checkform").validate({
        rules: {
            "tenbt": {
                required: true,
            },
            "ngaygiao": {
                required: true,
                date: true
            },
            "hanchot": {
                required: true,
                date: true
            },
            "mota": {
                required: true
            }
        },
        messages: {
            "tenbt": {
                required: "Xin vui lòng nhập tên bài tập"
            },
            "ngaygiao": {
                required: "Xin vui lòng nhập ngày giao",
                date: "Vui lòng nhập đúng định dạng ngày"

            },
            "hanchot": {
                required: "Xin vui lòng nhập ngày hết hạn",
                date: "Vui lòng nhập đúng định dạng ngày"

            },
            "mota": {
                required: "Xin vui lòng nhập mô tả",

            }
        }
    });

    // ajax cham bai
    $('.chamdiemop').change(function() {
        diem = $(this).val();
        typeid = $(this).attr('typeid');
        $.ajax({
            type: "post",
            url: "index.php?act=chamdiemajax",
            data: { diem: diem, typeid: typeid }
        });
    });

    // check loi ngaythang
    $(".from").datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1,
        minDate: 0,
        dateFormat: 'yy-mm-dd',
        onClose: function(selectedDate) {
            $(".to").datepicker("option", "minDate", selectedDate);
        }
    });
    $(".to").datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1,
        minDate: 0,
        dateFormat: 'yy-mm-dd',
        onClose: function(selectedDate) {
            $(".from").datepicker("option", "maxDate", selectedDate);
        }
    });
    $("#ttipanh").change(function() {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#showanh').attr("src", e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });
});