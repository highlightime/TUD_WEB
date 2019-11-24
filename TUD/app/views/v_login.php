<html>
    <head>
        <title>Login Page</title>
        <script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
    </head>
    <body>
        <div align="center">
            <h1>LOGIN</h1>
            <form method="POST" action="getLogin">
                ID:
                <input type="text" id="id" name="id" placeholder="Enter ID">
                <br><br>
                PW:
                <input type="password" id="pw" name="pw" placeholder="Enter password">
                <br><br>
                <input type="submit" value="LOGIN">
            </form>
            <h5 id="goSignup">CLICK HERE TO SIGN UP!</h5>
        </div>
    </body>
    <script>
        $('#goSignup').click(function () {
            location.href = '../c_signup/index'; // controller/function
        });
    </script>
</html>