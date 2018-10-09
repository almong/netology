<?php
foreach ($values as $row) {?>
    <tr>
        <th scope="row"><?= $row['id']?></th>
        <td><?= $obj->getName('category',$row['category_id'])['name']?></td>
        <td><?= $row['question']?></td>
        <td><?= $row['answer']?></td>
        <td><?= $obj->getName('user', $row['user_id'])['name']?></td>
        <td><?= $row['date']?></td>
        <td><?= $obj->getName('status', $row['status'])['name']?></td>
        <td>
            <a href="/Question/update?id=<?= $row['id']?>" class="badge badge-primary">Edit</a>
            <a href="/Question/delete?id=<?= $row['id']?>" class="badge badge-danger">Delete</a>
        </td>
    </tr>
<?php } ?>