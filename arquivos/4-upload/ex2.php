<?php
define("IMAGE_FORMATS", ["png","jpg"]);
function generateThumb($dir,$file){
	$origin = $dir . DIRECTORY_SEPARATOR . $file;
	$destination = $dir . DIRECTORY_SEPARATOR . "thumb";
	if(!is_dir($destination)){
		mkdir($destination);
	}
	list($old_width,$old_heigth) = getimagesize($origin);
	$resizeValue = 0.2;
	$newSize = ["w"=>$old_width*$resizeValue , "h"=>$old_heigth*$resizeValue];
	$newImage = imagecreatetruecolor($newSize["w"], $newSize["h"]);
	$oldImage = imagecreatefromstring(file_get_contents($origin));
	imagecopyresampled($newImage, $oldImage, 0, 0, 0, 0, $newSize["w"], $newSize["h"], $old_width, $old_heigth);
	if(imagejpeg($newImage ,$destination . DIRECTORY_SEPARATOR . $file, 90)){
		echo "Thumb gerado com sucesso";
	}else{
		throw new Exception("Não foi possível gerar o thumb.");
		
	}
	imagedestroy($oldImage);
	imagedestroy($newImage);
}
if($_SERVER["REQUEST_METHOD"] === "POST"){
	$file = $_FILES["fileUpload"];
	$type = explode("/", $file["type"])[1];
	if(in_array($type,["png","jpg"])){
		if($file["error"]){
			throw new Exception("Error: " . $file["error"]);
		}
		$dirUploads = "img";
		if(!is_dir($dirUploads)){
			mkdir($dirUploads);
		}
		if(move_uploaded_file($file["tmp_name"],$dirUploads . DIRECTORY_SEPARATOR . $file["name"])){
			echo "Upload realizado. ";
			generateThumb($dirUploads,$file["name"]);
		}else{
			throw new Exception("Não foi possível realizar o upload.");
		}
	}else{
		echo "Apenas arquivos de imagem (";
		foreach (IMAGE_FORMATS as $format) {
			echo "/" . $format;
		}
		echo ")";
	}
}
?>
<form method="POST" enctype="multipart/form-data">
	<input type="file" name="fileUpload">
	<button type="submit">Send</button>
</form>

