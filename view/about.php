<!DOCTYPE html>
<html lang="en">
<?php
    $static = new App\Controller\Statics;
    echo $static->head("เกี่ยวกับเรา");
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