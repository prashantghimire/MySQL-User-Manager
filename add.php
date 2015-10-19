<?php require_once('includes/header.php'); ?>

<div class="container">
    <h1>Add!</h1>

    <form action="core/add-users.php" method="post">
        <textarea name="users" id="users" cols="30" rows="10"></textarea>
        <input class="block btn btn-go" type="submit" value="Add Users" />
    </form>
</div>

<?php require_once('includes/footer.php'); ?>