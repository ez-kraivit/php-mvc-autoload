<!DOCTYPE html>
<html lang="en">
<?php
$static = new App\Controller\Statics;
echo $static->head("สมัครสมาชิก");
?>

<body>
    <?php
    echo $static->navbar();
    ?>
    <div class="container mt-3">
        <form action="" method="POST">
            <div class="form-floating mb-3">
                <input type="text" name="name" class="form-control" id="floatingInput" placeholder="Name">
                <label for="floatingInput">name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username">
                <label for="floatingInput">username</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="form-floating mt-3">
                <button type="submit" class="btn btn-primary">สมัครสมาชิก</button>
            </div>
        </form>
    </div>

    <?php
    echo $static->script();
    ?>
</body>

</html>