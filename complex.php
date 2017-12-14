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
<form action="searchPage.php" method="post">

	<input type="submit" value="Back" style="float: left;"/>

</form>

<form action="index.php" method="post">

	<input type="submit" value="Index" style="float: right;"/>

</form>

</head>
<body>

		<br>
		<center><h1 style="color:black;">Complex Query</center>
		<br>

<center><h3 style="color:black;">Remember proper syntax!</center>
		

	<center><form action="complex.php" method="post">
	<input type="text" name="complexQuery" placeholder=" Type query... " maxlength="500" size="150"/>
	<br>
			<input type="submit" value="Search" />
	</form>

<center>

<?php 
if (isset($_POST['complexQuery'])) {

//load database connection
    $host = "localhost:3306";
    $user = "root";
    $password = "";
    $database_name = "esports";
    $pdo = new PDO("mysql:host=$host;dbname=$database_name", $user, $password, array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));

$search=$_POST['complexQuery'];

$query = $pdo->query($search);
$table_fields = array_keys($query->fetch(PDO::FETCH_ASSOC));

$query->execute();
$results = $query->fetchAll(PDO::FETCH_NUM);
$i = 0;

// Display search result
	if (!$query->rowCount() == 0) {
		echo "$search <br/>";
		echo "<table style=\"font-family:times new roman;color:#000000;\">";	
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
        }
} else {
	print "<CENTER><font color='red'>Please input a query</font></CENTER>";

}
?>
<center>
<br>
<h3 style="text-decoration: underline;">Table Reference</h3>
Champion (champion_name, primary_role, lane) <br>
Person (username, realname, country, age, main_champion) <br>
Rank (ELO, Placement, MMR) <br>
Sponsor (sponsor_ID, contribution, industry) <br>
Player (playerID, played_Since, rank, sponsor_ID_Player) <br>
Coach (coachID, coach_name, team, sponsor_ID_coach) <br>
Stats (Stats_ID, Number_of_games, Average_game_duration, Average_kills, shortest_game, longest_game) <br>
Seasons (year, duration, stats) <br>
Team (teamID, team_coach_ID, team_player_ID, team_stats_ID, team_sponsor_ID) <br>
League (leagueID, teamID, region) <br>
Venue (location, venue_Name, date_, venueSize) <br>
Stage (stageID, team_ID_stage, venueName) <br>
</center>
</body>
</html>