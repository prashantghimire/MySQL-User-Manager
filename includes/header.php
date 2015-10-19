<html>
<head>
    <title>MySQL User Manager | Home</title>
    <link rel="stylesheet" href="assets/css/fonts.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/script.js"></script>
</head>

<body>
<?php $login = true; ?>
<?php if($login): ?>
    <ul class="menu">
        <li class="item"><a href="dashboard.php">Dashboard</a></li>
        <li class="item"><a href="add.php">Add</a></li>
        <li class="item"><a href="manage.php">Manage</a></li>
        <li class="item"><a href="view.php">View</a></li>
    </ul>
<?php endif; ?>