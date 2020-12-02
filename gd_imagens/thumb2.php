<?php
//header("Content-type:image/jpeg");
$file = "wallpaper.jpg";
list($old_width,$old_heigth) = getimagesize($file);
$resizeValue = 0.2;
$newSize = ["w"=>$old_width*$resizeValue , "h"=>$old_heigth*$resizeValue];
$newImage = imagecreatetruecolor($newSize["w"], $newSize["h"]);
$oldImage = imagecreatefromjpeg($file);
imagecopyresampled($newImage, $oldImage, 0, 0, 0, 0, $newSize["w"], $newSize["h"], $old_width, $old_heigth);
imagejpeg($newImage ,"thumb-" . $file, 90);
imagedestroy($oldImage);
imagedestroy($newImage);
?>
<h2>Thumb</h2>
<img src="<?php echo 'thumb-'.$file?>"/>
<h2>Original</h2>
<img src="<?php echo $file?>"/>
