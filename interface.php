<?php

interface geom{

	public function area();
	public function perimetro();
	public function volume();
	public function diagonale();

}

class quadril implements geom{

	public $altezza;
	public $base;
	public $lato1;
	public $lato2; //base minore
	public $lato3;
	public $altSol;

	public function area(){
		$area = $this->base * $this->altezza;
		return $area;
	}

	public function perimetro(){
		$perimetro = $this->base + $this->lato1 + $this->lato2 + $this->lato3;
		return $perimetro;

	}

	public function volume(){
		//la funzione area viene letta come una stringa in questo punto non effettuando così il calcolo
		//$volume = $this->area() * $this->altSol;
		$volume = $this->base * $this->altezza* $this->altSol;
		return $volume;
	}

	public function diagonale(){
		$diagonale = sqrt(($this->lato1 * $this->lato1)+($this->base * $this->base));
		return $diagonale;

	}


}

class trapezio extends quadril{



	public function area(){

		$area = (($this->base + $this->lato2) * $this->altezza) / 2;
		return $area;
	}



}

$rettangolo = new quadril();
$rettangolo->altezza = 5;
$rettangolo->base = 3;
//echo $rettangolo->area();
//echo $rettangolo->altezza;


$trapezio = new trapezio();
$trapezio->base = 12;
$trapezio->lato2 = 8;
$trapezio->altezza = 6;
echo $trapezio->area();

?>