<?php include("layout/header.php"); ?>
    <form action="/task/save/<?= $task['id'] ?>" method="post">

        <h2><?= $task['caption']?></h2>
        <textarea class="form-control" name="description" id="" cols="30" rows="10">
            <?= $task['description'] ?>
        </textarea>
        <input type="checkbox" class="form-control" name="status" <?= ($task['status'] == 1 ? "checked" : "") ?> >
        <button type="submit" class="form-control">save changes</button>
    </form>
<?php include("layout/footer.php"); ?>
