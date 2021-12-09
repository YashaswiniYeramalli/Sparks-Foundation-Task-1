<?php
include_once('connection.php');
$query="select * from transaction";
$result=mysql_query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="history.css">

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
            <h3>Transaction History</h3><br>
            <table>
                <tr>
                  <th>Sender</th>
                  <th>Reciever</th>
                  <th>Balance</th>
                </tr>
                <?php
                    while($rows=mysql_fetch_assoc($result))
                    {
                ?>
                        <tr>
                        <td><?php echo $rows['sender'];?></td>
                        <td ><?php echo $rows['receiver'];?></td>
                        <td><?php echo $rows['amount'];?></td>
                    </tr>
                  <?php
                    }
                 ?>
              </table>    
        </div>
    </header>
    <footer>&copy 2021 <b>Yashaswini Yeramalli</b></br>Intern, The Sparks Foundation</footer>
</body>
</html>