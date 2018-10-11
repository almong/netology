<tr>
    <th scope="row"></th>
    <form action="/Question/add" method="post" class="col-3 mx-auto">
        <td><select class="form-control" name="category">
                <?php foreach ($categories as $category) : ?>
                    <option value="<?= $category['id']?>"><?= $category['name']?></option>
                <?php endforeach; ?>
        </select></td>
        <td><input class="form-control" type="text" name="question"></td>
        <td><input class="form-control" type="text" name="answer" disabled value="NULL"></td>
        <td><select class="form-control" name="user">
                <?php foreach ($users as $user) : ?>
                    <option value="<?= $user['id']?>"><?= $user['name']?></option>
                <?php endforeach; ?>
        </select></td>
        <td><input class="form-control" type="text" name="date" disabled value="<?= date("Y-m-d");?>"></td>
        <td><select class="form-control" name="status">
                <?php foreach ($statuses as $status) : ?>
                    <option value="<?= $status['id']?>"><?= $status['name']?></option>
                <?php endforeach; ?>
            </select></td>
        <td><button type="submit" class="btn btn-primary">Добавить</button></td>
    </form>
</tr>

