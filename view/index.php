<?php
    if(empty($_SESSION['users'])){
        return header("LOCATION: /login");
    }
    $users = json_decode($_SESSION["users"]);

?>
<!DOCTYPE html>
<html lang="en">
<?php
    $static = new App\Controller\Statics;
    echo $static->head("หน้าแรก");
?>

<body>
    <?php
    echo $static->navbar();
    ?>
    
    <input type="hidden" id="name" name="name" value="<?php
    echo $users->name;
    ?>">
    <button type="button" id="clickButton" onclick="ClickOn()" class="btn btn-primary">คลิก</button>  
    
    <script src="../main.js"></script>

    <?php
    echo $static->script();
    ?>
</body>

</html>