<a href="/Question/add" class="badge badge-success">Add</a>
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
    foreach ($values as $row) {?>
        <tr>
            <th scope="row"><?= $row['id']?></th>
            <td><?= $row['category_id']?></td>
            <td><?= $row['question']?></td>
            <td><?= $row['answer']?></td>
            <td><?= $row['user_id']?></td>
            <td><?= $row['date']?></td>
            <td><?= $row['status']?></td>
            <td>
                <a href="/Question/update" class="badge badge-primary">Edit</a>
                <a href="/Question/delete?id=<?= $row['id']?>" class="badge badge-danger">Delete</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>