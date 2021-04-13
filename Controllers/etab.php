<?php 

if (isset($_GET['city'])) {

$cityName= $_GET['city'];
$quartiers = $quartier->selectAllQ($cityName);

echo "<table> <tr> <th> Quartiers de " . $cityName . "</th></tr>";
foreach ($quartiers as $quartier) {
  echo "<tr><td>". $quartier->INTITULE_QUARTIER . "</td></tr>";
}
echo "</table>";
}else{
	require 'etab.view.php';
}
?>
