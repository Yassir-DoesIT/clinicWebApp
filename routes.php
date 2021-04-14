<?php

$router->define([
    
    ''=>'controllers/main.php',
    'home'=>'controllers/main.php',
    'etab'=>'controllers/etab.php',
    'signUpForm'=>'controllers/main.php',
    'patient'=>'controllers/patient.php',
    'doctor'=>'controllers/doctor.php',
    'admin'=>'controllers/admin.php',
    'SignInForm'=>'controllers/signIn.php',
    'logout'=>'controllers/logout.php',
    'adminSignIn'=>'controllers/adminSignIn.php',
    'service'=>'controllers/service.php'

]);
if (isset($_GET['city'])) {
    $router->define(['etab?city='.$_GET['city']=>'controllers/etab.php']);
}
if (isset($_GET['quartierId'])) {
    $router->define(['service?quartierId='.$_GET['quartierId']=>'controllers/service.php']);
}

