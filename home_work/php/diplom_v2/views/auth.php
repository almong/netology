<?php
session_start();
include 'header.php';
?>

<section>
    <h1 class="h1 text-center">Авторизация</h1>
    <form method="post" action="/auth" class="col-3 mx-auto">
        <div class="form-group">
            <label for="exampleInputLogin1">login</label>
            <input name="login" type="text" class="form-control" id="exampleInputEmail1"">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group form-check">
            <input name="remember" type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</section>

<?php
include 'footer.php';
?>
