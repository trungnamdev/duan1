<div class="noidung" id="noidung">
    <?php $pagename = "Đổi mật khẩu"?>
    <div class="header-box">
        <div class="tieude h1">ĐỔI MẬT KHẨU</div>
    </div>
    <div class="d-row">
        <form id="myform" class="col-12 pl-0" action="index.php?act=changepass_" method="post">
            <div class="form-group pl-0 pr-0 col-12">
                <label for="pass">Nhập mật khẩu cũ</label>
                <input type="text" class="form-control" id="pass" name="pass" data-require>
                <span class="text-danger" id="pass_err"></span>
            </div>
            <div class="form-group pl-0 pr-0  col-12">
                <label for="newpass">Mật khẩu mới</label>
                <input type="text" class="form-control" id="newpass" name="newpass" data-require>
                <span class="text-danger" id="newpass_err"></span>

            </div>
            <div class="form-group pl-0 pr-0 col-12">
                <label for="newpass">Nhập lại mật khẩu</label>
                <input type="text" class="form-control" id="repass" name="repass" data-require
                    data-conditional="checkpassword">
                <span class="text-danger" id="repass_err"></span>

            </div>
            <input type="submit" class="col-12  btn btn-primary" value="Đổi mật khẩu">
        </form>
    </div>
    <?= $mess ?>
</div>

<script>
    
$(document).ready(function() {
    jQuery.validator.addMethod("looklike", function(value, element, param) {
        return repass == newpass;
    });
    
    $('#myform').validate({ // initialize the plugin
        
        rules: {
            pass: {
                required: true,
            },
            repass: {
                required: true,
                equalTo: "#newpass"

            },
            newpass: {
                required: true,
            }
        },

        messages: {
			"pass": {
				required: "<span class='text-danger'>Mời nhập mật khẩu cũ<span>",
			},
			"newpass": {
				required: "<span class='text-danger'>Mời nhập mật khẩu mới<span>",
			},
			"repass": {
                required: "<span class='text-danger'>Mời nhập lại mật khẩu<span>",
				equalTo: "<span class='text-danger'>Mật khẩu không khớp<span>",
			}
		}
    });

});
</script>