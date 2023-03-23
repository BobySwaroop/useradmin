<?php
session_start();
echo $_SESSION['email'];
$conn =mysqli_connect('localhost','root','','user');
?>
<!DOCTYPE html>
<html>

<head>
	<style>
		.images {
			display: flex;
			flex-wrap: wrap;
			margin: 0 50px;
			padding: 30px;
		}

		.photo {
			max-width: 31.333%;
			padding: 0 10px;
			height: 240px;
            display:inline-block;
            
		}

		.photo img {
			width: 100%;
			height: 100%;
		}
	</style>
</head>

<body>
    <a href="logout.php">Logout</a>
    <?php
    $query="SELECT user_post.category, user_post.message ,user_post.image
    FROM user_profile
    INNER JOIN user_post ON user_profile.email = user_post.user_id WHERE user_profile.email = '".$_SESSION['email']."' AND user_post.category ='cricket'";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0){
       while($row =mysqli_fetch_assoc($result)){
         ?>
         
         <div class="images">
		<div class="photo">
			<div><img src="<?php echo 'uploads/'. $row['image'];?>" alt="photo" /></div>
            
            <h2>message is <?php echo $row['message'];?></h2>
            
		</div>
	</div>
    <?php
       }
    }
    ?>
    <?php
    ?>
    <div class="filter">
    <?php
     $query="SELECT user_post.category, user_post.message ,user_post.image
     FROM user_profile
     INNER JOIN user_post ON user_profile.email = user_post.user_id WHERE user_profile.email = '".$_SESSION['email']."' AND user_post.category ='football'";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0){
       while($row =mysqli_fetch_assoc($result)){
         ?>
         
         <div class="images">
		<div class="photo">
			<div><img src="<?php echo 'uploads/'. $row['image'];?>" alt="photo" /></div>
            
            <h2>message is <?php echo $row['message'];?></h2>
            
		</div>

	</div>
    </div>

         <?php
       } 
    }
    ?>
	
</body>

</html>