<form method="POST" action="">
Film ID : <input type="text" name="id">
<input type="submit" value="Search">
</form>


<?php

if(isset($_POST['id'])){

	include "vendor/autoload.php";

	$client = new \GuzzleHttp\Client();

	$url = 'http://localhost:8080/webservice/sakila/film_details.php';

	$id = $_POST['id'];

	$param = [
		'query' => ['id'=>$id]
	];


	$result = $client->request('GET', $url, $param);

	$film = json_decode($result->getBody()->getContents());

	if(isset($film->err)){
		echo "Tida Rekod";
	} else {
		echo "ID : $film->film_id <br>";
		echo "Title : $film->title <br>";
		echo "Description : $film->description <br>";
	}

}





