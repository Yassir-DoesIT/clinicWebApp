<?php 



if (isset($_GET['city'])) {

$cityName= $_GET['city'];
$quartiers = $quartier->selectAllQ($cityName);


echo "<h3>Quartiers de " . $cityName . "</h3>";
foreach ($quartiers as $quartier) {
  echo '<button class="w3-btn w3-margin w3-row w3-round w3-orange w3-hover-green" onclick="buildMap('.$quartier->LAT_QUARTIER.','.$quartier->LNG_QUARTIER.', '. $quartier->ID_QUARTIER. ')">'.$quartier->INTITULE_QUARTIER.'</button>';
}
}else{
	require 'etab.view.php';
}
?>
