<?php



class Service{
	protected $pdo;
	protected $id_quartier;
	protected $intitule_service;
	protected $type;
	protected $permanance;
	protected $numero_fixe;
	protected $description_service;
	protected $lat_service;
	protected $lng_service;

	function __construct($pdo){
		$this->pdo=$pdo;
	}

	public function is247($id_quartier){
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

	public function is247($id_quartier){
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
	
	
}