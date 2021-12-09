<?php
include_once('connection.php');
$query="select * from users";
$result=mysql_query($query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="add_new_user.css">

</head>
<body>
    <header>
        <div class="wapper">
            <div class="logo">
                <img src="Pic/logoimg.png", alt="">
                <h3 class="logo title">SPARKS FOUNDTAION BANK</h3>
            </div>
            <ul class="nav-area">
                <li><a href="home_page.html">Home</a></li>
                <li><a href="https://www.thesparksfoundationsingapore.org/">About</a></li>
                <li><a href="User_page.php">Users</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="history.php">Transaction History</a></li>
            </ul>   
        </div>
        <div class="welcome-text">
            <form class="form" action="insert.php" method="post">
                <h3>Add new user details</h3>
                <ul class="noBullet">
                    <li><input class="inputFields" type="text" name="name" placeholder="NAME"><br><br><br></li>
                    <li><input class="inputFields" type="email" name="email" placeholder="EMAIL"><br><br><br></li>
                    <li><input class="inputFields" type="number" name="balance" placeholder="BALANCE"><br><br><br></li>
                    <button id="join-btn" type="submit" name="submit">SUBMIT</button>
                </ul>
            </form>
        </div>
    </header>
    <footer>&copy 2021 <b>Yashaswini Yeramalli</b></br>Intern, The Sparks Foundation</footer>
</body>
</html>