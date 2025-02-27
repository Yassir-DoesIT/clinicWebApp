<?php



class Service{
	private $pdo;
	private $id_service;
	private $id_quartier;
	private $intitule_service;
	private $permanance;
	private $lat_service;
	private $lng_service;

	function __construct($pdo){
		$this->pdo=$pdo;
	}

	function selectAllS($id_quartier){
	try {
		$this->id_quartier=$id_quartier;
		$services=$this->pdo->prepare("select * from services_medicaux where id_quartier=:quartier");
		$services->bindValue(':quartier', $this->id_quartier);
		$services->execute();
 		
 		return $services->fetchAll(PDO::FETCH_OBJ);
		}catch (PDOException $e) {
			$e->getMessage();
		}		
	}

	function selectService($id_service){
		try {
			$this->id_service=$id_service;
			$services=$this->pdo->prepare("select * from services_medicaux where id_service=:id_service");
			$services->bindValue(':id_service', $this->id_service);
			$services->execute();
	
			 return $services->fetchAll(PDO::FETCH_OBJ);
			}catch (PDOException $e) {
				$e->getMessage();
			}
		}

	function is247($id_quartier){
	try {
		$this->id_quartier=$id_quartier;
		$services=$this->pdo->prepare("select * from services_medicaux where id_quartier=:quartier and permanance=1");
		$services->bindValue(':quartier', $this->id_quartier);
		$services->execute();
 		
 		return $services->fetchAll(PDO::FETCH_OBJ);
		}catch (PDOException $e) {
			$e->getMessage();
		}		
	}

	function addService($id_quartier, $intitule_service, $permanance, $lat_service, $lng_service){
	try {
		$this->intitule_service=$intitule_service;
		$this->id_quartier=$id_quartier;
		$this->permanance=$permanance;
		$this->lat_service=$lat_service;
		$this->lng_service=$lng_service;
		$checkService=$this->pdo->prepare("select * from services_medicaux where id_quartier=:quartier and intitule_service=:intitule_service");
		$checkService->bindValue(':quartier', $this->id_quartier);
		$checkService->bindValue(':intitule_service', '$this->intitule_service');
		$checkService->execute();
		if ($checkService->rowcount()>0) {
			return ['errorMessage'=>'This service already listed with the 24/7h working services'];
		}else{
			$sql="insert into services_medicaux(id_quartier, intitule_service, permanance , lat_service, lng_service) values(:id_quartier,:intitule_service, :permanance, :lat_service, :lng_service)";
			$insert_statement=$this->pdo->prepare($sql);
			$insert_statement->bindValue(':id_quartier', $this->id_quartier);
			$insert_statement->bindValue(':intitule_service', $this->intitule_service);
			$insert_statement->bindValue(':permanance', $this->permanance);
			$insert_statement->bindValue(':lat_service', $this->lat_service);
			$insert_statement->bindValue(':lng_service', $this->lng_service);
			$insert_statement->execute();
			return ['successMessage'=>'Service was added successfully'];
		}
		}catch (PDOException $e) {
			$e->getMessage();
		}		
	}
	function updateService($id_service, $intitule_service, $permanance, $lat_service, $lng_service){
	try {
		$sql="update services_medicaux set intitule_service=:intitule_service, permanance=:permanance, lat_service=:lat_service,lng_service=:lng_service  where id_service=:id_service";
		$services=$this->pdo->prepare($sql);
		$this->id_service=$id_service;
		$this->intitule_service=$intitule_service;
		$this->permanance=$permanance;
		$this->lat_service=$lat_service;
		$this->lng_service=$lng_service;
		$services->bindValue(':id_service', $this->id_service);
		$services->bindValue(':intitule_service', $this->intitule_service);
		$services->bindValue(':permanance', $this->permanance);
		$services->bindValue(':lat_service', $this->lat_service);
		$services->bindValue(':lng_service', $this->lng_service);
		$services->execute();
 		
 		return ['successMessage'=>'Service was updated successfully'];
		}catch (PDOException $e) {
			$e->getMessage();
		}		
	}
	
	 
	
}