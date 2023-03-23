<?php
session_start();
$conn =mysqli_connect('localhost','root','','user');
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $pass = $_POST['psw'];
    $sql = "SELECT * FROM `user_profile` WHERE `email` = '".$_POST['email']."' AND `password` = '".$_POST['psw']."'";
    $res=mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)>0){
      while($row=mysqli_fetch_assoc($res)){
       
        $_SESSION['email'] = $row['email'];
         header('location:index.php');
    }
    
  }
  else{
    echo '<script>alert("Incorrect email or password")</script>';
  }
  
}
else{
    echo '<script>alert("Please fill your login details")</script>';
}


?>
 