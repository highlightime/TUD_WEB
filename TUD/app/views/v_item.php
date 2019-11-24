<html>
    <head>
        <script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
        <style>
            view_table {
                border: 1px solid #444444;
                margin-top: 30px;
            }

            .view_title {
                height: 30px;
                text-align: center;
                background-color: #cccccc;
                color: white;
                width: 1000px;
            }

            .view_id {
                text-align: center;
                background-color: #EEEEEE;
                width: 30px;
            }

            .view_id2 {
                background-color: white;
                width: 60px;
            }

            .view_hit {
                background-color: #EEEEEE;
                width: 30px;
                text-align: center;
            }

            .view_hit2 {
                background-color: white;
                width: 60px;
            }

            .view_content {
                padding-top: 20px;
                border-top: 1px solid #444444;
                height: 500px;
            }

            .view_btn {
                width: 700px;
                height: 200px;
                text-align: center;
                margin: auto;
                margin-top: 50px;
            }

            .view_btn1 {
                height: 50px;
                width: 100px;
                font-size: 20px;
                text-align: center;
                background-color: white;
                border: 2px solid black;
                border-radius: 10px;
            }

            .view_comment_input {
                width: 700px;
                height: 500px;
                text-align: center;
                margin: auto;
            }

            .view_text3 {
                font-weight: bold;
                float: left;
                margin-left: 20px;
            }

            .view_com_id {
                width: 100px;
            }

            .view_comment {
                width: 500px;
            }
        </style>
    </head>
    <body>
        <!-- item -->
        <table class="view_table" align=center>
            <tr>
                <td colspan="4" class="view_title"><?=$data['title']?></td>
            </tr>
            <tr>
                <td class="view_id">Author</td>
                <td class="view_id2"><?=$data['author']?></td>
                <td class="view_hit">Hits</td>
                <td class="view_hit2"><?=$data['hit']?></td>
            </tr>
            <tr>
                <td colspan="4" class="view_content" valign="top">
                    <?=$data['content']?>
                </td>
            </tr>
            <tr><td><button onclick="location.href = '../download/<?=$data['board_id']?>'">DOWNLOAD</button></td></tr>
        </table>
        <!-- item modify & delete -->
        <div class="view_btn">
            <button class="view_btn1" onclick="location.href='../../'">To List</button>
            <button class="view_btn1" onclick="location.href='../modify/<?=$data['board_id']?>'">Modify</button>
            <button class="view_btn1" onclick="location.href='../delete/<?=$data['board_id']?>'">Delete</button>
        </div>
        <div id="reply_div"></div>

    <script>
        $(document).ready(function(){
            $('#reply_div').load('../../c_reply/getReply/<?=$data['board_id']?>');
        });
    </script>
    </body>
</html>