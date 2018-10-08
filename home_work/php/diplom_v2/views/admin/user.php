<a href="/User/add?id=<?= $row['id']?>" class="badge badge-success">Add</a>
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
    foreach ($values as $row) {?>
        <tr>
            <th scope="row"><?= $row['id']?></th>
            <td><?= $row['name']?></td>
            <td>
                <a href="/User/update?id=<?= $row['id']?>" class="badge badge-primary">Edit</a>
                <a href="/User/delete?id=<?= $row['id']?>" class="badge badge-danger">Delete</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>