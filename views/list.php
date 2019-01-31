<?php include("layout/header.php"); ?>
            <h1>Task list</h1>
            <a href="/task/new" class="btn btn-primary">add new task</a>
            <hr>
            <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">Caption</th>
                        <th class="th-sm">Description</th>
                        <th class="th-sm">Status</th>
                    </tr>
                </thead>
                <?php foreach ($tasks['result'] as $task): ?>
                    <tr>
                        <td><a href="/task/edit/<?=$task['id']?>"><?= $task['caption']?></a></td>
                        <td><?= $task['description']?></td>
                        <td><?= $task['status'] == 1 ? "completed" : "ongoing" ?></td>
                    </tr>
                <?php endforeach; ?>
                <?php for ($page = 1; $page <= $tasks['totalPages'] ; $page++):?>
                    <a href='<?php echo "/task/list/$page"; ?>' class="links"><?php  echo $page; ?></a>
                <?php endfor; ?>
            </table>
 <?php include("layout/footer.php"); ?>

