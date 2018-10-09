<?php
//session_start();
include 'header.php';
?>
<h1 class="h1 text-center">Административная панель</h1>
<section class="d-flex flex-row bd-highlight mb-3">
    <ul class="nav flex-column col-2 p-2 bd-highlight">
        <li class="nav-item">
            <a class="nav-link active" href="/Admin/showAll">Список админов</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/Category/showAll">Список тем</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/Question/showAll">Список вопросов</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/User/showAll">Список пользователей</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/logout">Выйти</a>
        </li>
    </ul>
    <div class="p-2 bd-highlight col">
        <?php
            if (isset($nameClass)) {
                include 'AdminPanel/'.lcfirst($nameClass).'.php';
            }
        ?>
    </div>
</section>

<?php
include 'footer.php';
?>
