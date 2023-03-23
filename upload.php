<?php
session_start();
$conn =mysqli_connect('localhost','root','','user');


if(isset($_POST['submit'])){
    $cat = $_POST['cat'];
    $name = $_POST['msg'];
    $file = $_FILES['file']['name'];
    $targetDir = "uploads/";
    $response = "";
    $tmp = $_FILES["file"]["tmp_name"];
    $ext = array('jpeg','jpg');
    $file_trgt = $targetDir . basename($_FILES["file"]["name"]);

    $fileType = pathinfo($file_trgt,PATHINFO_EXTENSION);
    
    // if(!in_array($fileType,$ext)){
    //   $_SESSION['response'] = "upload only jpeg";
        

    // }

    // else{
        if(move_uploaded_file($tmp, "uploads/".$file)){
            $sql = "INSERT INTO `user_post`(`user_id`, `category`, `message`, `image`) VALUES ('".$_SESSION['email']."','$cat','$name','$file')";
            $res=mysqli_query($conn,$sql);
            // $query="SELECT user_post.category, user_post.message ,user_post.image
            // FROM user_profile
            // INNER JOIN user_post ON user_profile.email = user_post.user_id WHERE user_profile.email = '".$_SESSION['email']."'";
            $query ="SELECT * FROM `user_profile` WHERE email = '".$_SESSION['email']."'";
            $result =mysqli_query($conn,$query);
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    $_SESSION['email'] =$row['email'];
                    header('location:show.php'); 
                }
               
                  
            }
        }
    // }
    
}

?>
