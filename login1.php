<?php 
require('components/login.inc.php'); 
include "server.php";
?>
<!------ Include the above in your HEAD tag ---------->

  <div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="for-pwd"><label for="tab-2" class="tab">Forgot Password</label>
		<div class="login-form">
			<div class="sign-in-htm">
				<form action = "login1.php" method = "post">
					<div class="group">
						<label for="user" class="label">Username or Email</label>
						<input id="user" type = "text" class = "input" name = "Username" placeholder = "Username" required = ""><br/>
					</div>
					<div class="group">
						<label for="pass" class="label">Password</label>
						<input id="pass" type = "password" class = "input" name = "Pass" placeholder = "Password" required = ""><br/>
					</div>
					<div class="group">
						<input type="submit" class="button" value="Sign In">
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
