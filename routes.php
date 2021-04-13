<?php

$router->define([
    
    ''=>'controllers/main.php',
    'home'=>'controllers/main.php',
    'etab'=>'controllers/etab.php',
    'signUpForm'=>'controllers/main.php',
]);
if (isset($_GET['city'])) {
	$router->define(['etab?city='.$_GET['city']=>'controllers/etab.php']);
}