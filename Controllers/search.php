<?php
if (isset($_SESSION['role']) && !($_SESSION['role']=='patient')) {
	header('location:'. $_SESSION['role']);
}
if (isset($_SESSION['search'])) {
$result_per_page=8;
$fullName=explode(' ',$_SESSION['search']);

if (!isset($fullName[1])) {
	$fullName[1]= ' ';
}
// var_dump($fullName[1]);
$rows=$doctor->searchDoctors($fullName[0],$fullName[1],null,null);
echo 'rows '. $rows;
$pages= ceil($rows/$result_per_page);
echo "<br> pages". $pages . "<br>";
//page number
if (!isset($_GET['page'])) {
	$page=1;
}else{
	$page=$_GET['page'];
}
//starting number
$starting_number=($page-1)*$result_per_page;
echo "start ". $starting_number;
//retrieve data
$cards=$doctor->searchDoctors($fullName[0],$fullName[1],$starting_number,$result_per_page);

// var_dump($cards);

}
require 'search.view.php';