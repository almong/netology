<?php
include 'header.php';
?>

<section>
    <h1 class="h1 text-center">Задайте ваш вопрос:</h1>
    <form class="col-6 mx-auto" method="post" action="/question">
        <div class="form-group">
            <label for="exampleInputEmail1">Введите ваше имя</label>
            <input name="name" type="text" class="form-control" id="exampleInputName">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Выберите категорию</label>
            <select name="category" class="form-control" id="exampleFormControlSelect1"">
               <?php
                foreach ($categorys as $category){?>
                    <option value="<?= $category['id']?>"><?= $category['name']?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Введите ваш вопрос</label>
            <textarea name="question" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
        <a class="btn btn-primary" href="/" role="button">Назад</a>

    </form>
<section/>

<?php
include 'footer.php';
?>


