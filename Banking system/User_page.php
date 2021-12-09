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
    <link rel="stylesheet" href="User_page.css">
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
        <div>
            <a class="new-user" href="add_new_user.php">ADD A NEW USER</a> 
        </div>
        <div class="welcome-text">
            <table>
                <tr>
                  <th>S.No</th>
                  <th>Name</th>
                  <th>E-mail</th>
                  <th>Balance</th>
                  <th>Action</th>
                </tr>
                <?php
                    while($rows=mysql_fetch_assoc($result))
                    {
                ?>
                        <tr>
                        <td><?php echo $rows['sno'];?></td>
                        <td ><?php echo $rows['name'];?></td>
                        <td><?php echo $rows['email'];?></td>
                        <td><?php echo $rows['balance'];?></td>
                        <td ><a href="transfer.php?id=<?php echo $rows['sno'];?>"><button>View or Transact</button></a></td>
                    </tr>
                  <?php
                    }
                 ?>
              </table>      
          </div>
       
    </header>
    <br><br><br>
    <footer>&copy 2021 <b>Yashaswini Yeramalli</b></br>Intern, The Sparks Foundation</footer>
</body>
</html>