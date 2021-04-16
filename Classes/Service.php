<?php



class Service{
	private $pdo;
	private $id_service;
	private $id_quartier;
	private $intitule_service;
	private $type;
	private $permanance;
	private $numero_fixe;
	private $description_service;
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

	function addService($id_quartier, $intitule_service, $type, $numero_fixe, $description_service, $lat_service, $lng_service){
	try {
		$this->id_quartier=$id_quartier;
		$this->intitule_service=$intitule_service;
		$this->type=$type;
		$this->numero_fixe=$numero_fixe;
		$this->description_service=$description_service;
		$this->lat_service=$lat_service;
		$this->lng_service=$lng_service;
		$checkService=$this->pdo->prepare("select * from services_medicaux where id_quartier=:quartier and intitule_service=:intitule_service");
		$$checkService->bindValue(':quartier', $this->id_quartier);
		$checkService->bindValue(':intitule_service', $this->intitule_service);
		$checkService->execute();
		if ($checkService->rowcount()==1) {
			return ['errorMessage'=>'This service already listed with the 24/7h working services'];
		}else{
			$sql="insert into services_medicaux(id_quartier, intitule_service, type, permanance, numero_fixe, description_service, $lat_service, $lng_service)where id_quartier=:quartier and intitule_service=:intitule_service, :type, :permanance, :numero_fixe, :description_service, :lat_service, :lng_service";
			$insert_statement=$this->pdo->prepare($sql);
			$insert_statement->bindValue(':id_quartier', $this->id_quartier);
			$insert_statement->bindValue(':intitule_service', $this->intitule_service);
			$insert_statement->bindValue(':type', $this->type);
			$insert_statement->bindValue(':permanance', 1);
			$insert_statement->bindValue(':numero_fixe', $this->numero_fixe);
			$insert_statement->bindValue(':description_service', $this->description_service);
			$insert_statement->bindValue(':lat_service', $this->lat_service);
			$insert_statement->bindValue(':lng_service', $this->lng_service);
			$insert_statement->execute();
			return ['successMessage'=>'Service was added successfully'];
		}
		}catch (PDOException $e) {
			$e->getMessage();
		}		
	}
	
	 
	
}