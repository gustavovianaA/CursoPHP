<?php
$images = scandir("images2");
//var_dump($images);
$data = array();
foreach($images as $img){
	if(!in_array("$img",array(".",".."))){
		$filename = "images2" .DIRECTORY_SEPARATOR . $img;
		$info = pathinfo($filename);
		$info["size"] = filesize($filename);
		$info["modified"] = date("d/m/Y H:i:s" , filemtime($filename));
		$info["url"] = "http://localhost/cursophp/arquivos/" . str_replace("\\","/",$filename);
		array_push($data, $info);
		}
}
echo json_encode($data);
?>