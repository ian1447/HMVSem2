<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="styles/loginstyle.css">
</head>
<body>
    <h2>Login Page</h2><br>
    <div class="login">
    <form id="login" method="POST" action="functions/login.php">
        <label><b>User Name
        </b>
        </label>
        <input type="text" name="Uname" id="Uname" placeholder="Username">
        <br><br>
        <label><b>Password
        </b>
        </label>
        <input type="Password" name="Pass" id="Pass" placeholder="Password">
        <br><br>
        <!-- <input type="button" name="log" id="log" value="Log In"> -->
        
        <button name="log" id="log">Sign in</button>
        <br><br>
    </form>
</div>
</body>
</html>