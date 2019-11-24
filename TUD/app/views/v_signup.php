<html>
    <head>
        <title>Signup</title>
        <meta charset="UTF-8">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <style>
            body{
                font-size: 10pt;
                font-family: Verdana, Helvetica, sans-serif;
                color: #003300;
            }
            h1{
                font-size: 12pt;
                text-align: center;
            }
            p{
                margin: 0px 40px 20px 40px
            }
            td{
                padding: 5px;
            }
            td.name{
                text-align: right;
            }
            td.data{
                text-align: left;
            }
        </style>
    </head>
    <body>
        <h1>Personal Information</h1>
            <form method='POST' action='getSignup' name="personal_info" id="personal_info">
                <table align="center" border="0">
                    <tbody>
                    <tr>
                        <td class="name">
                            ID:
                        </td>
                        <td class="data">
                            <input type="text" name="id" id="id" width="20" maxlength="40" size="20">
                        </td>
                    </tr>
                    <tr>
                        <td class="name">
                            PW:
                        </td>
                        <td class="data">
                            <input type="password" name="pw" id="pw" width="20" maxlength="40" size="20">
                        </td>
                    </tr>
                    <tr>
                        <td class="name">
                            E-mail address:
                        </td>
                        <td class="data">
                            <input type="text" name="email_text" id="email_text" width="20" maxlength="40" size="20">
                        </td>
                    </tr>
                    <tr>
                        <td class="name">
                            Street address :
                        </td>
                        <td class="data">
                            <input type="text" name="addr_text" id="addr_text" width="20" size="20" maxlength="40">
                        </td>
                    </tr>
                    <tr>
                        <td class="name">
                            City:
                        </td>
                        <td class="data">
                            <input type="text" name="city_text" id="city_text" width="20" size="20" maxlength="40">
                        </td>
                    </tr>
                    <tr>
                        <td class="name">
                            <input type="button" value="Submit" id="Submit">
                        </td>
                        <td class="data">
                            <input type="reset" value="Clear">
                        </td>
                    </tr>
                    </tbody>
                </table>
            </form>
            <div style="border:1px solid green;margin-left: auto;
                margin-right: auto;width:400px;">
                <div id="box" style="background:#98bf21;height:50px;width:1px;border:1px solid green;"></div>
            </div>
    </body>
    <script>
        $(function(){
            $("#Submit").click(function(){
                if(validateForm()){
                    alert("success");
                    $("#box").animate({
                        width: "400px"
                    }, {
                        duration: 200,
                        easing: "linear",
                    });
                    $('form').submit();
                }
            });
        });

        function validateLetter(str){
            for(i=0;i<str.length;i++){
                if(('a'<=str.charAt(i)&&str.charAt(i)<='z')||('A'<=str.charAt(i)&&str.charAt(i)<='Z'));
                else{
                    alert("Please write only letters in Name and City");
                    return false;
                }
            }
            return true;
        }
        function validateEmail(str){
            if (/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/.test(str))
                return true;
            alert("You have entered an invalid email address!")
            return false;
        }

        function validateForm(){
            var idFlag= document.forms["personal_info"]["id"].value;
            var pwFlag= document.forms["personal_info"]["pw"].value;
            var emailFlag= document.forms["personal_info"]["email_text"].value;
            var addr1Flag= document.forms["personal_info"]["addr_text"].value;
            var cityFlag= document.forms["personal_info"]["city_text"].value;



            if(idFlag==""||pwFlag==""||emailFlag==""||addr1Flag==""||cityFlag==""){
                alert("All of areas are mandatory");
                document.getElementById("personal_info").reset();
                return;
            }
            if(validateLetter(idFlag)&&validateLetter(cityFlag)&&validateEmail(emailFlag))
                return true;
            else
                return false;
        }
    </script>
</html>