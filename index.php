<!--
    Index page in Medullo
-->
<?php
session_start();

   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', '');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', '');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die("Couldn't connect");
   
   if(!isset($_SESSION["user"])){
   if($_SERVER["REQUEST_METHOD"] == "POST") {
          
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT first FROM user WHERE uname = '$myusername' AND psd='$mypassword'";
      $result = mysqli_query($db,$sql);
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		//$cookie_user=$myusername;
      if($count == 1) {
		  $_SESSION["user"]=$myusername; 
         
         header("location: feed.php");
			
      }else {
         echo "Your Login Name or Password is invalid";
      }
   }}
else{
 header("location: feed.php");
}

?>

<style>
.formContainer{
  margin-top: 100px;
  margin-bottom: 100px;
  margin-left: 100px;
  margin-right: 100px;
}
</style>
<html>

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./index.css">
  <title> Medullo - Find and share what you &#xf004</title>

</head>


<body>
        <form action="" method="POST" >
  <div class = "formContainer center">
    <div class = "row">
      <div class = "col-sm-3"></div>
      <div class = "col-sm-3">
        <label>Username</label>
      </div>
      <div class = "col-sm-3">
        <input type = "text" name = "username" required/>
      </div>
      <div class = "col-sm-3"></div>
    </div>
    
    <div class = "row">
      <div class = "col-sm-3"></div>
      <div class = "col-sm-3">
        <label>Password</label>
      </div>
      <div class = "col-sm-3">
        <input type = "password" name = "password" required/>
      </div>
      <div class = "col-sm-3"></div>
    </div>
    
    <div class = "row">
      <div class = "col-sm-3"></div>
      <div class = "col-sm-3">

		<button class="btn btn-primary">Login <i class = "fa fa-key"></i></button>      
		</div></form>
      <form action="register.php" ><div class = "col-sm-3">
        <a href = "./register.html">
          <button class = "btn btn-success">New User?</button></a>
      </div></form>
      <div class = "col-sm-3"></div>
    </div>
  </div>


</body>

</html>