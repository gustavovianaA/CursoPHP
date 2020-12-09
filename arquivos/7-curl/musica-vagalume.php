<form>
	<input type="text" name="artist">
	<input type="submit" name="search">
</form>
<?php
if(isset($_GET["artist"])){
	$artist = strtolower(str_replace(" ", "-", $_GET["artist"]));
	function fetchData($url){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 20);
		$result = curl_exec($ch);
		curl_close($ch);
		return $result;
	}
	$baseurl = 'https://www.vagalume.com.br/';
	$result = fetchData("$baseurl/$artist/index.js");	
	//var_dump($result);
	//if(is_null($result)) die();
	$result = json_decode($result,true)["artist"];
	extract($result);
	$albums = $albums["item"];

	?>
	<h1><?=$desc?></h1>
	<img src="<?=$baseurl.$pic_medium?>">
	<h2>Álbums</h2>
	<?php foreach ($albums as $key => $album) {
		echo $album["desc"] . "<br>";
		echo $album["url"]. "<br>";
		echo $album["year"]. "<br>";
	}
}?>