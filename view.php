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
	<title>Complex Query</title>
<form action="index.php" method="post">

	<input type="submit" value="Back" style="float: left;"/>

</form>

<form action="join.php" method="post">

	<input type="submit" value="Join Tables" style="float: right;"/>

</form>

</head>
<body>
		<br>
		<br>
		<center><h1>View Tables</12></center>
		<br>

<center><form action="view.php" method="post">
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
		<input type="submit" value="View Table" />

</form><center>

<?php 
if (isset($_POST['tableSearch'])) {

//load database connection
    $host = "localhost:3306";
    $user = "root";
    $password = "";
    $database_name = "esports";
    $pdo = new PDO("mysql:host=$host;dbname=$database_name", $user, $password, array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));

$tableSearch=$_POST['tableSearch'];

$query = $pdo->query("select * from $tableSearch");
$table_fields = array_keys($query->fetch(PDO::FETCH_ASSOC));

		
$query->execute();
$results = $query->fetchAll(PDO::FETCH_NUM);

$i = 0;

// Display search result
	if (!$query->rowCount() == 0) {
		echo "$tableSearch <br/>";
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
	print "<CENTER><font color='red'> Please select a table </font></CENTER>";
}
?>

</body>
</html> 