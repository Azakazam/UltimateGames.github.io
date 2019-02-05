
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
<div id ="TopAreaD">
<h3> Where top quality is our priority! </h3>
	
	<h2><u> My Database Designs </u></h2>

<h3> My scenario </h3>
<p><b>Ultimate games is the best store for the best games on the market, this search engine will provide you information on each game and their
details including game platforms and their genre aswell as to when they came out and the type of age group they are aimed at.  </b></p>
<h3> Class diagrams </h3>
<p>Here is my class diagram for my sql database, I made it using the site Creatively. The diagram shows the many attributes and tables used within my database. </p>
<img id="classD" src="images/class.png" alt="class diagram">
<h3> My Physical data model </h3>
<p> Here is my physical diagram for my sql database which was also made using the site creatively. It is much more detailed than the class diagram above as it features data types and primary and foreign keys. </p>
<img id="physical" src="images/physical.png" alt="physical diagram">
<h3> Database Tables</h3>
<p> Here are the database tables and their data which are stored within my sql database. The tables show their fields and the data present
in each of those fields. I currently have 5 database tables, 3 of them being my game, platform and genre table. Finally the other 2 which are my relationship
tables are known as game_genre and game_platform. </p>


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
echo "<div id=tableHead>";
$query = "SELECT * FROM game";
$result = $conn->query($query, PDO::FETCH_OBJ);
echo "<h3> Game Table </h3>";
echo "<br>";
echo "<table>";
echo "<th> game_ID </th>" . "<th> name </th>" . "<th> year </th>" . "<th> ageRating </th>" . "<th> image </th>";

while ($row = $result->fetch())
	{ //Creates a loop to loop through results
	echo "<tr><td>" . $row->game_ID . "</td><td>" . $row->name . "</td><td>" . $row->year . "</td><td>" . $row->ageRating . "</td><td>" . "<img id='imageSize' src='" . $row->image . "'>" . "</td></tr>"; //$row['index'] context for field name
	}

echo "</table>";
$query = "SELECT * FROM genre";
$result = $conn->query($query, PDO::FETCH_OBJ);
echo "<br>";
echo "<h3> Genre Table </h3>";
echo "<table id=genre>";
echo "<th> genre_ID </th>" . "<th> genre name </th>" . "<th> genre description </th>";

while ($rowG = $result->fetch())
	{ //Creates a loop to loop through results
	echo "<tr><td>" . $rowG->genre_ID . "</td><td>" . $rowG->genreName . "</td><td>" . $rowG->genreDescription . "</td></tr>";
	}

echo "</table>";
$query = "SELECT * FROM platform";
$result = $conn->query($query, PDO::FETCH_OBJ);
echo "<br>";
echo "<h3> Platform Table </h3>";
echo "<table id=platformTable>";
echo "<th> platform_ID </th>" . "<th> platform name </th>" . "<th> platform description </th>" . "<th> platform image </th>";

while ($rowG = $result->fetch())
	{ //Creates a loop to loop through results
	echo "<tr><td>" . $rowG->platform_ID . "</td><td>" . $rowG->platformName . "</td><td>" . $rowG->platformDescription . "</td><td>" . "<img id='imageplat' src='" . $rowG->platformImage . "'>" . "</td></tr>";
	}

echo "</table>";
$query = "SELECT * FROM game_genre";
$result = $conn->query($query, PDO::FETCH_OBJ);
echo "<br>";
echo "<div id='headA'><h3> Game_genre Table and Game_platform Table </h3></div>";
echo "<p> here are the relationship tables, to the left is the game_genre table and to the right is the game_platform table. </p>";
echo "<table id=genGame>";
echo "<th> genre_ID </th>" . "<th> game_ID </th>";

while ($rowP = $result->fetch())
	{ //Creates a loop to loop through results
	echo "<tr><td>" . $rowP->genre_ID . "</td><td>" . $rowP->game_ID . "</td></tr>";
	}

echo "</table>";
$query = "SELECT * FROM game_platform";
$result = $conn->query($query, PDO::FETCH_OBJ);
echo "<table id=gamePlatform>";
echo "<th> game_ID </th>" . "<th> platform_ID </th>";

while ($rowP = $result->fetch())
	{ //Creates a loop to loop through results
	echo "<tr><td>" . $rowP->game_ID . "</td><td>" . $rowP->platform_ID . "</td></tr>";
	}

echo "</table>";
echo "</div>";
$conn = NULL;
?>

<br />
<br />
<p> Click here to use the search engine: <a class="button" href="index.php">Home page</a></p>
</div>

<footer>
			<p>Ultimate Games 423 blooms street, wood green, London N13 3xx | Tel: 020 4444 3323</p>
</footer>

</body>
</html>