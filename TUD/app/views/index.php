<!DOCTYPE html>
<html>
    <head>
        <title>TUD MARKET</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
            .w3-sidebar a {
                font-family: "Roboto", sans-serif
            }

            body,h1,h2,h3,h4,h5,h6,.w3-wide {
                font-family: "Montserrat", sans-serif;
            }

            .profile{
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                max-width: 300px;
                margin: auto;
                text-align: center;
                font-family: arial;
            }
            .profile .email{
                color: grey;
                font-size: 18px;
            }

            .profile button{
                border: none;
                outline: 0;
                display: inline-block;
                padding: 8px;
                color: white;
                background-color: #000;
                text-align: center;
                cursor: pointer;
                width: 100%;
                font-size: 18px;
            }

            .profile a{
                text-decoration: none;
                font-size: 22px;
                color: black;
            }

            .profile button:hover, a:hover{
                opacity: 0.7;
            }
        </style>

    </head>
    <body class="w3-content" style="max-width:1200px;">
        <!-- Sidebar/menu -->
        <nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
            <div class="w3-container w3-display-container w3-padding-16">
                <h3 class="w3-wide"><b>TUD<br>MARKET</b></h3>
                <!-- Login Button and Profile -->
                <div class="w3-row w3-grayscale profile">
                    <?php
                    session_start();
                    $connect = mysqli_connect('localhost', 'root', '', 'Second_market') or die ("connect fail");

                    if(!isset($_SESSION['id'])) {
                        ?>
                        <h5 id="goLogin" style="cursor: hand">LOGIN</h5>
                        <?php
                    }else{
                        $id = $_SESSION['id'];

                        $query = "select mail from member where id = '$id'";
                        $result = mysqli_query($connect, $query);
                        $row = mysqli_fetch_assoc($result);
                        ?>
                        <!-- profile photo -->
                        <img class="img-circle" src="../public/profile/DSC_0009.jpg" alt="<?php echo $_SESSION['id']?>" style="width: 100%;">
                        <h1><?php echo $_SESSION['id']?></h1>
                        <p class="email"><?php echo $row['mail']?></p>
                        <div style="margin: 24px 0;">
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                        </div>
                        <p><button id="btn_sell_item">SELL MY ITEM</button></p>
                        <p><button id="btn_edit_info">EDIT YOUR INFO</button></p>
                        <p><button id="btn_logout">LOGOUT</button></p>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </nav>

        <!-- Main Page -->
        <div class="w3-main" style="margin-left:250px">
            <div class="w3-container w3-black w3-padding-32" id="search_section">
                <h1>ARE YOU LOOKING FOR ITEM</h1>
                <form method="POST" action="c_search/getItems">
                    <p style="color:black;"><input class="w3-input w3-border" name="search_word" type="text" placeholder="ENTER NAME LOOKING FOR" style="width:100%"></p>
                    <button id="btn_search" class="w3-button w3-red w3-margin-bottom">SEARCH</button>
                </form>
            </div>
            <!-- Item board -->
            <div id="items"></div>
        </div>
        <!-- update profile modal -->
        <div id="private" class="w3-modal">
            <div class="w3-container w3-white w3-center w3-animate-zoom profile">
                <i class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge" onclick="document.getElementById('private').style.display='none'"></i>
                <h2 class="w3-wide">Profile update</h2>
                <img src="../public/profile/DSC_0009.jpg" alt="<?php echo $_SESSION['id']?>" style="width: 100%">
                <h1><?php echo $_SESSION['id']?></h1>
                <?php
                $query = "select * from member where id = '$id'";
                $result = mysqli_query($connect, $query);
                $row = mysqli_fetch_assoc($result);
                ?>
                <form method="POST" action="c_update_profile/update">
                    <p><input class="w3-input w3-border" name="update_password" type="password" value="<?php echo $row['pw']?>" style="width:100%"></p>
                    <p><input class="w3-input w3-border" name="update_repassword" type="password" value="<?php echo $row['pw']?>" style="width:100%"></p>
                    <p><input class="w3-input w3-border" name="update_email" type="text" value="<?php echo $row['mail']?>" style="width:100%"></p>
                    <p><input class="w3-input w3-border" name="update_address" type="text" value="<?php echo $row['addr']?>" style="width:100%"></p>
                    <p><input class="w3-input w3-border" name="update_city" type="text" value="<?php echo $row['city']?>" style="width:100%"></p>
                    <button id="btn_profile_update">UPDATE</button>
                </form>
            </div>
        </div>
    </body>
    <script>
        $(document).ready(function(){
            $('#items').load('c_items/getItems');
        });
        $('#goLogin').click(function () {
           location.href = 'c_login/index'; // controller/func
        });

        $('#btn_logout').click(function () {
            location.href = "c_logout/getLogout";
        });

        $('#btn_sell_item').click(function () {
            location.href = "c_upload_item/index";
        });

        $('#btn_edit_info').click(function () {
            document.getElementById('private').style.display='block';

        });
    </script>
</html>