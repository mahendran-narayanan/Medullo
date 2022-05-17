<!--
   Register page in Medullo 
-->
<?php
	define('DB_SERVER', 'localhost');
   define('DB_USERNAME', '');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', '');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die("Couldn't connect");
   session_start();
   if($_SERVER["REQUEST_METHOD"] == "POST") {
	   $myemail = mysqli_real_escape_string($db,$_POST['email']);
      $myfirst = mysqli_real_escape_string($db,$_POST['fname']); 
	   $mylast = mysqli_real_escape_string($db,$_POST['lname']);
      $myuname = mysqli_real_escape_string($db,$_POST['uname']); 
	  $mydob = $_POST['dob'];
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
	  
	  $sql= "SELECT first FROM user WHERE mail='$myemail'";
	  $result = mysqli_query($db,$sql);
      $count = mysqli_num_rows($result);
	  if($count==0){
	  try {$sql = "INSERT INTO user (first,last,uname,mail,psd,dob) VALUES ('$myfirst','$mylast','$myuname','$myemail','$mypassword','$mydob')";
      $result = mysqli_query($db,$sql);
      
		  header("location: index.php");
	  }catch(Exception $e)
	  {
		  echo "Register failed....try again";
	  }}
	  else
	  {
		  echo "E-Mail already exists";
	  }
   }  
?>



<html>

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--<link rel="stylesheet" href="./index.css">-->
  <title> Medullo - Find and share what you &#xf004</title>

</head>

<body>
  <div ><form action="" class="form-control" style="display: inline-block;
    text-align: center;" method="post">
    <legend>Register</legend>
    Email ID: <input type = "email" name = "email" required/>
    <br> First Name: <input type="text" name="fname" required/>
	<br>Last Name: <input type="text" name="lname" required/>
	<br> Username: <input type="text" name="uname" required/>
	<br> Password: <input type="password" name="password" required/>
	<br> Confirm Password: <input type="password" name="cpword" required/>
	<br>    Date of Birth: <input type="date" name="dob" required/><br>
    <input type = "submit" name = "Register" class = "btn btn-success">
  </form>
</div>

</body></html>