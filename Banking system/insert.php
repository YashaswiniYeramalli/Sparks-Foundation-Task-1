<?php
include_once('fix_mysql.inc.php');
$server="localhost";
$username="root";
$password="";
$dbname="banking";
$conn=mysqli_connect($server,$username,$password,$dbname);
if(isset($_POST['submit']))
{
    if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['balance']))
    {
        $name =$_POST['name'];
        $email =$_POST['email'];
        $balance =$_POST['balance'];
        $query="insert into users(name,email,balance) values('$name','$email','$balance')";
        $run=mysqli_query($conn,$query) or die(mysqli_error($conn));
        if($run)
        {
           /* echo "Form submitted successfully";*/
        }else{
            echo "Form not submitted";
        }
    }else{
        echo "all fields required";
    }
    
    header('Location: http://localhost/banking_sys/User_page.php');
}
?>