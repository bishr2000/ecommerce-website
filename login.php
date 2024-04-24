<!DOCTYPE html>
<html>
    <head>
        <link type = "text/css" rel = "stylesheet" href = "styles/stylelogin.css"/>
        <title>sign in</title>
    </head>
    <body>
        <main>
            <h2>Buy<b>Now</b></h2>
            <form method = "POST" action = "welcome.php?login=1" class = "login">
                <h3>Sign-in</h3>
                <label>Email:</label>
                <input name = "emailAddress" placeholder = "Email" type = "email"/>
                <label>Password:</label>
                <input name = "password" placeholder = "Password" type = "password"/>
                <button class = "send" type = "submit">send</button>
                <label>New to BuyNow?</label>
                <a class = "send" href = "signup.php" value = "Log-in"><div>send</div></a>
            </form>    
        </main>
    </body>
</html>