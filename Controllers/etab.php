<?php 

if (isset($_SESSION['role'])) {
	header('location:'. $_SESSION['role']);
}

if (isset($_GET['city'])) {

$cityName= $_GET['city'];
$quartiers = $quartier->selectAllQ($cityName);


echo "<h3>Quartiers de " . $cityName . "</h3>";
foreach ($quartiers as $quartier) {
  echo '<button class="w3-btn w3-block w3-teal w3-hover-green" onclick="buildMap('.$quartier->LAT_QUARTIER.','.$quartier->LNG_QUARTIER.')"
        >'.$quartier->INTITULE_QUARTIER.'</button>';
}
}else{
	require 'etab.view.php';
}
?>
