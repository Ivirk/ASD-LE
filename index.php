<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sacred Heart Parish Management System</title>
    <style>
        *{
            box-sizing: border-box;
            font-family: 'Playfair Display', serif;
            color: black;
        }
        body{
            margin: 0;
            min-height: 100vh;
            background-image:url(images/background.png);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px 10px;
            background-color: #DDE76E;
        }
        h1 {
            margin-left: 10px;
        }
        nav a {
            text-decoration: none;
            font-size: 20px;
            font-weight: bold;
            margin-right: 50px;
            cursor: pointer;
            transition: 0.3s;
        }
        img {
            width: 400px;
            height: auto;
        }
        #logo {
            margin:0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 75vh;
          }
          nav a:hover {
            background-color:#a1b537;
            color: white;
          }
          nav a:active{
            background-color: #556B2F;
            color: white;
          }
          nav a:visited{
            background-color: #6B5F0B;
            color: white;
          }


    </style>
</head>
<body>
    <header>
    <h1> Sacred Heart Parish Management System</h1>
    <nav>
        <a href="index.php">Home</a>
        <a href="user.php">User</a>
        <a href="admin.php">Admin</a>
    </nav>
    </header>
    <div id="logo">
        <img src="images/logo2.png">
    </div>



</body>
</html>