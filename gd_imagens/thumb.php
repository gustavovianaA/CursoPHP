<?php
header("Content-type:image/jpeg");
$file = "wallpaper.jpg";
$new_width = 256;
$new_height = 256;
list($old_width,$old_heigth) = getimagesize($file);
$newImage = imagecreatetruecolor($new_width, $new_height);
$oldImage = imagecreatefromjpeg($file);
//imagecopyresampled(dst_image, src_image, dst_x, dst_y, src_x, src_y, dst_w, dst_h, src_w, src_h)
imagecopyresampled($newImage, $oldImage, 0, 0, 0, 0, $new_width, $new_height, $old_width, $old_heigth);
imagejpeg($newImage);
imagedestroy($oldImage);
imagedestroy($newImage);
?>