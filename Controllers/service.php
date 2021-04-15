<?php
// if (isset($_SESSION['role'])) {
// 	header('location:'. $_SESSION['role']);
// }




if (isset($_GET['quartierId'])) {
			$id=$_GET['quartierId'];
			$services=$service->selectAllServices($id);
			$rows=count($services);
			$counter=0;
			// echo '{';
			foreach($services as $service){
				// echo '"services" : [ { "title" : " ';
				// echo $service->INTITULE_SERVICE;
				// echo '"';
				// echo ', ';
				// echo $service->LAT_SERVICE;
				// echo ', ';
				// echo $service->LNG_SERVICE;
				$array=array(
					'title'=> $service->INTITULE_SERVICE,
					'lat'=> $service->LAT_SERVICE,
					'lng'=> $service->LNG_SERVICE);
				$json=json_encode($array, JSON_PRETTY_PRINT);
				echo $json;
				// $counter=$counter + 1;
				// if ($counter==$rows) {
				// 	break;
				// }
				// echo ',';
				// }
			// echo '}';
				}
		}else{
					require 'etab.view.php';
				}




