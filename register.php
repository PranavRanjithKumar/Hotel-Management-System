<!doctype html>  
<html>  
<head>  
<title>Register</title>  
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
    top:1px; 
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
        width: 250px;
        border: none;
        border: 1px solid black;
        height: 20px;
        font-size: 15px;
      }

      .formdetails{
        position: relative;
        top: 20px;
        font-size: 20px;
      }
      a{
        color: white;
      }
      .button{
        width: 100px;
        height: 35px;
        background-color: orange;
        color: white;
      } 
      .exceptionhandler{
        position: relative;
        top:25px;
      }
}</style>  
</head>  
<body>  
     
    <center><h1>BookMee register</h1></center>  
   <p class="loginregister"><a href="register.php">Register</a> | <a href="index.php">Login</a></p>   
<form class="formdetails" action="" method="POST">  
    <center>  
          
Username: <input class= "loginform" type="text" name="user"><br><br>  
Password: <input class= "loginform" type="password" name="pass"><br /><br> 
Email: <input class= "loginform" type="email" name="email"><br /><br>
Mobile: <input class= "loginform" type="mobile" name="mobile"><br /><br>
City: <input class= "loginform" type="city" name="city"><br /><br>
State: <input class= "loginform" type="state" name="state"><br /><br>  
Pincode: <input class= "loginform" type="pincode" name="pincode"><br /><br>
<input class="button" type="submit" value="Register" name="submit" /><br>  
              
 </center>
          
</form>  
<center><font color="red"><p class="exceptionhandler">
<?php
require_once "pdo.php";  
if(isset($_POST["submit"])){  
if(!empty($_POST['user']) && !empty($_POST['pass']) && !empty($_POST['email']) && !empty($_POST['mobile']) && !empty($_POST['city']) && !empty($_POST['state']) && !empty($_POST['pincode'])) {  
    $user=$_POST['user'];  
    $pass=$_POST['pass'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $city=$_POST['city'];
    $state=$_POST['state'];  
    $pincode=$_POST['pincode']; 

    if(strlen($pass) <6){
      echo "Password should be greater than 6 characters";
    }
    elseif (strlen($pass)>14) {
      echo "Password should be lesser than 14 characters";
     }
     elseif (strlen((string)$mobile) != 10) {
      echo "Invalid Mobile Number";
  } 
  else{
    $query= $pdo->prepare("SELECT * FROM users WHERE UserMail = :um AND UserPhone = :p");
    $query->execute(array(":um" => $email,":p" => $mobile));
    $row = $query->fetch(PDO::FETCH_ASSOC);
    if($row === false){
      $sql= $pdo->prepare("INSERT INTO users(UserName,Password,UserMail,UserPhone,City,State,PinCode) VALUES(:u,:pass,:e,:m,:c,:s,:p)");
      $sql->execute(array(":u" => $user,":pass" => $pass,":e" => $email,":m" => $mobile,":c" => $city,":s" => $state,":p" => $pincode));
      header("Location:index.php");
      return;
    }
    else{
      echo "That Mobile number or email already exists! Please try again with another.";
    }
  }
}
 else {  
    echo "All fields are required!";  
}  
}  
?>  
</body>  
</html>   