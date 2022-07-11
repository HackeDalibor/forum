<h1>FORM CONNEXION</h1>

<form action="index.php?ctrl=security&action=register" method="post" enctype="multipart">

    <div class="form-floating">
        <input type="text" class="form-control" id="floatingPassword" name="nickname" placeholder="Nickname" required>
        <label for="floatingPassword">Nickname</label>
    </div><br>
    <div class="form-floating mb-3">
        <input type="email" class="form-control" name="email" id="floatingInput" placeholder="Email address" required>
        <label for="floatingInput">Email address</label>
    </div><br>
    <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
        <label for="floatingPassword">Password</label>
    </div><br>
    <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" name="confirmPassword" placeholder="Confirm Password" required>
        <label for="floatingPassword">Confirm Password</label>
    </div><br>
    <button type="submit" name="submitSignup" class="btn btn-outline-primary">Register</button>

</form>