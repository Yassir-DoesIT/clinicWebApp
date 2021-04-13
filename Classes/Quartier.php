<?php 

class Quartier{
	protected $pdo;
	protected $city;
	function __construct($pdo){
		$this->pdo=$pdo;
	}


	public function selectAllQ($city){
		$this->city=$city;
		$statement=$this->pdo->prepare("select * from QUARTIERS where CODE_POSTALE_VILLE=(select CODE_POSTALE_VILLE from villes where lower(INTITULE_VILLE)=:city)");
		$statement->bindValue(':city', $this->city);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_OBJ);
	}
}