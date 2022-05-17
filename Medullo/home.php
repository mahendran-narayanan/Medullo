<!--
		Home page in Medullo
		Showing shared posts
-->
<?php
	define('DB_SERVER', 'localhost');
   define('DB_USERNAME', '');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', '');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die("Couldn't connect");
   session_start();
   if(isset($_SESSION["user"])){
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		
		$mytitle = mysqli_real_escape_string($db,$_POST['title']);
		$myauthor = mysqli_real_escape_string($db,$_POST['author']);
		$mygenre = mysqli_real_escape_string($db,$_POST['genre']);
		$myqlty = mysqli_real_escape_string($db,$_POST['quality']);
		$mycat = mysqli_real_escape_string($db,$_POST['category']);
		$myuser=$_SESSION["user"];
                $mycontact=$_POST["contact"];
		$sql = "INSERT INTO post (mail,title,author,genre,quality,cat,mob) VALUES ('$myuser','$mytitle','$myauthor','$mygenre','$myqlty','$mycat','$mycontact')";
		
		
		try
		{
			$result = mysqli_query($db,$sql);
			echo "Your post is successfully shared!!!";
		}
		catch(Exception $e)
		{
			echo "Sorry something went wrong";
		}


   }}
else{
header("location: index.php");
}
?>

<html lang="en">
<head>
  <title>Medullo</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel = "stylesheet" href = "./art.css">
  <link rel =  "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>


	
<div class = "container-fluid">
  <nav class = "navbar navbar-inverse navbar-fixed-top">
    <div class = "container-fluid">
      <div class = "navbar-header">
        <button type = "button" class = "navbar-toggle" data-toggle = "collapse" data-target = "#myNavbar">
          <span class = "icon-bar"></span>
          <span class = "icon-bar"></span>
          <span class = "icon-bar"></span>
        </button>
        <a class = "navbar-brand" href = "http://medullo.000webhostapp.com/feed.php"> Medullo</a>
      </div>
      <div class = "collapse navbar-collapse" id = "myNavbar">
        <ul class = "nav navbar-nav">
          <li><a href = "#search">Search</a></li>
          <li><a href = "#share">Share</a></li>
        </ul>
		<ul class="nav navbar-nav navbar-right">
		  <li><a href="http://medullo.000webhostapp.com/logout.php"><button class = "btn btn-danger">Logout</button></a></li>
		</ul>
		
      </div>
    </div> 
   </nav>
   <div>
	   <div id="background-carousel">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
			  <div class="carousel-inner">
				<div class="item active" style="background-image:url(http://www.themesltd.com/headers2/books_books_books.png)"></div>
				<div class="item" style="background-image:url(http://www.themesltd.com/headers2/music_note_cassettes.png)"></div>
				<div class="item" style="background-image:url(https://s-media-cache-ak0.pinimg.com/736x/18/36/ea/1836eab85479542a4bca127adb7221aa.jpg)"></div>  
			  </div>
			</div>
		</div> 
	  
	
   <form action="search.php" method="post"> <div id = "search" class = "full-page text-center ">

      <input type = "text" id = "searchBar"placeholder = "Search" name="s"/>
	  
      <button class ="btn btn-primary"><i class = "fa fa-search"></i>Search</button>
	 
	</div></form>
	<div id = "share" class = "full-page text-center well">
		<h1><i class = "fa fa-bullhorn fa-5x"></i></h1>
		<br>
		<span id = "tagline">Share what you <i class = "fa fa-heart">!</i></span>
		<br>
		<br>
		<div id = "form">
			<form action="" method="post" class = "form-horizontal">
				<div class = "form-group">
					<label for = "title" class = "control-label col-sm-2">Title: </label>
					<div class = "col-sm-10">
						<input type = "text" class = "form-control" name = "title" required />
					</div>
				</div>
				<div class = "form-group">
					<label for = "artist" class = "control-label col-sm-2">Author/Artist: </label>
					<div class = "col-sm-10">
						<input type = "text" class = "form-control" name = "author" required />
					</div>
				</div>
				<div class = "form-group">
					<label for = "genre" class = "control-label col-sm-2">Genre: </label>
					<div class = "col-sm-10">
						<input type = "text" class = "form-control" name = "genre" required />
					</div>
				</div>
				<div class = "form-group">
					<label for = "quality" class = "control-label col-sm-2">Quality: </label>
					<div class = "col-sm-10">
						<input type = "text" class = "form-control" name = "quality" required />
					</div>
				</div>
				<div class = "form-group">
					<label for = "category" class = "control-label col-sm-2">Category </label>
					<div class = "col-sm-10">
						<input type = "text" class = "form-control" name = "category" required />
					</div>
				</div>
<div class = "form-group">
					<label for = "quality" class = "control-label col-sm-2">Contact: </label>
					<div class = "col-sm-10">
						<input type = "number" class = "form-control" name = "contact" required />
					</div>
				<button class = "btn-primary btn" name="share">Share</button>
			</form>
		</div>
	</div>
  </div>
  
</body>
</html>