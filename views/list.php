<?php include("layout/header.php"); ?>
            <h1>Task list</h1>
            <a href="/task/new" class="btn btn-primary">add new task</a>
            <hr>
            <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm"><a href="/task/list/<?=$tasks['page']?>/?sortBy=username">username</a></th>
                        <th class="th-sm"><a href="/task/list/<?=$tasks['page']?>/?sortBy=email">email</a></th>
                        <th class="th-sm"><a href="/task/list/<?=$tasks['page']?>/?sortBy=description">description</a></th>
                        <th class="th-sm"><a href="/task/list/<?=$tasks['page']?>/?sortBy=status">status</a></th>
                    </tr>
                </thead>
                <?php foreach ($tasks['result'] as $task): ?>
                    <tr>
                        <td><a href="/task/edit/<?=$task['id']?>"><?= $task['username']?></a></td>
                        <td><?= $task['email']?></td>
                        <td><?= $task['description']?></td>
                        <td><?= $task['status'] == 1 ? "completed" : "ongoing" ?></td>
                    </tr>
                <?php endforeach; ?>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <?php for ($page = 1; $page <= $tasks['totalPages'] ; $page++):?>
                            <li class="page-item"><a href='<?php echo "/task/list/$page/?sortBy=$sortBy"; ?>' class="page-link"><?php  echo $page; ?></a></li>
                        <?php endfor; ?>
                    </ul>
                </nav>
            </table>
 <?php include("layout/footer.php"); ?>

