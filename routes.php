<?php

$router->define([
    
    ''=>'controllers/main.php',
    'home'=>'controllers/main.php',
    'etab'=>'controllers/etab.php',
    'patient'=>'controllers/patient.php',
    'doctor'=>'controllers/doctor.php',
    'admin'=>'controllers/admin.php',
    'SignInForm'=>'controllers/signIn.php',
    'logout'=>'controllers/logout.php',
    'adminSignIn'=>'controllers/adminSignIn.php',
    'service'=>'controllers/service.php',
    'signUpForm'=>'controllers/main.php',
    'mesConsultations'=>'controllers/mesConsultations.php'

]);
if (isset($_GET['city'])) {
    $router->define(['etab?city='.$_GET['city']=>'controllers/etab.php']);
}
if (isset($_GET['quartierId'])) {
    $router->define(['service?quartierId='.$_GET['quartierId']=>'controllers/service.php']);
}
if (isset($_GET['page'])) {
    $route=explode("?", trim($_SERVER['REQUEST_URI'], "/"));
    $router->define([$route[0].'?page='.$_GET['page']=>'controllers/'.$route[0].'.php']);
}
if (isset($_GET['search'])) {
    $_SESSION['search']=$_GET['search'];
    // $route=explode("?", trim($_SERVER['REQUEST_URI'], "/"));
    $router->define(['search?search='.implode("+", explode(" ", $_GET['search']))=>'controllers/search.php']);
}
if (isset($_GET['profile'])) {
    // $_SESSION['search']=$_GET['search'];
    // $route=explode("?", trim($_SERVER['REQUEST_URI'], "/"));
    $router->define(['profile?profile='.$_GET['profile']=>'controllers/profile.php']);
}
