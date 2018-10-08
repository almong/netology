<a href="/Admin/add?id=<?= $row['id']?>" class="badge badge-success">Add</a>
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">id</th>
        <th scope="col">Login</th>
        <th scope="col">Password</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($values as $row) {?>
        <tr>
            <th scope="row"><?= $row['id']?></th>
            <td><?= $row['login']?></td>
            <td><?= $row['password']?></td>
            <td>
                <a href="/Admin/update?id=<?= $row['id']?>" class="badge badge-primary">Edit</a>
                <a href="/Admin/delete?id=<?= $row['id']?>" class="badge badge-danger">Delete</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>