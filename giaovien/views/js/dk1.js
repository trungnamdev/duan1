$(document).ready(function() {
    //chọn tất cả
    $('#selectAll').click(function(event) {        
        $(':checkbox').each(function() {
            this.checked = true;                        
        });
        
        // $btn = document.getElementById('selectAll').innerHTML = '<svg fill="#384E85" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="1em"><path class="uim-primary" d="M21,22H3a.99974.99974,0,0,1-1-1V3A.99974.99974,0,0,1,3,2H21a.99974.99974,0,0,1,1,1V21A.99974.99974,0,0,1,21,22ZM4,20H20V4H4Z"></path></svg>  Bỏ chọn tất cả';
        // $('#selectAll').prop('selectAll','selectAllgdg');
    });

    //Hủy chọn
    $('#unselectAll').click(function(event) {        
        $(':checkbox').each(function() {
            this.checked = false;                        
        });
        
        // $btn = document.getElementById('selectAll').innerHTML = '<svg fill="#384E85" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="1em"><path class="uim-primary" d="M21,22H3a.99974.99974,0,0,1-1-1V3A.99974.99974,0,0,1,3,2H21a.99974.99974,0,0,1,1,1V21A.99974.99974,0,0,1,21,22ZM4,20H20V4H4Z"></path></svg>  Bỏ chọn tất cả';
        // $('#selectAll').prop('selectAll','selectAllgdg');
    });

    //Ajax chấm bài
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


