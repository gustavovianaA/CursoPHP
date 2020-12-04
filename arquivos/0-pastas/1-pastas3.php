<?php
define("TARGET","files");
$searchExt = isset($_GET["extension"]) ? $_GET["extension"] : "all";  
$files = scandir(TARGET);
$data = array();
foreach($files as $file){
	if(!in_array("$file",array(".",".."))){
		$filename = TARGET .DIRECTORY_SEPARATOR . $file;
		$info = pathinfo($filename);
		$info["size"] = filesize($filename);
		$info["modified"] = date("d/m/Y H:i:s" , filemtime($filename));
		$info["url"] = "http://localhost/cursophp/arquivos/" . str_replace("\\","/",$filename);
		if($searchExt === "all"){
			array_push($data, $info);
		}else{
			if($info["extension"] === $searchExt)
				array_push($data,$info);
		}
	}
}
echo empty($data) ? "Não há arquivos com a extensão $searchExt." : json_encode($data); 
?>