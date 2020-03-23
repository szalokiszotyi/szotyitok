<form action="index.php?page=auth" method="POST">
    <div class="Login-form">
        <p><?= $error ?></p>
        <label for="">Name</label>
        <input type="text" name="name" autofocus required>

        <label for="">E-mail</label>
        <input type="email" name="email" required>

        <label for="">Password</label>
        <input type="password" name="pass" required>

        <input type="submit" class="btn btn-grn" value="Submit">
    </div>
</form>