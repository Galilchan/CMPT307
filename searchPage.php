<html>	
<head>
<style type"text/css">

h1 {
    color: black;
    font-family: arial;
    font-size: 300%;
}

body { 
    background-color: #649cef;
}

select {
    min-width:265px;
    min-height: 45px;
    border-width: 3px;
    border-color: rgba(50, 50, 50, 0.14);
    margin: 10px 10px 10px 0px;
}

input {
    min-width:100px;
    min-height: 45px;
    border-width: 3px;
    border-color: rgba(50, 50, 50, 0.14);
    margin: 10px 10px 10px 0px;

}

table {
    width: 100%;
}

table, th, td {
    padding: 15px;
    text-align: left;
    font-size: 110%;
}

</style>

	<title>Search Database</title>
<form action="index.php" method="post">

	<input type="submit" value="Back" style="float: left;"/>

</form>

<form action="complex.php" method="post">

	<input type="submit" value="Complex Search" style="float: right;"/>

</form>

</head>
<body>
		<br>
		<br>
		<center><h1 style="color:black;">Search Database</12></center>
		<br>

			<center><form action="searchPage.php" method="post">
			<select name="tableSearch"> 
			<option value="" disabled selected>Select Table</option>
  			<option value="champion">Champion</option>
  			<option value="person">Person</option>
  			<option value="rank">Rank</option>
  			<option value="sponsor">Sponsor</option>
  			<option value="player">Player</option>
  			<option value="coach">Coach</option>
  			<option value="stats">Stats</option>
			<option value="team">Team</option>
    			<option value="seasons">Seasons</option>
			<option value="league">League</option>
  			<option value="venue">Venue</option>
  			<option value="stage">Stage</option>
			</select>

			<input type="text" name="search" placeholder=" Type Keyword ... "/>
			<input type="submit" value="Search" />
	</form><center>

<?php 
if (isset($_POST['search']) OR isset($_POST['tableSearch'])) {
if (!isset($_POST['tableSearch']) AND "" == trim($_POST['search'])) {
	exit("Please select a search parameter");
}
if (!isset($_POST['tableSearch']) AND "" != trim($_POST['search'])) {
	exit("Please select a search parameter");
}

//load database connection
    $host = "localhost:3306";
    $user = "root";
    $password = "";
    $database_name = "esports";
    $pdo = new PDO("mysql:host=$host;dbname=$database_name", $user, $password, array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));
$search=$_POST['search'];
$tableSearch=$_POST['tableSearch'];

switch ($tableSearch) {
	case "champion":
		$query = $pdo->query("select * from champion where champion_name LIKE '%$search%' OR primary_role LIKE '%$search%'OR lane LIKE '%$search%'");
		break;
	case "person":
		$query = $pdo->query("select * from person where username LIKE '%$search%' OR realname LIKE '%$search%' OR country LIKE '%$search%' OR age LIKE '%$search%' OR main_champion LIKE '%$search%'");
		break;
	case "rank":	
		$query = $pdo->query("select * from rank where elo LIKE '%$search%' OR placement LIKE '%$search%'OR mmr LIKE '%$search%'");
		break;
	case "sponsor":
		$query = $pdo->query("select * from sponsor where sponsor_ID LIKE '%$search%' OR contribution LIKE '%$search%' OR industry LIKE '%$search%'");
		break;
	case "player":
		$query = $pdo->query("select * from player where playerID LIKE '%$search%' OR played_since LIKE '%$search%' OR rank LIKE '%$search%' OR sponsor_ID_player LIKE '%$search%'");
		break;
	case "coach":
		$query = $pdo->query("select * from coach where coachID LIKE '%$search%' OR coach_name LIKE '%$search%' OR team LIKE '%$search%' OR sponsor_ID_coach LIKE '%search%'");
		break;
	case "stats":
		$query = $pdo->query("select * from stats where Stats_ID LIKE '%$search%' OR number_of_games LIKE '%$search%' OR average_game_duration LIKE '%$search%' OR average_kills LIKE '%$search%' OR shortest_game LIKE '%$search%' OR longest_game LIKE '%$search%'");
		break;
	case "team":
		$query = $pdo->query("select * from team where teamID LIKE '%$search%' OR team_coach_ID LIKE '%$search%'OR team_player_ID LIKE '%$search%' OR team_stats_ID LIKE '%$search%'OR team_sponsor_ID LIKE '%$search%'");
		break;
	case "seasons":
		$query = $pdo->query("select * from seasons where year_ LIKE '%$search%' OR duration LIKE '%$search%'OR stats LIKE '%$search%'");
		break;
	case "league":
		$query = $pdo->query("select * from league where leagueID LIKE '%$search%' OR teamID LIKE '%$search%'OR region LIKE '%$search%'");
		break;
	case "venue":
		$query = $pdo->query("select * from venue where location LIKE '%$search%' OR venue_Name LIKE '%$search%'OR date LIKE '%$search%' OR venueSize LIKE '%$search%'");
		break;
	case "stage":
		$query = $pdo->query("select * from stage where stageID LIKE '%$search%' OR team_ID_stage LIKE '%$search%'OR venueName LIKE '%$search%'");
		break;
};

$query->bindValue(1, "%$search%", PDO::PARAM_STR);
try {
$table_fields = array_keys($query->fetch(PDO::FETCH_ASSOC));
}
catch (Exception $e) {
	exit ("No results");
}
$query->execute();
$results = $query->fetchAll(PDO::FETCH_NUM);
$i = 0;

// Display search result
	if (!$query->rowCount() == 0) {
		echo "Search found :<br/>";
		echo "<table style=\"font-family:arial;color:#333333;\">";	
			echo "<tr>";
			foreach ($table_fields as $keys) {
				echo "<td style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\">$keys</td>";
				}
			echo "</tr><tr>";
			for($j=0; $j <= $query->rowCount()-1; $j++) {
            		for ($i=0; $i < $query->columnCount(); $i++){
					echo "<td style=\"border-style:solid;background:#f2f2f2;border-width:1px;border-color:#000000;\">";
                		echo $results[$j][$i];	
            }
			echo "</td></tr>";
}
		
		echo "</table>";
/*
		echo nl2br("Columns: " . count($results) . "\r\nRows: " . $query->rowCount() . "");
	*/
        } else {
            print "<CENTER><font color='red'> No Results </font></CENTER>";
        }
}
?>

</body>
</html> 
