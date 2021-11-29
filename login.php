<?php
    include "server.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            text-align: center;
        }

        .field{
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    
    <h2>LOGIN</h2>
    <div>
        <form action = "login.php" method = "post">
            <input type = "text" class = "field" name = "username" placeholder = "Username" required = ""><br/>
            <input type = "password" class = "field" name = "password" placeholder = "Password" required = ""><br/>
            <input type = "submit" class = "field" name = "login" value = "Login">
        </form>
    </div>

</body>
</html>