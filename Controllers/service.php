<?php
// if (isset($_SESSION['role'])) {
// 	header('location:'. $_SESSION['role']);
// }




if (isset($_GET['quartierId'])) {
			$id=$_GET['quartierId'];
			$services=$service->selectAllServices($id);
			$rows=count($services);
			$counter=0;
			foreach($services as $service){
				echo '[\'';
				echo $service->INTITULE_SERVICE;
				echo '\'';
				echo ', ';
				echo $service->LAT_SERVICE;
				echo ', ';
				echo $service->LNG_SERVICE;
				echo ']';
				$counter=$counter + 1;
				if ($counter==$rows) {
					break;
				}
				echo ',';
				}
				
		}else{
					require 'etab.view.php';
				}




