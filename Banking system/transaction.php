<?php
include_once('fix_mysql.inc.php');
$server="localhost";
$username="root";
$password="";
$dbname="banking";
$conn=mysqli_connect($server,$username,$password,$dbname);
session_start();

if(isset($_POST['submit']))
{
    $from=$_SESSION['from'];
    $to=$_POST['to'];
    $amount=$_POST['amount'];

    $sql="SELECT * FROM users where sno=$from";
    $query=mysqli_query($conn,$sql);
    $sql1=mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql="SELECT * FROM users where sno=$to";
    $query=mysqli_query($conn,$sql);
    $sql2=mysqli_fetch_array($query);
    
    // constraint to check input of negative value by user
    if(($amount)<0)
    {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';
        echo '</script>';
 
    }
// constraint to check insufficient balance.
    else if($amount >$sql1['balance'])
    {
        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }
    // constraint to check zero values
    else if($amount == 0){

        echo "<script type='text/javascript'>";
        echo "alert('Oops! Zero value cannot be transferred')";
        echo "</script>";
    }else{
        // deducting amount from sender's account
        $newbalance=$sql1['balance']-$amount;
        $sql="UPDATE users set balance =$newbalance where sno=$from";
        mysqli_query($conn,$sql);

        // adding amount to reciever's account
        $newbalance = $sql2['balance'] + $amount;
        $sql = "UPDATE users set balance=$newbalance where sno=$to";
        mysqli_query($conn,$sql);
        
        $sender = $sql1['name'];
        $receiver = $sql2['name'];
        $sql = "INSERT INTO transaction(`sender`, `receiver`, `amount`) VALUES ('$sender','$receiver','$amount')";
        $query=mysqli_query($conn,$sql);
        echo "<h1>Transation complete</h1>";

        if($query){
            echo "<script> alert('Transaction Successful');
        </script>";
        }else{}
        $newbalance= 0;
        $amount =0;
    }
    header('Location: http://localhost/banking_sys/User_page.php');
}
?>
