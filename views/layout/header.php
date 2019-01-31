<html>
<head>
    <title>Task Manager</title>
    <link rel="stylesheet" href="/../resources/css/bootstrap.min.css">
    <link href="/../resources/css/addons/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/../resources/css/custom.css">
</head>
<body>
<header>
    <div class="account">
        <?php if (isset($_SESSION['isAdmin'])): ?>
            <a href="/logout">Logout(Admin)</a>
        <?php else: ?>
            <a href="/login">Login</a>
        <?php endif; ?>
    </div>
</header>
<div class="content container">

    <?php if (isset($_SESSION['messages'])): ?>
        <?php foreach ($_SESSION['messages'] as $message): ?>
            <div class="alert alert-primary" role="alert">
                <?= $message ?>
            </div>
        <?php endforeach ?>
    <?php unset($_SESSION['messages']) ?>
    <?php endif ?>

    <?php if (isset($_SESSION['errors'])): ?>
        <?php foreach ($_SESSION['errors'] as $error): ?>
        <div class="alert alert-danger" role="alert">
            <?= $error ?>
        </div>
        <?php endforeach ?>
    <?php unset($_SESSION['errors']) ?>
    <?php endif ?>





