<!DOCTYPE html>
<html lang="en">
<?php
    $static = new App\Controller\Statics;
    echo $static->head("404 Not Found");
?>
<body>
    <?php
    echo $static->navbar();
    ?>



    <?php
    echo $static->script();
    ?>
</body>
</html>