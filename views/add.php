<?php include("layout/header.php"); ?>
<form action="/task/store" method="post">
    <input type="text" name="caption"  class="form-control">
    <textarea name="description" class="form-control" id="" cols="30" rows="10">

    </textarea>
    <button type="submit" class="form-control"></button>
</form>

<?php include("layout/footer.php"); ?>
