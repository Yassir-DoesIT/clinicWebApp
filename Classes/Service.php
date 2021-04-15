<?php



class Service{
	protected $pdo;
	protected $id_quartier;

	function __construct($pdo){
		$this->pdo=$pdo;
	}

	public function selectAllServices($id_quartier){
	try {
		$this->id_quartier=$id_quartier;
		$services=$this->pdo->prepare("select * from services_medicaux where id_quartier=:quartier");
		$services->bindValue(':quartier', $this->id_quartier);
		$services->execute();
 		
 		return $services->fetchAll(PDO::FETCH_OBJ);
		} catch (PDOException $e) {
			$e->getMessage();
		}		
	}
	
	
}