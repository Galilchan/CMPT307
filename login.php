<html>
<?php session_start(); 	
		
	if(isset($_POST['Submit'])){
		
		$logins = array('Root' => 'Beer', 'Cream' => 'Soda', 'username1' => 'password1','username2' => 'password2');
		
		$Username = isset($_POST['Username']) ? $_POST['Username'] : '';
		$Password = isset($_POST['Password']) ? $_POST['Password'] : '';
		

		if (isset($logins[$Username]) && $logins[$Username] == $Password){
			$_SESSION['UserData']['Username']=$logins[$Username];
			header("location:index.php");
			exit;
		} else {
			print "<CENTER><font color='red'> Incorrect Login Credentials </font></CENTER>";

		}
	}
?>
<form action="index.php" method="post">

	<input type="submit" value="Back" style="min-width:100px;
    min-height:45px; margin: 10px 10px 10px 0px;"/>

</form>

<style type='text/css'>

body{
  color:#000000; background-color:#ffffff;
  font-family:arial, verdana, sans-serif; font-size:12pt;}

fieldset {
  font-size:14px;
  padding:10px;
  width:250px;
  line-height:1.8;}

label:hover {cursor:hand;}
</style>

<center>
  <form class="imgcontainer">
    <img src="challenger.png" alt="Avatar" class="avatar">
  </form>

  <form id='login' action='login.php' method='post' accept-charset='UTF-8'>
<fieldset >
<legend>Login</legend>
<input type='hidden' name='submitted' id='submitted' value='1'/>

<label for='username' >Username:</label>
<input type='text' name='Username' id='username'  maxlength="50" /><br>

<label for='password' >Password:</label>
<input type='password' name='Password' id='password' maxlength="50" /><br>

<input type='submit' name='Submit' value='Submit' />

</fieldset>
</form>
</center>
</html>