<a href="/admin/add" class="badge badge-success">Add</a>
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
                <a href="/admin/update" class="badge badge-primary">Update</a>
                <a href="/admin/delete" class="badge badge-danger">Delete</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>