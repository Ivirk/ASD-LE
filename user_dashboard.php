<?php
    include 'logout.php';
    session_start();
    if (isset($_SESSION['email'])) {
        if (isset($_POST['logout'])) {
            logout();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sacred Heart Parish Management System</title>
	<style>
		*{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Playfair Display', serif;
        }
        body {
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
            padding: 25.5px 10.5px;
            background-color: #DDE76E;
        }
        h1 {
            margin-left: 235px;
        }
        #sidebar {
        	height: 100%;
        	width: 225px;
        	position: fixed;
        	z-index: 1;
        	top: 0;
        	left: 0;
        	background-color: #edf3f5;
        	border-right: 3px solid lightgray;
        	overflow-x: hidden;
        	padding-top: 20px;
        	text-align: center;
        	color: #646464;
        }
        #sidebar img {
        	width: 60%;
        	display: block;
        	margin: auto;
        	padding-bottom: 5px;
        }
        #sidebar h2 {
        	font-size: 28px;
        }
        #sidebar h3 {
        	font-size: 14px;
        }
        #sidebar ul {
        	margin-top: 25px;
        	list-style-type: none;
        }
        #sidebar li {
        	font-size: 20px;
        	margin: 30px 0;
        }
        #sidebar a {
        	background-color: #f0f0f0;
        	border: 1px solid lightgray;
        	border-radius: 6px;
        	color: #646464;
        	text-decoration: none;
        	padding: 10px 30px;
        }
        #sidebar a:hover {
        	background-color: #d2d2d2;
        	border: 1px solid #b4b4b4;
        }
        #sidebar span {
        	background-color: #d2d2d2;
        	border: 1px solid #b4b4b4;
        	border-radius: 6px;
        	padding: 10px 30px;
        }
        #sidebar input[type="submit"] {
        	padding: 10px 30px;
        	margin-top: 10px;
        	font-size: 20px;
        	color: #646464;
        	background-color: #f0f0f0;
        	border: 1px solid lightgray;
        	border-radius: 6px;
        }
        #sidebar input[type="submit"]:hover {
        	background-color: #d2d2d2;
        	border: 1px solid #b4b4b4;
        	cursor: pointer;
        }
        #main {
        	margin-left: 225px;
        	display: flex;
        	justify-content: center;
        	align-items: center;
        	height: 75vh;
        	gap: 20%;
        }
        #main a {
        	text-align: center;
        	color: white;
        	text-decoration: none;
        	font-size: 25px;
        	padding: 75px 60px;
        	border-radius: 10px;
        }
        #main #request {
        	background-color: #ec8244;
        	transition: 0.33s;
        }
        #main #request:hover {
        	background-color: #ce6426;
        	transition: 0.33s;
        }
        #main #track {
        	background-color: #afd342;
        	transition: 0.33s;
        }
        #main #track:hover {
        	background-color: #91b524;
        	transition: 0.33s;
        }
	</style>
</head>
<body>
	<header>
        <h1>Sacred Heart Parish Management System</h1>
    </header>
    <div id="container">
    	<div id="sidebar">
    		<img src="images/placeholder_pfp.png">
    		<h2><?php echo $_SESSION['firstname'] ?></h2>
    		<h3><?php echo $_SESSION['email'] ?></h3>
    		<ul>
    			<li><span>Menu</span></li>
    			<li><a href="user_request.php">Request</a></li>
    			<li><a href="#">Track</a></li>
    		</ul>
    		<form action="" method="post">
    			<input type="submit" name="logout" value="Log Out">
    		</form>
    	</div>
    	<div id="main">
    		<a id="request" href="user_request.php">Request<br>Certificate</a>
    		<a id="track" href="#">Track<br>Certificate</a>
    	</div>
    </div>
</body>
</html>