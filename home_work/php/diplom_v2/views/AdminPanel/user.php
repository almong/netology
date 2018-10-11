<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">id</th>
        <th scope="col">Name</th>
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
    <a href="/User/add" class="btn btn-primary">Добавить</a>
<?php } ?>