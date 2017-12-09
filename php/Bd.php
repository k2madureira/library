<?php

class Bd{
	
	public function conect(){

		try{
			$con = new PDO('mysql:host=localhost;dbname=treasure','root','');
			
		
			return $con;

		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}


	public function search_Book($name){

		$con = $this->conect();

		$search = $con->prepare("");

	}	

	public function load_Books(){

		$con = $this->conect();

		$search = $con->prepare("SELECT title, name, type FROM books, author WHERE idbooks=idauthor");
		$search->execute();
		$data=$search->fetchAll(PDO::FETCH_ASSOC);

		return $data;
	}
}