<?php session_start();

if(!isset($_SESSION['UserData']['Username'])){
	header("location:login.php");
	exit;
}
?>
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
    min-width:50px;
    min-height: 30px;
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
</style>

	<title>Add to Database</title>
<form action="select.php" method="post">

	<input type="submit" value="Back" style="float: left;"/>

</form>

<form action="view.php" method="post">

	<input type="submit" value="View Tables" style="float: right;"/>

</form>

</head>
<body>

		<center><h1 style="color:black;">Insert Rows</center>
		<br>

<center><h3 style="color:black;">Remember proper syntax!</center>
		

	<center><form action="insert.php" method="post">
	INSERT INTO <select name="table"> 
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
		(<input type="text" name="fields" placeholder=" Type table info..." maxlength="200" size="70" style="min-height: 30px;"/>)
	
	<br>
 	VALUES (<input type="text" name="values" placeholder=" Type new data..." maxlength="200" size="50" style="min-width:100px; min-height: 30px;"/>)
	<br>
			<input type="submit" value="INSERT" />
	</form>

<center>

<?php 
if (isset($_POST['table']) AND isset($_POST['fields']) AND isset($_POST['values'])) {

//load database connection
    $host = "localhost:3306";
    $user = "root";
    $password = "";
    $database_name = "esports";
    $pdo = new PDO("mysql:host=$host;dbname=$database_name", $user, $password, array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));

$table=$_POST['table'];
$fields=$_POST['fields'];
$values=$_POST['values'];

$query=$pdo->query("INSERT INTO $table($fields) VALUES ($values)");

print "<CENTER><font color='green'>Values succesfully inserted!</font></CENTER>";

} else {
	if(!isset($_POST['table'])) {
	print "<CENTER><font color='red'>Please input the desired table</font></CENTER>";
	} elseif(!isset($_POST['fields'])) {
	print "<CENTER><font color='red'>Please input the corresponding fields</font></CENTER>";
	} elseif(!isset($_POST['values'])) {
	print "<CENTER><font color='red'>Please input the desired values</font></CENTER>";
	}
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