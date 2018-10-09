<tr>
    <form action="/Category/update" method="post" class="col-3 mx-auto">
        <th scope="row"><input type="hidden" name="id" value="<?= $editData['id']?>"><?= $editData['id']?></th>
        <td><input class="form-control" type="text" name="name" value="<?= $editData['name']?>"></td>
        <td><button type="submit" class="btn btn-primary">Изменить</button></td>
    </form>
</tr>