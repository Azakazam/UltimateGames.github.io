
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
<div id ="TopArea">
<h3> Where top quality is our priority! </h3>
	
	<h2><u>Ultimate Game's Search Engine </u></h2>
<p> Welcome to Ultimate Games, the best search engine for the most exclusive games out in the world </p>




<?php
$gameErr = "";
$search = "";

function input($data)
	{ //this input function will check the text entered into the search box, each string function within this function has a purpose
	$data = stripslashes($data); //this function will unquote a quoted string
	$data = trim($data); //this function will get rid of whitespaces
	$data = htmlspecialchars($data); //this function will convert special characters to HTML entities
	return $data;
	}

if (isset($_REQUEST['search']))
	{
	if ($_SERVER["REQUEST_METHOD"] == "POST")
		{
		if (empty($_POST["search"]))
			{
			$gameErr = "*Game name is required";
			}
		  else
			{
			$search = input($_REQUEST["search"]);
			}
		}
	}

?>  

<img id="ghostP" src="images/ghostP.gif" alt="ghostp">
<img id="ghostO" src="images/ghostO.gif" alt="ghostO">
<img id="ghost" src="images/ghost.gif" alt="ghost">
<img id="ghostB" src="images/ghostB.gif" alt="ghostB">
	<form id="formOne" name="Search" action="<?php
echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
		<h3><u>Search Engine </u></h3>
		<br />
		<label for ="search">Game name: </label><input type="text" value="<?php
echo $search; ?>" id="search" name="search"> 
		<span class="error"> <?php
echo $gameErr; ?></span>
		
		<input class = "buttonNav" type="submit" value="submit"/> 
	
	<h4> Your Results: </h4>
	
	<?php
/* here is the coding for grabbing data from the database to match what the user is searching */
/* http://localhost/phpmyadmin/#PMAURL-0:index.php?db=&table=&server=1&target=&token=ee52fed1e7c55dc8642734c251f9b37b */
require_once ("config.inc.php");

try
	{
	$conn = new PDO('mysql:host=localhost;dbname=u1451397', 'u1451397', '17apr96');
	}

catch(PDOException $exception)
	{
	echo "Oh no, there was a problem" . $exception->getMessage();
	}

/* here is my sql query */

if (isset($_REQUEST['search']) && !empty($_REQUEST['search']))
	{
	$search = $_REQUEST["search"];
	$page = "1";
	if (isset($_GET['page']))
		{

		// If page is set, get it

		$page = $_GET['page'];
		}

	$sql = "SELECT * FROM game";
	$query = $conn->query($sql);

	// count all messages

	$num = $conn->prepare("SELECT COUNT(*) AS 'total' FROM game WHERE name LIKE :search");
	$num->bindValue(':search', '%' . $search . '%');
	$num->execute();
	$row = $num->fetch();
	$num = $row['total'];
	$query->execute();

	// how many we want to display

	$per_page = "3";

	// calculate the last page

	$last = ceil($num / $per_page);

	// If page is 1 then remove link from "Previous" word
if ($last!= 0) {
	if ($page == 1 || !isset($page))
		{
		echo "Previous ";
		}
	  else
		{

		// But if page is set and it's not 1.. add link to previous word to go back by one page

		$previous = $page - 1;
		echo "<a href='?page=" . $previous . "&search=$search'>Previous</a> ";
		}

	if ($page == $last)
		{
		echo "Next";
		}
	  else
		{
		$next = $page + 1;
		echo "<a href='?page=" . $next . "&search=$search'>Next</a> ";
		}
}

	$start = ($page - 1) * $per_page;

	//  set the limit for our query

	$limit = "LIMIT $start, $per_page";
	$term = $conn->prepare("SELECT * FROM game WHERE name LIKE :search $limit");
	$term->bindValue(':search', '%' . $search . '%');
	$term->execute();
	$first = true;
	while ($game = $term->fetch(PDO::FETCH_OBJ))
		{
		if ($first)
			{
			$first = false;
			echo "<br />You have <b>$num</b> results!</br>";
			}

		echo "<ul>";
		echo "<li><a href='details.php?game_ID =" . $game->name . "'></a></li>";
		echo "<a href='details.php?game_ID=" . $game->game_ID . "'>";
		echo $game->name;
		echo "</a>";
		echo "</ul>";
		}

	if ($first)
		{
		echo "<p> Your search <strong>$search</strong> did not return anything, please try again.</p>";
		
		}

	$conn = NULL;
	}

?>
</form>

<br />
	<p> Click here to view my database designs: <a class="button" href="design.php">My designs</a></p>
</div>

<div id="BottomArea">
<img id="platform" src="images/platforms.png" alt="platform">
	<div id="slide">
<img class="DS" src="images/gba.png" alt="gba">
<img class="wii" src="images/virtual.png" alt="virtual">
<img class="ps4" src="images/newps.png" alt="ps4">
<img class="xbox" src="images/nintendo.png" alt="nintendo">
<img class="DS" src="images/gba.png" alt="gba">
<img class="wii" src="images/virtual.png" alt="virtual">
<img class="ps4" src="images/newps.png" alt="ps4">
<img class="xbox" src="images/nintendo.png" alt="nintendo">
	</div>	

</div>


<footer>
		<p>Ultimate Games 423 blooms street, wood green, London N13 3xx | Tel: 020 4444 3323</p>
</footer>

</body>
</html>