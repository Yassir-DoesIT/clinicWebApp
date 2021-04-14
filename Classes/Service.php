<?php



class Service{
	protected $pdo;
	protected $quartier;
	protected $ville;
	function __construct($pdo){
		$this->pdo=$pdo;
	}

	function selectAllS($quartier, $ville){
	try {
			$this->quartier=$quartier;
			$this->ville=$ville;
			$sql="select * from services_medicaux where id_quartier=(select id_quartier from quartiers where intitule_quartier=:quartier and code_postale_ville=(select code_postale_ville from villes where intitule_ville=:ville))";
			$statement=$this->pdo->prepare($sql);
			$statement->bindValue(':quartier', $this->quartier);
			$statement->bindValue(':ville', $this->ville);
		} catch (PDOException $e) {
			$e->getMessage();
		}		
	}
}