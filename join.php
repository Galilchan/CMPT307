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
    min-width:125px;
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

	<title>View Tables</title>

<form action="view.php" method="post" style="float: left;">

	<input type="submit" value="Back" />

</form>

<form action="index.php" method="post">

	<input type="submit" value="Index" style="float: right;"/>

</form>

</head>
<body>
		<br>
		
	<center><h1>Join Tables</12></center>
		<br>

<center><form action="join.php" method="post">
			<select name="tableSearch1"> 
			<option value="" disabled selected>Select First Table</option>
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


<action="join.php" method="post">
			<select name="joinType"> 
			<option value="" disabled selected>Select Join Type</option>
  			<option value="join">INNER JOIN</option>
  			<option value="left join">LEFT JOIN</option>
  			<option value="right join">RIGHT JOIN</option>
  			<option value="full join">FULL JOIN</option>
			</select>


			<action="join.php" method="post">
			<select name="tableSearch2"> 
			<option value="" disabled selected>Select Second Table</option>
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
if (isset($_POST['tableSearch1']) AND isset($_POST['tableSearch2']) AND isset($_POST['joinType'])) {

    $host = "localhost:3306";
    $user = "root";
    $password = "";
    $database_name = "esports";
    $pdo = new PDO("mysql:host=$host;dbname=$database_name", $user, $password, array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));

$tableSearch1=$_POST['tableSearch1'];
$tableSearch2=$_POST['tableSearch2'];
$join=$_POST['joinType'];

$query = $pdo->query("select * from $tableSearch1 $join $tableSearch2");
$join_fields = array_keys($query->fetch(PDO::FETCH_ASSOC));
		
$query->execute();
$results = $query->fetchAll(PDO::FETCH_NUM);
$i = 0;

	if (!$query->rowCount() == 0) {
		echo "$tableSearch1 $join $tableSearch2 <br/>";
		echo "<table style=\"font-family:arial;color:#333333;\">";	
			echo "<tr>";
			foreach ($join_fields as $keys) {
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
	if (!isset($_POST['tableSearch1'])) {
	print "<CENTER><font color='red'> Please select a primary table </font></CENTER>";
	} elseif (!isset($_POST['tableSearch2'])) {
	print "<CENTER><font color='red'> Please select a secondary table </font></CENTER>";
	} elseif (!isset($_POST['joinType'])) {
	print "<CENTER><font color='red'> Please select a join type </font></CENTER>";
	}
}
?>
</center>
</body>
</html> 
