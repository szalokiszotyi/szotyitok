<form action="index.php?page=validate" method="POST">
    <div class="Login-form">
        <p><?= $error ?></p>

        <label for="">E-mail</label>
        <input type="email" name="email" required>

        <label for="">Password</label>
        <input type="password" name="pass" required>

        <input type="submit" class="btn btn-grn" value="Submit">
    </div>
</form>