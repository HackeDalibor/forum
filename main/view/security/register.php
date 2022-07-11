<h1>FORM CONNEXION</h1>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="index.php?ctrl=security&action=register" class="form-register" method="post" enctype="multipart">
			<h1>Create Account</h1>
			<div class="social-container">
				<a href="#" class="a social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="a social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="a social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your email for registration</span>
			<input type="text" name="nicknameSignup" placeholder="Nickname" required>
            <input type="email" name="emailSignup" placeholder="Email address" required>
			<input type="password" name="passwordSignup" placeholder="Password" required>
            <input type="password" name="confirmPassword" placeholder="Confirm Password" required>
			<button type="submit" name="submitSignup">Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="index.php?ctrl=security&action=login" class="form-register" method="post" enctype="multipart">
			<h1>Sign in</h1>
			<div class="social-container">
				<a href="#" class="a social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="a social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="a social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your account</span>
			<input type="text" name="nicknameLogin" placeholder="Nickname" required>
			<input type="email" name="emailLogin" placeholder="Email" required/>
			<input type="password" name="passwordLogin" placeholder="Password" required/>
			<a href="#" class="a">Forgot your password?</a>
			<button type="submit" name="submitLogin">Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>