<?php 
session_start();
    include("connect.php");
    include("function.php");
    
    
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
	<a href="sign.php">New User?</a> 
        </form>

 </body>
 </html>

        