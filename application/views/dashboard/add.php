<div class="container">
    <?php
    if (isset($messages)){
        foreach ($messages as $user=>$message) {
            echo "<strong>".$user."</strong><br>";
            foreach ($message as $m) {
                echo $m;
            }
            echo "<hr>";
        }
    }
    ?>
    <h1>Add!</h1>
    <form action="" method="post">
        <textarea name="users" id="users" cols="50" rows="30"></textarea>
        <input class="block btn btn-go" type="submit" value="Add Users" />
    </form>
    <pre>
</div>