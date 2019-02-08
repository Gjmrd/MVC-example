<?php include("layout/header.php"); ?>
<form action="/task/store" method="post">
    <h5>username</h5>
    <input type="text" name="username"  class="form-control">
    <h5>email</h5>
    <input type="text" name="email"  class="form-control">
    <h5>description</h5>
    <textarea name="description" class="form-control" id="" cols="30" rows="10">

    </textarea>
    <button type="submit" class="form-control">submit</button>
</form>

<?php include("layout/footer.php"); ?>
