<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">id</th>
        <th scope="col">Category</th>
        <th scope="col">Question</th>
        <th scope="col">Answer</th>
        <th scope="col">User</th>
        <th scope="col">Date</th>
        <th scope="col">Status</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    <?php
    include $action . '/' . $nameClass. '.php';
    ?>
    </tbody>
</table>
<?php
if ($action == 'showAll') {?>
    <a href="/Question/add" class="btn btn-primary">Добавить</a>
<?php } ?>