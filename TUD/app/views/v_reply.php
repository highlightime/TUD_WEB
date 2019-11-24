<html>
    <head>
        <style>
            .reply_view {
                width:900px;
                margin-top:100px;
                word-break:break-all;
            }
            .dap_lo {
                font-size: 14px;
                padding:10px 0 15px 0;
                border-bottom: solid 1px gray;
            }
            .dap_to {
                margin-top:5px;
            }
            .rep_me {
                font-size:12px;
            }
            .rep_me ul li {
                float:left;
                width: 30px;
            }
            .dat_delete {
                display: none;
            }
            .dat_edit {
                display:none;
            }
            .dap_sm {
                position: absolute;
                top: 10px;
            }
            .dap_edit_t{
                width:520px;
                height:70px;
                position: absolute;
                top: 40px;
            }
            .re_mo_bt {
                position: absolute;
                top:40px;
                right: 5px;
                width: 90px;
                height: 72px;
            }
            #re_content {
                width:700px;
                height: 56px;
            }
            .dap_ins {
                margin-top:50px;
            }
            .re_bt {
                position: absolute;
                width:100px;
                height:56px;
                font-size:16px;
                margin-left: 10px;
            }
            #foot_box {
                height: 50px;
            }

        </style>
    </head>
    <body>
        <!-- reply view-->
        <div class="reply_view">
            <h3>Reply List</h3>
            <?php
                $board_id = array_pop($data);

                while($row = array_pop($data)){
            ?>
            <div class="dap_lo">
                <div><b><?php echo $row['author'];?></b></div>
                <div class="dap_to comt_edit"><?php echo $row['content'];?></div>
                <div class="rep_me dap_to"><?php echo $row['date'];?></div>
            </div>
            <?php } ?>
        </div>
        <!-- upload reply -->
        <div class="dap_ins">
            <div style="margin-top:10px;">
                <form method="post" action="../../c_reply/uploadReply/<?=$board_id?>">
                    <textarea name="content" class="reply_content" id="re_content"></textarea>
                    <button id="btn_reply">REPLY</button>
                </form>
            </div>
        </div>
    </body>
</html>