<!doctype html>
<html>
<head>
<title>Login</title>
    <style>
        body,html{
         background-image: url("tajmahal.jpg");
    height: 100%;
    margin: 0%;
    font-family: verdana;
    font-size: 100%;
    background-position: center;
  background-repeat: no-repeat;
  background-size: cover;

        }

            h1 {
    color: white;
    font-family: verdana;
    font-size: 200%;
    background-color: orange;
}
        h3 {
    color: indigo;
    font-family: verdana;
    font-size: 100%;
}

      .loginregister{
      	position: absolute;
      	top: 15px;
      	left: 16px;
      }

      .loginform{
      	width: 300px;
      	border: none;
      	border: 1px solid black;
      	height: 40px;
      	font-size: 24px;
      }

      .formdetails{
      	position: relative;
      	top: 80px;
      	font-size: 30px;
      }
      a{
      	color: white;
      }
      .button{
      	width: 100px;
      	height: 40px;
      	background-color: orange;
      	color: white;
      }
      .exceptionhandler{
        position: relative;
        top:100px;
      }


</style>
</head>
<body>
     <center><h1>BookMee </h1></center>
   <p class="loginregister"><a href="register.php">Register</a> | <a href="index.php">Login</a></p>
<center><form class="formdetails" action="" method="POST" >
Username: <input class= "loginform" type="text" name="user"><br><br>
Password: <input class= "loginform" type="password" name="pass"><br><br>
<input class="button" type="submit" value="Login" name="submit" />
</form>
</center>
<center><font color="red"><p class="exceptionhandler">
<?php
require_once "pdo.php";
if(isset($_POST["submit"])){

if(!empty($_POST['user']) && !empty($_POST['pass'])) {
    $user=$_POST['user'];
    $pass=$_POST['pass'];

    $query= $pdo->prepare("SELECT * FROM users WHERE UserName = :un AND Password = :p");
    $query->execute(array(":un" => $user,":p" => $pass));
    $row = $query->fetch(PDO::FETCH_ASSOC);
    if($row !== false)
    {
    $dbusername=$row['UserName'];
    $dbpassword=$row['Password'];

    if($user == $dbusername && $pass == $dbpassword)
    {
    session_start();
    $_SESSION['name'] = $user;
    $_SESSION['userid'] = $row['UserID'];

    /* Redirect browser */
    header("Location: main.php");
    }
    } else {
    echo "Invalid username or password!";
    }

} else {
    echo "All fields are required!";
}
}
?></font>
</center>
</body>
</html>
