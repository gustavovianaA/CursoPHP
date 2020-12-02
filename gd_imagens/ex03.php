<?php
$image = imagecreatefromjpeg("certificado.jpg");
$titleColor = imagecolorallocate($image, 0, 0, 0);
$gray = imagecolorallocate($image, 200, 200, 200);
imagettftext($image,32,0,450,150,$titleColor,"fonts\Bevan.ttf","CERTIFICADO");
//imagettftext($image,32,0,450,150,$titleColor,"fonts".DIRECTORY_SEPARATOR."Bevan".DIRECTORY_SEPARATOR."Bevan-Regular.ttf","Gustavo Viana");
imagestring($image, 3, 440, 370, utf8_decode("Concluído em: ") . date("d/m/Y") , $titleColor);
//header("Content-type: image/jpeg");
imagejpeg($image);
imagedestroy($image);
?>