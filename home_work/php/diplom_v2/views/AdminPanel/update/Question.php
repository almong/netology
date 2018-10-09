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
            <a href="/Question/update?id=<?= $row['id']?>" class="badge badge-primary">Edit</a>
            <a href="/Question/delete?id=<?= $row['id']?>" class="badge badge-danger">Delete</a>
        </td>
    </tr>
<?php } ?>