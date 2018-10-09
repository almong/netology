<?php
foreach ($values as $row) {?>
    <tr>
        <th scope="row"><?= $row['id']?></th>
        <td><?= $row['name']?></td>
        <td>
            <a href="/Category/update?id=<?= $row['id']?>" class="badge badge-primary">Edit</a>
            <a href="/Category/delete?id=<?= $row['id']?>" class="badge badge-danger">Delete</a>
        </td>
    </tr>
<?php } ?>