<?php
if (!isset($_SESSION['role'])) {
	header('location: signUpForm#login');
}elseif (isset($_SESSION['role']) && !($_SESSION['role']=='admin')) {
	header('location:'. $_SESSION['role']);
}
if (isset($_GET['quartierIdAdmin'])) {
            $id=$_GET['quartierIdAdmin'];
            $services=$service->selectAllS($id);
            $json=json_encode($services);
            echo $json;

}