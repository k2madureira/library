<?php
include('Bd.php');

class Treasure{

	public $_Name;
	public $_Author;
	public $_Type;


	function __construct($data){
		$this->_Name 	 = $data['name'];
		$this->_Author   = $data['author'];
		$this->_Type 	 = $data['type'];
	}

	function Save_Book(){

		$bd = new Bd();
		$con = $bd->conect();
		
		
		$queryMusica = $con->query("
			INSERT INTO author(name)
			VALUES ('$this->_Author')");
		$string_id_author = $con->lastInsertId(); // Pegando último Id inserio na tabela -author-
		$id_author = (int)$string_id_author; // converte para INT.

		$insere = $con->query(" 
			INSERT INTO books(title, type, author_id)
			VALUES ('$this->_Name','$this->_Type', '$id_author')");

		return 'sucesso';	

	}

}