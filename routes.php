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
    'adminlogout'=>'controllers/adminlogout.php',
    'adminSignIn'=>'controllers/adminSignIn.php',
    'service'=>'controllers/service.php',
    'signUpForm'=>'controllers/main.php',
    'consultationsPatient'=>'controllers/consultationsPatient.php',
    'consultationsDoctor'=>'controllers/consultationsDoctor.php',
    'profile'=>'controllers/profile.php',
    'patientProfile'=>'controllers/patientProfile.php',
    'message'=>'controllers/messages.php',
    'demande'=>'controllers/demande.php',
    'received'=>'controllers/received.php',
    'sent'=>'controllers/sent.php',
    'boite'=>'controllers/boite.php',
    'quartiers'=>'controllers/quartiers.php',
    'notApproved'=>'controllers/notApproved.php',
    'test'=>'controllers/test.php'

]);
if (isset($_GET['serviceId'])) {
    $router->define(['serviceinfo?serviceId='.$_GET['serviceId']=>'controllers/serviceinfo.php']);
}
if (isset($_GET['city'])) {
    $router->define(['etab?city='.$_GET['city']=>'controllers/etab.php']);
}
if (isset($_GET['cityAdmin'])) {
    $router->define(['quartiers?cityAdmin='.$_GET['cityAdmin']=>'controllers/quartiers.php']);
}
if (isset($_GET['quartierId'])) {
    $router->define(['service?quartierId='.$_GET['quartierId']=>'controllers/service.php']);
}
if (isset($_GET['quartierIdAdmin'])) {
    $router->define(['allServices?quartierIdAdmin='.$_GET['quartierIdAdmin']=>'controllers/allServices.php']);
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
    $_SESSION['doctor_id']=$_GET['profile'];
    // $route=explode("?", trim($_SERVER['REQUEST_URI'], "/"));
    $router->define(['profile?profile='.$_GET['profile']=>'controllers/profile.php']);
}
if (isset($_GET['patientProfile'])) {
    $_SESSION['patient_id']=$_GET['patientProfile'];
    // $route=explode("?", trim($_SERVER['REQUEST_URI'], "/"));
    $router->define(['patientProfile?patientProfile='.$_GET['patientProfile']=>'controllers/patientProfile.php']);
}
if (isset($_GET['notApprovedId'])) {
    $_SESSION['notApprovedId']=$_GET['notApprovedId'];
    // $route=explode("?", trim($_SERVER['REQUEST_URI'], "/"));
    $router->define(['notApproved?notApprovedId='.$_GET['notApprovedId']=>'controllers/notApproved.php']);
}

if (isset($_GET['userId'])) {
    $router->define(['received?userId='.$_GET['userId']=>'controllers/received.php']);
}
if (isset($_GET['messageId'])) {
    $router->define(['received?messageId='.$_GET['messageId']=>'controllers/received.php']);
}
if (isset($_GET['sentmessageId'])) {
    $router->define(['sent?sentmessageId='.$_GET['sentmessageId']=>'controllers/sent.php']);
}
if (isset($_GET['sendmessageId'])) {
    $router->define(['test?sendmessageId='.$_GET['sendmessageId']=>'controllers/test.php']);
}
