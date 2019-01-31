<?php include("layout/header.php") ?>
<h1>enter your credentials</h1>
<form action="/auth" method="post">
    <input class="form-control" type="text" name="login">
    <input class="form-control" type="password" name="password">
    <button class="form-control" type="submit">submit</button>
</form>
<?php include("layout/footer.php") ?>