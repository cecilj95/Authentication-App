<?php 
session_start();
    include("connect.php");
    include("function.php");
    
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        //user given data
        $user_name=$_POST['user_name'];
        $password=$_POST['password'];
        if(!empty($user_name) && !empty($password))
        {
            // compairing from DB
            $query="select * from user where user_name='$user_name' limit 1";
            $result=mysqli_query($con, $query);
            
        //checking password
            if($result)
            {
            if($result && mysqli_num_rows($result)>0)
                {
                $user_data=mysqli_fetch_assoc($result);
                 if($user_data['password']===$password)
                    {
                    // reouting to main dashboard
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header('Location:index.php');
                    die;
                    }
                }
            }
            echo'<script>alert("Invalid details!")</script>';
        }
        else
        {
           echo '<script>alert("Please enter some valid information!!")</script>';
        }
        }
    
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	
 </head>
 <body>
 <title>Login page</title>
        <style>
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
		a{
			color:white;}
		h2{
			color:mintcream;
			align:center;
		}
        </style>
	 <script>
            function login(){
                var uname=document.forms["log"]["uname"].value;
                var pass=document.forms["log"]["pass"].value;
                {
                    if(uname==null||uname==""){
                        alert("Enter valid details!");
                        return false;
                    }
                    else if(pass==null || pass==""){
                        alert("Enter your password!");
                        return false;
                    }
                }
            }
        </script>
    </head>
   <body>
	<h2>User Login</h2>
        <form class="center" name="log" method="post" onsubmit="login()">
            Username:<input type="text" name="user_name"><br/><br/>
            Password:<input type="password" name="password"><br/><br/>
            <input type="submit" value="Submit"><br/>
	<a href="sign.php">Sign up here</a> 
        </form>

 </body>
 </html>

        