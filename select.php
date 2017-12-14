<?php session_start(); /* Starts the session */

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

input {
    min-width:100px;
    min-height: 45px;
    border-width: 3px;
    border-color: rgba(50, 50, 50, 0.14);
    margin: 10px 10px 10px 0px;

}

</style>
	<title>View Tables</title>
<form action="index.php" method="post">

	<input type="submit" value="Back" style="float: left;"/>

</form>

<form action="logout.php" method="post">

	<input type="submit" value="Logout" style="float: right;"/>

</form>

</head>
<body>
		<center><h1 style="color:black;">Select an Operation</12></center>
		<br>

	<center><form action="insert.php" method="post">

		<input type="submit" value="INSERT" style="min-width:200px; min-height:75px;" /></form>

	<form action="delete.php" method="post">
		
			<input type="submit" value="DELETE" style="min-width:200px; min-height:75;" /></form>

	<form action="update.php" method="post">
		
			<input type="submit" value="UPDATE" style="min-width:200px; min-height:75px;" /></form>
	</form><center>

</body>
</html> 

