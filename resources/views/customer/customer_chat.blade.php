<?php
session_start();
if (!Session::has('useremail')) {
    echo "<script>location.href='/'</script>";
}
?>

@include('customer/customer_slidebar');
<style>
.container {
    max-width: 1170px;
    margin: auto;
}

img {
    max-width: 100%;
}

.inbox_people {
    background: #f8f8f8 none repeat scroll 0 0;
    float: left;
    overflow: hidden;
    width: 40%;
    border-right: 1px solid #c4c4c4;
}

.inbox_msg {
    border: 1px solid #c4c4c4;
    clear: both;
    overflow: hidden;
}

.top_spac {
    margin: 20px 0 0;
}


.recent_heading {
    float: left;
    width: 40%;
}

.srch_bar {
    display: inline-block;
    text-align: right;
    width: 60%;
}

.headind_srch {
    padding: 10px 29px 10px 20px;
    overflow: hidden;
    border-bottom: 1px solid #c4c4c4;
}

.recent_heading h4 {
    color: #05728f;
    font-size: 21px;
    margin: auto;
}

.srch_bar input {
    border: 1px solid #cdcdcd;
    border-width: 0 0 1px 0;
    width: 80%;
    padding: 2px 0 4px 6px;
    background: none;
}

.srch_bar .input-group-addon button {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    border: medium none;
    padding: 0;
    color: #707070;
    font-size: 18px;
}

.srch_bar .input-group-addon {
    margin: 0 0 0 -27px;
}

.chat_ib h5 {
    font-size: 15px;
    color: #464646;
    margin: 0 0 8px 0;
}

.chat_ib h5 span {
    font-size: 13px;
    float: right;
}

.chat_ib p {
    font-size: 14px;
    color: #989898;
    margin: auto
}

.chat_img {
    float: left;
    width: 11%;
}

.chat_ib {
    float: left;
    padding: 0 0 0 15px;
    width: 88%;
}

.chat_people {
    overflow: hidden;
    clear: both;
}

.chat_list {
    border-bottom: 1px solid #c4c4c4;
    margin: 0;
    padding: 18px 16px 10px;
}

.inbox_chat {
    height: 550px;
    overflow-y: scroll;
}

.active_chat {
    background: #ebebeb;
}

.incoming_msg_img {
    display: inline-block;
    width: 6%;
}

.received_msg {
    display: inline-block;
    padding: 0 0 0 10px;
    vertical-align: top;
    width: 92%;
}

.received_withd_msg p {
    background: #ebebeb none repeat scroll 0 0;
    border-radius: 3px;
    color: #646464;
    font-size: 14px;
    margin: 0;
    padding: 5px 10px 5px 12px;
    width: 100%;
}

.time_date {
    color: #747474;
    display: block;
    font-size: 12px;
    margin: 8px 0 0;
}

.received_withd_msg {
    width: 57%;
}

.mesgs {
    float: left;
    padding: 30px 15px 0 25px;
    width: 60%;
}

.sent_msg p {
    background: #05728f none repeat scroll 0 0;
    border-radius: 3px;
    font-size: 14px;
    margin: 0;
    color: #fff;
    padding: 5px 10px 5px 12px;
    width: 100%;
}

.outgoing_msg {
    overflow: hidden;
    margin: 26px 0 26px;
}

.sent_msg {
    float: right;
    width: 46%;
}

.input_msg_write input {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    border: medium none;
    color: #4c4c4c;
    font-size: 15px;
    min-height: 48px;
    width: 100%;
}

.type_msg {
    border-top: 1px solid #c4c4c4;
    position: relative;
}

.msg_send_btn {
    background: #05728f none repeat scroll 0 0;
    border: medium none;
    border-radius: 50%;
    color: #fff;
    cursor: pointer;
    font-size: 17px;
    height: 33px;
    position: absolute;
    right: 0;
    top: 11px;
    width: 33px;
}

.messaging {
    padding: 0 0 50px 0;
}

.msg_history {
    height: 516px;
    overflow-y: auto;
}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
function chat_open(cid) {


    $.ajax({
        type: 'GET',
        url: 'chat_detail/' + cid,
        data: '_token = <?php echo csrf_token() ?>',
        success: function(data) {
            $("#msg").html(data.msg);
        }
    });
}
</script>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 style='text-align:center' class="page-header"> Your Messages
                    <hr style='border-color:black'>
                    </hr>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="messaging">
            <div class="inbox_msg">
                <div class="inbox_people">
                    <div class="headind_srch">
                        <div class="recent_heading">
                            <h4>Inbox
                            </h4>
                        </div>

                    </div>
                    <div class="inbox_chat">


                        @foreach($from as $f)
                        <form action="" method='get'>

                            <div class="chat_list">
                                <div class="chat_people">
                                    <div class="chat_img"> <img src="customer_img/{{$f->c_img}}" title='{{$f->c_name}}'
                                            alt="{{$f->c_name}}">

                                    </div>
                                    <div class="chat_ib">
                        </form>
                        <h5><b>{{$f->c_name}}</b>
                            <span style='float:right;font-size:18px;color:green' class="chat_date">
                                <?php
                                $onlinecus=session::get('useremail');
                                if(session::has('useremail'))
                                {
                                    echo "<div style='color:green;'>$onlinecus</div>";
                                }
                                else
                                {
                                    echo "<div style='color:red;'>$f->email</div>";
                                }
                                ?></span>
                        </h5>
                        <!-- {date('d-m-y', strtotime($f->timestamp} -->
                        <p>Test, which is a new approach to have all solutions
                            astrology under one roof.</p>
                        <button type='button' value='{{$f->from_user}}' onclick='chat_open(this.value)'>View
                            Chat</button>
                    </div>
                </div>
            </div>
            </form>
            @endforeach



        </div>
    </div>


    <div class="mesgs" style='overflow: scroll;color:red;height:530px;' id='msg'>
        <br>
        <center><img src="logo.png" style="border:1px solid grey" />
            <br><br><br>
            <h2>Chat Board with Village Vyapar</h2>
        </center>


    </div>


</div>

<!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="Customer/js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="Customer/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="Customer/js/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="Customer/js/dataTables/jquery.dataTables.min.js"></script>
<script src="Customer/js/dataTables/dataTables.bootstrap.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="Customer/js/startmin.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true
    });
});
</script>


</body>

</html>