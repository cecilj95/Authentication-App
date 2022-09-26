<?php 
session_start();
    include("connect.php");
    include("function.php");
    
    $user_data=check_login($con);
 ?>

 <!DOCTYPE html>
 <html>
 <head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
 	<style >
 		.topright 
 		{
		position: absolute;
		top: 8px;
		right: 16px;
  		font-size: 18px;
		}
		body{
        background-image:url('https://images.unsplash.com/photo-1497864149936-d3163f0c0f4b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1469&q=80');
        background-position:center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        text-align:center;}
		p{
			text-align: center;
			color:chartreuse;
		}
		a{
            color:white;
        }
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
 	</style>
<title>index page</title>
 <body>
 	<div class="topright">
 	 <a href="index.php">Home</a>    
 	<a href="profile.php">Your Account</a>
 	<a href="logout.php">Logout</a>
 	</div>		
 	<p >Hello <?php echo $user_data['user_name']; ?></p><br><br>
 <p><?php echo "<img src='{$user_data['picture']}'width='90px' height='90px' >"?></p><br/><br/>
 </body>
 </html>