<?php 
session_start();
    include("connect.php");
    include("function.php");
    
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        //user given data
        $user_name=$_POST['user_name'];
        $password=$_POST['password'];
        $email=$_POST['email'];
        $DOB=date("y-m-d",strtotime($_POST['dob']));
        if(!empty($user_name) && !empty($password))
        {
            // saving to DB
            $user_id = random_num(20);
            $query="insert into user(user_id,user_name,password,email,DOB) values ('$user_id','$user_name','$password','$email','$DOB')";
            mysqli_query($con, $query);
           echo'<script>alert("User Created Sucessfully Please Login")</script>'; 
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
        position: absolute;
        top: 8px;
        right: 16px;
        font-size: 18px;
        }
            .center{
                background-color:slateblue;
                text-align:center;
                margin:auto;
                width:70%;
                padding:25px;
        color:white;
            }
    body{
        background-image:linear-gradient(tomato,skyblue);
        background-position:center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        text-align:center;}
        a{
            color:white;}
        h2{
            color:black;
            align:center;
        }
        </style>
</head>
<body>
 <h2>User Profile Update</h2>
    <div class="topright">
    <a href="index.php">Home</a>   
    <a href="profile.php">Your Account</a>
    <a href="logout.php">Logout</a>
    </div>  
        <form class="center" method="post">
            Username:<input type="text" name="user_name"><br/><br/>
            email:<input type="email" name="email"><br/><br/>
            Password:<input type="password" name="password"><br/><br/>
            Date of Birth:<input type="date" name="dob" min="01-01-1971" max="31-09-2022"><br/><br/>
        </form>
</body>
</html>