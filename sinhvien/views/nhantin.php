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
<script src="https://www.gstatic.com/firebasejs/8.0.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.0.1/firebase-database.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.0.1/firebase-analytics.js"></script>
<div class="header-box">
    <div class="tieude h1">Tin nhắn</div>
</div>
<div class="thongbao tinnhan mt-5">
    <?php $arrchat = []; foreach($alllop as $lop){ 
        $sl = demsvlop($lop['id'])['sl'];
        $img = gethinhlopchat($lop['id']);
        $arrtam = [$lop['id'],$lop['tenkhoa']."--".$lop['tenlop'],$lop['tenkhoa'],$sl,$img];   
        array_push($arrchat,$arrtam); 
    ?>
        <div class="item mb-2 float-left">
        <div class="float-left p-0 hinhchat">
            <img class="rounded-circle" src="<?= showfile($img) ?>" alt="">
        </div>
        <div class="col-10 float-left pr-0">
            <a class="tieude-tb room" phong=<?= $lop['id'] ?>><?= $lop['tenlop'] ?></a>
            <div class="text-secondary info mt-2 pb-3">
                <span class=" mr-5"><?= $lop['tenkhoa'] ?></span>
            </div>
        </div>
    </div>
    <?php }?>
</div>
</div>
</div>
<div class="boxthongbao-right boxtinnhan_right p-0">
    <div class="chat-title">
        <img id="anhchat">
        <div class="box-info ml-3">
            <h1 class="h3 text-truncate d-inline-block" style="max-width: 550px;" id="tenchat"></h1>
            <p class="mb-0" id="stv"></p>
        </div>
    </div>
    <div class="doan_chat khungchat pt-1" id="chuachat">
    <div class="boxthongbao-chitiet">
   <i class="fas fa-stream"></i>
   <p class="text-secondary">Chọn một tin nhắn để xem</p>
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
        <input type="text" id="ndchat" placeholder="Aa">

        <button id="guichat"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="2.5em">
                <path class="uim-primary"
                    d="M16.707,11.293l-3.99969-3.9997a1.00354,1.00354,0,0,0-1.41468,0L7.293,11.293A.99989.99989,0,0,0,8.707,12.707L11,10.41406V16a1,1,0,0,0,2,0V10.41406l2.293,2.293A.99989.99989,0,0,0,16.707,11.293Z">
                </path>
                <path class="uim-tertiary"
                    d="M12,2A10,10,0,1,0,22,12,10.01114,10.01114,0,0,0,12,2Zm4.707,10.707a.99963.99963,0,0,1-1.41406,0L13,10.41406V16a1,1,0,0,1-2,0V10.41406L8.707,12.707A.99989.99989,0,0,1,7.293,11.293l3.99969-3.9997a1.00354,1.00354,0,0,1,1.41468,0L16.707,11.293A.99962.99962,0,0,1,16.707,12.707Z">
                </path>
            </svg></button>
    </div>
</div>
</div>
<script>
$(document).on('keypress',function(e) {
    if(e.which == 13) {
        $("#guichat").click();
    }
});
    $(".chat-title").hide();
    $(".chat_buttons").hide();
 var firebaseConfig = {
            apiKey: "AIzaSyCo804_k63c_EkAseMi-GICXDO7zjC55sU",
            authDomain: "duan-85aa4.firebaseapp.com",
            databaseURL: "https://duan-85aa4.firebaseio.com",
            projectId: "duan-85aa4",
            storageBucket: "duan-85aa4.appspot.com",
            messagingSenderId: "582281924955",
            appId: "1:582281924955:web:28251bc1939e198d428a7e",
            measurementId: "G-JZZG76421T"
        };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        firebase.analytics();

        //   code lay du lieu firebase
        let ref = "";
        let iddn = <?php echo json_encode($_SESSION['iddn']) ?>;
        let imgdn = <?php echo json_encode($_SESSION['hinhdn']) ?>;
        let tendn = <?php echo json_encode($_SESSION['tdn']) ?>;
        $(".room").click(function() {
            check =false;
            ref = $(this).attr("phong");
           arrchat = <?php echo json_encode($arrchat); ?>; 
           $.each(arrchat, function(index, value) {
                if(value[0] == ref){
                    tenchat = value[1];
                    sl = value[3];
                    $("#tenchat").html(tenchat);
                    $("#stv").html(sl + " thành viên");
                    $('#anhchat').attr('src', "../uploads/"+value[4]);
                    check = true;
                    
                }
            });
        if(check){
            doiref();
            $(".chat-title").show();
            $(".chat_buttons").show();
            }
        });

        function doiref() {
            var fbref = firebase.database().ref(ref);
            fbref.on('value', function(snap) {
                let arrmess = snap.val();
                $("#chuachat").html("");
                idcu ="";
                timecu ="";
                chatmoi = false;
                tinnhan = "";
                $.each(arrmess, function(index, value) {
                    if(idcu != ""){
                        if(value['id'] == idcu){
                            chatmoi = false;
                            if(value['id'] == iddn){
                            tinnhan+= '</p></div><div class="nguoinhan doanchat doanchat2"><p>'+value['noidung'];
                            }else{
                            tinnhan+= '</p></div><div class="nguoigui doanchat  pl-5"><p>'+value['noidung'];
                            }
                        }else{
                            chatmoi = true; 
                        }
                    }else{
                        chatmoi = true;
                    }
                    if(chatmoi == true){
                        if(timecu == ""){
                        if(value['id'] == iddn){
                            tinnhan+= '<div class="nguoinhan doanchat doanchat2"><p>'+value['noidung'];
                        }else{
                            tinnhan+= '<div class="nguoigui doanchat"><img src="../uploads/'+value['img']+'"><p>'+value['noidung'];
                        }
                        }else{
                        if(value['id'] == iddn){
                            tinnhan+= '<span class="info"><span>'+timecu+'</span></p></div><div class="nguoinhan doanchat doanchat2"><p>'+value['noidung'];
                        }else{
                            tinnhan+= '<span class="info"><span>'+timecu+'</span></p></div><div class="nguoigui doanchat"><img src="../uploads/'+value['img']+'"><p>'+value['noidung'];
                        }
                        }
                    }
                  
                    timecu = value['time'];
                    idcu = value['id'];
                });
                tinnhan+='<span class="info"><span>'+timecu+'</span></p></div>';
                $("#chuachat").append(tinnhan);
                truotdiv();
            });
        }
        $("#guichat").click(function() {
            var nd = $("#ndchat").val();
            if (ref != "" && nd != "") {
                var nd = $("#ndchat").val();
                var d = new Date();
                var time = d.getHours() + ":" + d.getMinutes(); 
                var fbref = firebase.database().ref(ref);
                fbref.push({
                    id: iddn,
                    noidung: nd,
                    ten : tendn,
                    img :  imgdn,
                    file : "filetam",
                    time: time,
                });
            }
            var nd = $("#ndchat").val("");
        });
        function truotdiv(){
        $('#chuachat').stop ().animate ({
        scrollTop: $('#chuachat')[0].scrollHeight
        });
        }
        </script>