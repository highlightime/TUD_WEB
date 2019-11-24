<html>
    <head>
        <meta charset = 'utf-8'>
        <script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
        <style>
            table.inside{
                border-collapse: separate;
                border-spacing: 1px;
                text-align: left;
                line-height: 1.5;
                border-top: 1px solid #ccc;
                margin : 20px 10px;
            }
            table.inside tr {
                width: 50px;
                padding: 10px;
                font-weight: bold;
                vertical-align: top;
                border-bottom: 1px solid #ccc;
            }
            table.inside td {
                width: 100px;
                padding: 10px;
                vertical-align: top;
                border-bottom: 1px solid #ccc;
            }

        </style>
    </head>
    <body>
    <form enctype="multipart/form-data" method="POST"
          <?php
            if(isset($data['board_id'])){
                ?>
                action="../../c_upload_item/modify/<?=$data['board_id']?>">
                <?php
            }else{
                ?>
                action="upload">
            <?php
            }
            ?>
        <table  style="padding-top:50px" align="center" width="700" border="0" cellpadding="2" >
            <tr>
                <td height="20" align="center" bgcolor="#ccc"><font color="white"> UPLOAD</font></td>
            </tr>
            <tr>
                <td bgcolor=white>
                    <table class="inside">
                        <tr>
                            <td>Title</td>
                            <td><input type="text" name="title" size="60" value="<?php if(isset($data['title'])){ echo $data['title'];}?>"></td>
                        </tr>

                        <tr>
                            <td>Content</td>
                            <td><textarea name="content" cols="85" rows="15"><?php if(isset($data['content'])){ echo $data['content'];}?></textarea></td>
                        </tr>

                        <tr>
                            <td>File</td>
                            <td><input type="file" name="file" size="60"></td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="UPLOAD"></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </form>
    </body>
</html>
