<tr>
    <form action="/Question/update" method="post" class="col-3 mx-auto">
        <th scope="row"><input type="hidden" name="id" value="<?= $editData['id']?>"><?= $editData['id']?></th>
        <td><select class="form-control" name="category">
                <?php foreach ($categories as $category) : ?>
                    <option value="<?= $category['id']?>"><?= $category['name']?></option>
                <?php endforeach; ?>
            </select></td>
        <td><input class="form-control" type="text" name="question" value="<?= $editData['question']?>"></td>
        <td><input class="form-control" type="text" name="answer" value="<?= $editData['answer']?>"></td>
        <td><select class="form-control" name="user">
                <?php foreach ($users as $user) : ?>
                    <option value="<?= $user['id']?>"><?= $user['name']?></option>
                <?php endforeach; ?>
            </select></td>
        <td><input class="form-control" type="text" name="date" disabled value="<?= $editData['date']?>"></td>
        <td><select class="form-control" name="status">
                <?php foreach ($statuses as $status) : ?>
                    <option value="<?= $status['id']?>"><?= $status['name']?></option>
                <?php endforeach; ?>
            </select></td>
        <td><button type="submit" class="btn btn-primary">Изменить</button></td>
    </form>
</tr>