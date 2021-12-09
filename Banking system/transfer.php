<?php
include_once('connection.php');
include_once('fix_mysql.inc.php');
$server="localhost";
$username="root";
$password="";
$dbname="banking";
$conn=mysqli_connect($server,$username,$password,$dbname);
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="transfer.css">
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
            <li><a href="#">About</a></li>
            <li><a href="User_page.php">Users</a></li>
            <li><a href="#">Contact</a></li>
        </ul>   
    </div>

    <div class="welcome-text">
        <h3>Transaction</h3><br><br>
        <?php 
            include 'connection.php';
            $sid=$_GET['id'];
            $_SESSION['from']=$sid;
            $sql="select * from users where sno=$sid";
            $result=mysqli_query($conn,$sql);
            if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
        ?>
        <div>
        <table>
                <tr>
                  <th>S.No</th>
                  <th>Name</th>
                  <th>E-mail</th>
                  <th>Balance</th>
                </tr>
                <tr>
                    <td><?php echo $rows['sno'];?></td>
                    <td ><?php echo $rows['name'];?></td>
                    <td><?php echo $rows['email'];?></td>
                    <td><?php echo $rows['balance'];?></td>
                </tr>
        </table>
        <div>
        <br><br>
        <form class="form" action="transaction.php" method="post">
        <ul class="noBullet">
            <li><input class="inputFields" type="text" name="from" placeholder="Name"><br><br> <br></li>
            <label >Transfer To:</label> <br>   
            <li><select name="to" class="inputFields" required>
            <option value="" disabled selected>Choose</option>
            <?php
                include 'connection.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM users where sno!=$sid";
                $sql = "SELECT * FROM users where sno!=1";

                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['sno'];?>" >
                    <?php echo $rows['name'] ;?> (Balance: 
                    <?php echo $rows['balance'] ;?> ) 
                </option>
            <?php 
                } 
            ?>
            <div>
            </select></li>
           <li><input class="inputFields" type="number" name="amount" placeholder="AMOUNT"><br><br><br></li>
           <button id="join-btn" type="submit" name="submit">Transfer</button>
        </ul>
        </form>
    </div> 
    </header>
    <footer>&copy 2021 <b>Yashaswini Yeramalli</b></br>Intern, The Sparks Foundation</footer>
</body>
</html>