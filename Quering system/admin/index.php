<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <form action="authentication.php" method="post">
        <h1 class="login">LOGIN</h1>

        <input 
            type="password" 
            name="password" 
            id="password" 
            class="username" 
            maxlength="6"
            placeholder="Enter PIN"
            required
        >

        <input 
            type="submit" 
            name="login" 
            value="Login" 
            class="sub"
        >
    </form>
</div>

</body>
</html>
