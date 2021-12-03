<?php
    include "db.php";
?>
<?php 
    session_start();
	if (isset($_POST['login'])){
    	$Username = $_POST['username'];
    	$Pass = $_POST['password'];
    
    	$select = mysqli_query($conn," SELECT * FROM users WHERE username = '$Username' AND pass = '$Pass' ");
    	$row  = mysqli_fetch_array($select);

    	if(is_array($row)) {
        	$_SESSION["username"] = $row['username'];
        	$_SESSION["password"] = $row['pass'];

			if(isset($_SESSION["username"])){
				header("Location: forms/candidate_form.php");
			}
    	}   else {
        	echo '<script type = "text/javascript">';
        	echo 'alert("Invalid Username or Password!");';
        	echo 'window.location.href = "login.php" ';
        	echo '</script>';
    	}
    }

?>

<?php
    require('components/login.inc.php'); 

?>
<body>
    
<div class="login-wrap my-4">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="for-pwd"><label for="tab-2" class="tab">Forgot Password</label>
		<div class="login-form">
			<div class="sign-in-htm">
				<form action = "login.php" method = "post">
					<div class="group">
						<label for="user" class="label">Username or Email</label>
						<input id="user" type = "text" class = "input" name = "username" placeholder = "Username" required = ""><br/>
					</div>
					<div class="group">
						<label for="pass" class="label">Password</label>
						<input id="pass" type = "password" class = "input" name = "password" placeholder = "Password" required = ""><br/>
					</div>
					<div class="group">
						<input type="submit" class="button" name="login" value="Sign In">
					</div>
        		</form>
				<div class="hr"></div>
			</div>
			<div class="for-pwd-htm">
				<div class="group">
					<label for="user" class="label">Username or Email</label>
					<input id="user" type="text" class="input">
				</div>
				<div class="group">
					<input type="submit" class="button" value="Reset Password">
				</div>
				<div class="hr"></div>
			</div>
		</div>
	</div>
</div>

</body>
</html>