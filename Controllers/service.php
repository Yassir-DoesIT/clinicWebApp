<?php
if (isset($_SESSION['role'])) {
	header('location:'. $_SESSION['role']);
}

if (isset($_GET['city'])) {


	if (isset($_GET['quartier'])) {
			$services=$service->selectAllS($_GET['quartier'], $_GET['city']);
			$counter = 0 ;
			foreach ($services as $service) {
				$counter = $counter + 1;
				echo "['coordinates" . $counter ."', '{ lat:" .  $service->LAT_SERVICE . ", lng:" . $service->LNG_SERVICE . "}'], ";
				}
				}else{
					require 'etab.view.php';
						}
}
