<?php 
session_start();
    include("connect.php");
    include("function.php");

    $user_data=check_login($con);
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        //user given data
        $user_name=$_POST['user_name'];
        $password=$_POST['password'];
        $email=$_POST['email'];
        $DOB=date("y-m-d",strtotime($_POST['dob']));
        $upic=$_POST['profilep'];
        $uid=$user_data['user_id'];
         if(!empty($user_name) && !empty($password))
        {
            // Updating to DB
            $query="update user SET user_name='$user_name',password='$password',email='$email',DOB='$DOB',picture='$upic' Where user_id='$uid'";
            mysqli_query($con, $query);
           echo"Details Updated!"; 
           header("Refresh:0");
        }
        else
        {
           echo'<script>alert("Please enter some valid information")</script>';
        }
        }
 ?>
 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New User</title>
        <style>
        .topright 
        {
        color:white;
        position: absolute;
        top: 8px;
        right: 16px;
        font-size: 18px;
        }
     .center{
                text-align:center;
                margin:auto;
                width:70%;
                padding:25px;
                color:white;
            }
    body{
        background-image:url('https://images.unsplash.com/photo-1497864149936-d3163f0c0f4b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1469&q=80');
        background-position:center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        text-align:center;}
        h2{
            color:mintcream;
            align:center;
        }
        a{
            color:white;
        }
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
        </style>
</head>
<body>
 <h2>User Profile Details</h2>
    <div class="topright">
    <a href="index.php"><i class="fa-solid fa-house"></a>   
    <a href="profile.php">Your Account</a>
    <a href="logout.php">Logout</a>
    </div>  
    <?php 
        $a_user=$user_data['user_name'];
        $data= "select * from user where user_name='$a_user'";
        $result=mysqli_query($con,$data);
        if($result){
            if(mysqli_num_rows($result)>0){
                while ($row=mysqli_fetch_array($result)) {
                    //print_r($row['user_name']);
                    ?>
            <form class="center" method="post">
            user_id: <?php echo $user_data['user_id']?><br/><br/>
            
            Username:<input type="text" name="user_name" value="<?php echo $user_data['user_name']; ?>"><br/><br/>
            email:<input type="email" name="email" value="<?php echo $user_data['email']; ?>"><br/><br/>
            Password:<input type="password" name="password" value="<?php echo $user_data['password']; ?>"><br/><br/>
            Date of Birth:<input type="date" name="dob" min="01-01-1971" max="31-09-2022" value="<?php echo $user_data['dob']; ?>"><br/><br/>
            <input type="file" name="profilep" accept="image/png, image/gif, image/jpeg" ><br/><br/>
            <input type="submit" value="Update"><br/>
        </form>

        <?php
                }
            }
        }
     ?>
</body>
</html>