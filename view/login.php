<!DOCTYPE html>
<html lang="en">
<?php
$static = new App\Controller\Statics;
echo $static->head("เข้าสู่ระบบ");
?>

<body>
    <?php
    echo $static->navbar();
    ?>
    <div class="container mt-3">
        <form action="" method="POST">
            <div class="form-floating mb-3">
                <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username">
                <label for="floatingInput">username</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control" id="floatingInput" placeholder="Password">
                <label for="floatingInput">password</label>
            </div>
            <div class="form-floating mt-3">
                <button type="submit" class="btn btn-primary">เข้่าสู่ระบบ</button>
            </div>
        </form>
    </div>

    <?php
    echo $static->script();
    ?>
</body>

</html>