<style>
.box-right {
    width: 30%;
    height: 100%;
    overflow-y: scroll;
}

/* width */
.box-right::-webkit-scrollbar {
  width: 5px;
}

/* Track */
.box-right::-webkit-scrollbar-track {
  background: #fff; 
}
 
/* Handle */
.box-right::-webkit-scrollbar-thumb {
  background: #efefef; 
}

/* Handle on hover */
.box-right::-webkit-scrollbar-thumb:hover {
  background: #999; 
}
</style>
<div class="header-box">
    <div class="tieude h1">Tin nhắn</div>
</div>
<div class="thongbao tinnhan mt-5">
    <?php foreach($alllop as $lop){ ?>
        <div class="item mb-2 float-left">
        <div class="col-2 float-left p-0">
            <img class="rounded-circle" src="../sinhvien/views/img/avatar.jpg" alt="">
        </div>
        <div class="col-10 float-left pr-0">
            <a href="#" class="tieude-tb"><?= $lop['tenlop'] ?></a>
            <div class="text-secondary info mt-2 pb-3">
                <span class=" mr-5"><?= $lop['tenkhoa'] ?></span>
                <span>17:35</span>
            </div>
        </div>
    </div>
    <?php }?>
</div>
</div>
</div>
<div class="boxthongbao-right boxtinnhan_right p-0">
    <div class="chat-title">
        <img src="../sinhvien/views/img/avatar.jpg" alt="">
        <div class="box-info ml-3">
            <h1 class="h3 text-truncate d-inline-block" style="max-width: 550px;">WD15306 - Lập trình java</h1>
            <p class="mb-0">36 thành viên</p>
        </div>
    </div>
    <div class="doan_chat khungchat pt-1">
        <div class="nguoigui doanchat">
            <img src="../sinhvien/views/img/avatar.jpg" alt="">
            <p>Đây là đoạn chat 2
            <span class="info"><span>9:20</span></span>
            </p>
           
        </div>
        <div class="nguoinhan doanchat doanchat2">
            <p>Đây là đoạn chat 2</p>
        </div>
        <div class="nguoinhan doanchat doanchat2">

            <p>Đây là đoạn chat 2
                <span class="info"><span>9:20</span></span>
            </p>
        </div>
    </div>

    <div class="chat_buttons">
        <input type="file" name="file" id="file">
        <label for="file" class="mb-0"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="2.5em">
                <path class="uim-tertiary" d="M12,22A10,10,0,1,1,22,12,10.01146,10.01146,0,0,1,12,22Z"></path>
                <path class="uim-primary" d="M16,13H8a1,1,0,0,1,0-2h8a1,1,0,0,1,0,2Z"></path>
                <path class="uim-primary" d="M12,17a.99974.99974,0,0,1-1-1V8a1,1,0,0,1,2,0v8A.99974.99974,0,0,1,12,17Z">
                </path>
            </svg>
        </label>
        <input type="text" class="" placeholder="Aa">

        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="2.5em">
                <path class="uim-primary"
                    d="M16.707,11.293l-3.99969-3.9997a1.00354,1.00354,0,0,0-1.41468,0L7.293,11.293A.99989.99989,0,0,0,8.707,12.707L11,10.41406V16a1,1,0,0,0,2,0V10.41406l2.293,2.293A.99989.99989,0,0,0,16.707,11.293Z">
                </path>
                <path class="uim-tertiary"
                    d="M12,2A10,10,0,1,0,22,12,10.01114,10.01114,0,0,0,12,2Zm4.707,10.707a.99963.99963,0,0,1-1.41406,0L13,10.41406V16a1,1,0,0,1-2,0V10.41406L8.707,12.707A.99989.99989,0,0,1,7.293,11.293l3.99969-3.9997a1.00354,1.00354,0,0,1,1.41468,0L16.707,11.293A.99962.99962,0,0,1,16.707,12.707Z">
                </path>
            </svg></a>
    </div>
</div>
</div>