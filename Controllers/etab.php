<?php 

// if (isset($_SESSION['role'])) {
// 	header('location:'. $_SESSION['role']);
// }

if (isset($_GET['city'])) {

$cityName= $_GET['city'];
$quartiers = $quartier->selectAllQ($cityName);


echo "<h3>Quartiers de " . $cityName . "</h3>";
foreach ($quartiers as $quartier) {
<<<<<<< HEAD
  echo '<button class="w3-btn w3-row w3-round w3-margin w3-orange w3-hover-green" onclick="buildMap('.$quartier->LAT_QUARTIER.','.$quartier->LNG_QUARTIER.', '. $quartier->ID_QUARTIER. ')">'.$quartier->INTITULE_QUARTIER.'</button>';
=======
  echo '<button class="w3-btn w3-margin w3-row w3-round w3-orange w3-hover-green" onclick="buildMap('.$quartier->LAT_QUARTIER.','.$quartier->LNG_QUARTIER.', '. $quartier->ID_QUARTIER. ')">'.$quartier->INTITULE_QUARTIER.'</button>';
>>>>>>> bdad9376367ad27b8113061491cab259c0edb901
}
}else{
	require 'etab.view.php';
}
?>
