<html>
<style type"text/css">

h1 {
    color: black;
    font-family: arial;
    font-size: 300%;
}

input {
    min-width:100px;
    min-height: 45px;
    background-color: #649cef;
    border-color: #649cef;
    margin: 10px 10px 10px 0px;

}

body { 
    background-color: #cccdce;
}

</style>

<body>
	<center><h1 style="color:black;">You have logged out</12></center>
		<br>
	<center><form action="index.php" method="post">

	<input type="submit" value="Back to Index" />

</form>
</body>
<?php 
	session_start();
	session_destroy();
?>
</html>
