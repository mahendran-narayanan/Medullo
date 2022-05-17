<!--To add the details in Medullo database-->
<?php 
session_start();
define('DB_SERVER', 'localhost');
   define('DB_USERNAME', '');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', '');
if(isset($_SESSION["user"])){
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die("Couldn't connect");
   
   
   $sql="SELECT * FROM post";
   $result=mysqli_query($db,$sql);
   $count=1;
   while($row=mysqli_fetch_array($result))
   {
	  echo "Post No".$count."<br>";
	   $a=$row['title'];
	   $b=$row['author'];
	   $c=$row['genre'];
	   $d=$row['quality'];
	   $e=$row['cat'];
	   echo "Title    : ".$a."<br>";
	   echo "Author   : ".$b."<br>";
	   echo "Genre    : ".$c."<br>";
	   echo "Quality  : ".$d."<br>";
	   echo "Category : ".$e."<br><br>";
	   $count++;
	   
   }
		}
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
	  <link rel =  "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link rel = "stylesheet" href = "./style.css">
	  <script src = "./effects.js"></script>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
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
				  <li><a href = "http://medullo.000webhostapp.com/home.php#search">Search</a></li>
				  <li><a href = "http://medullo.000webhostapp.com/home.php#share">Share</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
				  <li><a href="http://medullo.000webhostapp.com/logout.php"><button class = "btn btn-danger">Logout</button></a></li>
				</ul>
				
			  </div>
            </div>
    </div> 
   </nav>
	<div id="background-carousel">
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
				  <div class="carousel-inner">
					<div class="item active" style="background-image:url(http://www.themesltd.com/headers2/books_books_books.png)"></div>
					<div class="item" style="background-image:url(http://www.themesltd.com/headers2/music_note_cassettes.png)"></div>
					<div class="item" style="background-image:url(https://s-media-cache-ak0.pinimg.com/736x/18/36/ea/1836eab85479542a4bca127adb7221aa.jpg)"></div>  
				  </div>
				</div>
			</div>
		<div class = "container-fluid well" id = "mainDiv">
			
			<div class = "rows full-page">
				<div class = "col-sm-9 pre-scrollable well fullpage">

					
				</div>
				<div class = "col-sm-3 well" id = "about">
					Medullo is a tool that helps you <span id = "searchLink"> <a href = "http://medullo.000webhostapp.com/home.php">find resources </a> </span>like books, videos, music, games and all things fun among peers for sharing! 
					What's more? You too can <span id = "shareLink"> <a href = "http://medullo.000webhostapp.com/home.php?#share"> share your favourite things</a> </span> with the world. Now! 
				</div>
			</div>
		</div>
	</body>
</html>