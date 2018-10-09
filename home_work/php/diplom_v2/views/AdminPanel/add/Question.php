<tr>
    <th scope="row"></th>
    <form action="/Question/add" method="post" class="col-3 mx-auto">
        <td><select class="form-control" name="category">
            <option value="<?= 123?>"><?= 321?></option>
        </select></td>
        <td><input class="form-control" type="text" name="question"></td>
        <td><input class="form-control" type="text" name="answer" disabled value="NULL"></td>
        <td><select class="form-control" name="user">
            <option value="<?= 123?>"><?= 321?></option>
        </select></td>
        <td><input class="form-control" type="text" name="date" disabled value="<?= date("Y-m-d");?>"></td>
        <td><select class="form-control" name="status">
                <option value="<?= 123?>"><?= 321?></option>
            </select></td>
        <td><button type="submit" class="btn btn-primary">Добавить</button></td>
    </form>
</tr>

