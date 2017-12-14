<html>
<style type"text/css">

h1 {
    color: black;
    font-family: arial;
    font-size: 400%;
}

body { 
    background-color: #649cef;
}

input {
    min-width:100px;
    min-height: 45px;
    border-color: #323232;
    margin: 10px 10px 10px 0px;
}

body { 
    background-image: url("indexPic.jpg");

    height: 100%; 

    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

form {
    display: inline;
}

</style>

<form action="login.php" method="post">

	<input type="submit" value="Login" style="float: left;"/>

</form>

<form action="logout.php" method="post">

	<input type="submit" value="Logout" style="float: right;"/>

</form>
<head>
	<title>LOL Database</title>

</head>
<body>
		
		<center><h1 style="color:black;">League of Legends Database</12></center>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>

	<center><form action="searchPage.php" method="post">
		
			<input type="submit" value="Search Tables" style="min-width:300px; min-height:100px; font-family: arial; font-size: 150%;" />
	</form>

	<form action="view.php" method="post">
		
			<input type="submit" value="View Tables" style="min-width:300px; min-height:100px; font-family: arial; font-size: 150%;"/>
	</form>

	<form action="select.php" method="post">
		
			<input type="submit" value="Edit Tables" style="min-width:300px; min-height:100px; font-family: arial; font-size: 150%;" />
	</form>

	<form action="functions.php" method="post">
		
			<input type="submit" value="Functions" style="min-width:300px; min-height:100px; font-family: arial; font-size: 150%;" />
	</form>


</body>
</html> 
