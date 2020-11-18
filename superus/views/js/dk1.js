$(document).ready(function() {
    tinymce.init({ selector: 'textarea' });

    $("#ttipanh").change(function() {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#showanh').attr("src", e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });

    $("#formsv").validate({
        rules: {
            "ht": {
                required: true,
            },
            "ngaysinh": {
                required: true,
                date: true
            },
            "email": {
                required: true,
                email: true
            },
            "sdt": {
                required: true,
                number: true,
                maxlength: 9,
                minlength: 9

            },
            "diachi": {
                required: true
            },
            "sex": {
                required: true
            },
            "imgsv": {
                required: true
            }
        },
        messages: {
            "ht": {
                required: "Xin vui lòng nhập họ tên"
            },
            "ngaysinh": {
                required: "Xin vui lòng chọn ngày sinh",
                date: "không đúng định dạng ngày tháng năm"
            },
            "email": {
                required: "Xin vui lòng nhập email",
                email: "Không đúng định dạng email"
            },
            "sdt": {
                required: "Vui lòng nhập số điện thoại",
                number: "Sai định dạng số điện thoại",
                maxlength: "Sai chiều dài số điện thoại quy định",
                minlength: "Sai quá chiều dài số điện thoại quy định"
            },
            "diachi": {
                required: "Vui lòng nhập địa chỉ"
            },
            "sex": {
                required: "Vui lòng chọn giới tính"
            },
            "imgsv": {
                required: "Vui lòng chọn ảnh sinh viên"
            }
        }
    });
    $('#ngaysinh').datepicker({
        changeYear: true,
        changeMonth: true,
        yearRange: '-50:-16',
        dateFormat: 'yy-mm-dd'
    });

    $("#formkh").validate({
        rules: {
            "tenkh": {
                required: true,
            },
            "mota": {
                required: true
            },
            "anhkh": {
                required: true
            }
        },
        messages: {
            "tenkh": {
                required: "Xin vui lòng nhập tên khóa học"
            },
            "mota": {
                required: "Xin vui lòng nhập mô tả"

            },
            "anhkh": {
                required: "Vui lòng chọn ảnh khóa học"
            }
        }
    });
    $("#formcd").validate({
        rules: {
            "tencd": {
                required: true
            }
        },
        messages: {
            "tencd": {
                required: "Xin vui lòng nhập tên chủ đề"
            }
        }
    });


});