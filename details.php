<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="description" content="My homepage.">
      <title> Search Engine </title>
      <link rel="stylesheet" type="text/css" href="style.css"/>
   </head>
<body>
<header>
<img id="Logo" src="images/Logo.png" alt="Game Logo">

</header>
<div id ="TopAreaC">

	

<?php
require_once ("config.inc.php");

try
	{
	$conn = new PDO(DB_DATA_SOURCE, DB_USERNAME, DB_PASSWORD);
	}

catch(PDOException $exception)
	{
	echo "Oh no, there was a problem" . $exception->getMessage();
	}

if (!isset($_GET['game_ID']))
	{
	echo "You shouldn't have got to this page";
	exit;
	}

$game = $_GET['game_ID'];



$query = "SELECT * FROM game JOIN game_platform ON game.game_ID=game_platform.game_ID JOIN platform ON game_platform.platform_ID = platform.platform_ID
JOIN game_genre ON game.game_ID=game_genre.game_ID JOIN genre ON game_genre.genre_ID = genre.genre_ID WHERE game.game_ID = :game"; 

$term = $conn->prepare($query);
$term->bindValue(':game', $game);
$term->execute();

if ($game = $term->fetch(PDO::FETCH_OBJ))
	{
	echo "<div class=align>";
	echo "<h1> $game->name </h1>";
	echo "<ul>";
	echo "<li><img id='imagetax' src='" . $game->image . "'></li>";
	echo "</br>";
	echo "<li><b>year created: </b>" . $game->year . "</li>";
	echo "<li><b>age rating: </b>" . $game->ageRating . "</li>";
	echo "</div>";
	echo "<img id='genreLogo' src='images/genrelogo.png' alt='genrelogo'>";
	echo "<li><b>Genre Name: </b>" . $game->genreName . "</li>";
	echo "</br>";
	echo "<li><b>Genre Description: </b>" . $game->genreDescription . "</li>";
	echo "</br>";
	echo "<img id='platformLogo' src='images/platformlogo.png' alt='platformlogo'>";
	echo "<li><b>platform Name: </b>" .$game->platformName . "</li>";
	echo "</br>";
	echo "<li><b>platform Description: </b>" .$game->platformDescription . "</li>";
	echo "<div class=align>";
	echo "</br>";
	echo "<li><img id='imageplatD' src='" . $game->platformImage . "'></li>";
	echo "</br>";
	echo "</div>";
	echo "</ul>";
	
	}

$conn = NULL;
?>  
<p> Click here to return to the search engine: <a class="button" href="index.php">Search engine</a></p>
</div>

<footer>
			<p>Ultimate Games 423 blooms street, wood green, London N13 3xx | Tel: 020 4444 3323</p>
</footer>

</body>
</html>