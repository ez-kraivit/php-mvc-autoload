<?php
    namespace App\Controller;
    use App\Setting as Setting;
    class Statics 
    {
        function head($title){
            return '
            <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
            <title>'.$title.'</title>
            </head>
            ';
        }
        function navbar(){
            if(empty($_SESSION["users"])){
                return '
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Logo</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="/about">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="/register">Register</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="/login">Login</a>
                            </li>
                        </ul>
                    </div>
                    </div>
                </nav>
                ';
            }else{
                $users = json_decode($_SESSION["users"]);
                $objects = '
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">'.$users->name.'</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="/about">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="/logout">Logout</a>
                            </li>
                        </ul>
                    </div>
                    </div>
                </nav>
                ';
                return $objects;
            }
        }
        function script(){
            return '
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
            ';
        }
        function index($method){
            return include('view/index.php');
        }   
        function about($method){
            return include('view/about.php');
        }
        function logout($method){
            $_SESSION["users"] = null;
            return header("LOCATION: /login");
        }
        function error_404($method){
            return include('view/404.php');
        }
        function login($method){
            if($method=="POST"){
                $connect = new Setting;
                $result = $connect->QueryIndex("SELECT `username`,`password`,`name` FROM `users` WHERE `username` =  '".$_POST["username"]."' ");
                $result =  json_decode($result);
                $username = $result->username;
                $password = $result->password;
                $name = $result->name;
                if (password_verify($_POST["password"], $password)) {
                    // print_r(["username"=>$result->username,"name"=>$result->name]);
                    $_SESSION["users"] = json_encode(["username"=>$result->username,"name"=>$result->name]);
                    return header("LOCATION: /");
                } else {
                    return header("LOCATION: /login");
                }
            }else{
                return include('view/login.php');
            }
        }
        function register($method){
            if($method=="POST"){
                $connect = new Setting;
                $connect->InsertIndex(
                    "INSERT INTO users (`username`, `password`, `name`)
                    VALUES ('".$_POST["username"]."', '".password_hash($_POST["password"], PASSWORD_DEFAULT)."','".$_POST["name"]."')"       
                );
                return header("LOCATION: /login");
            }else if($method=="GET"){
                return include('view/register.php');
            }
        }
    }
