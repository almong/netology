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