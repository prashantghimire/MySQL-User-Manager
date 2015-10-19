<?php require_once('includes/header.php'); ?>
<div class="login-container">
    <div class="login center">
        <img class="slu-logo" src="assets/images/selu_logo.png" alt="slu logo">
        <form action="dashboard.php" method="post">
            <input class="username" type="text" name="username" placeholder="w number" />
            <input class="password" type="password" name="password" placeholder="password">
            <input class="btn btn-primary" type="submit" value="Login">
        </form>
    </div>
</div>
<?php require_once('includes/footer.php'); ?>