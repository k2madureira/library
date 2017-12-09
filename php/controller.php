<?php
include 'Treasure.php';


$option = $_POST['option'];

switch ($option) {
	case 'register':
		
		$book   = $_POST['book'];
		$author = $_POST['author'];
		$type   = $_POST['type'];

		if(!empty($book)&& !empty($author) && !empty($type)){

			$data['name'] 	= $book;
			$data['author']  = $author;
			$data['type'] 	= $type;


			$Treasure = new Treasure($data);
			$register = $Treasure->Save_book();

		}else{
			echo 'error';
		}


		break;
	case 'load'	:

		$con = new Bd();
		$data = $con->load_Books();
		$array = (array)$data;
		
		echo (json_encode($data));


		break;
	default:
		# code...
		break;
}