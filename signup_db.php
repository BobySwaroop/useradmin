<?php
$conn =mysqli_connect('localhost','root','','user');
session_start();
if(isset($_POST['register'])){
    $name= $_POST['uname'];
    $email= $_POST['email'];
    $pass= $_POST['psw'];
    $sql="INSERT INTO `user_profile` (`name`, `email`, `password`) VALUES ('$name','$email','$pass')";
    $res=mysqli_query($conn,$sql);
    if($res){
        $_SESSION['email']=$_POST['email'];
        $_SESSION['name']=$_POST['name'];
        header('location:index.php');
    }
    else{
        echo "something error";
    }
    
}
else{
    echo '<script>alert("Please fill your form")</script>';
}

?>