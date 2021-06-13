<?php
    $config = new App\Setting;
    $static = new App\Controller\Statics;
    $method = $config->method();
    switch ($config->route()) {
        case '/':
            $static->index($method);
            break;
        case '/about':
            $static->about($method);
            break;
        case '/register':
            $static->register($method);
            break;
        case '/login':
                $static->login($method);
            break;
        case '/logout':
                $static->logout($method);
            break;
        default:
            $static->error_404($method);
            break;
    }
?>